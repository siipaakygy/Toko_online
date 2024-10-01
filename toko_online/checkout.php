<?php 
session_start();
include "koneksi.php"; // Menggunakan koneksi database dari file koneksi

// Cek apakah pengguna sudah login
if (!isset($_SESSION['status_login'])) {
    echo "<script>alert('Silakan login terlebih dahulu');location.href='login.php';</script>";
    exit();
}

$id_pelanggan = $_SESSION['id_pelanggan']; // ID pelanggan dari sesi
$id_petugas = $_SESSION['id_petugas'] ?? null; // ID petugas dari sesi jika ada
$tgl_transaksi = date('Y-m-d'); // Tanggal transaksi

// Query untuk mendapatkan produk dalam keranjang
$query_keranjang = "SELECT toko_keranjang.*, toko_produk.nama_produk, toko_produk.harga 
                    FROM toko_keranjang 
                    JOIN toko_produk ON toko_keranjang.id_produk = toko_produk.id_produk 
                    WHERE toko_keranjang.id_pelanggan = '$id_pelanggan'";
$result_keranjang = mysqli_query($conn, $query_keranjang);

// Cek jika ada produk dalam keranjang
if (mysqli_num_rows($result_keranjang) > 0) {
    // Mulai transaksi
    mysqli_begin_transaction($conn);
    try {
        // Simpan data transaksi ke tabel toko_transaksi
        if ($id_petugas) {
            $insert_transaksi = mysqli_query($conn, "INSERT INTO toko_transaksi (id_pelanggan, id_petugas, tgl_transaksi) VALUES ('$id_pelanggan', '$id_petugas', '$tgl_transaksi')");
        } else {
            $insert_transaksi = mysqli_query($conn, "INSERT INTO toko_transaksi (id_pelanggan, tgl_transaksi) VALUES ('$id_pelanggan', '$tgl_transaksi')");
        }
        
        if (!$insert_transaksi) {
            throw new Exception("Gagal menyimpan transaksi");
        }

        $id_transaksi = mysqli_insert_id($conn); // Ambil ID transaksi terakhir yang disisipkan

        // Simpan detail transaksi ke tabel toko_detail_transaksi
        while ($row = mysqli_fetch_assoc($result_keranjang)) {
            $qty = $row['jumlah']; // Jumlah dari keranjang
            $subtotal = $row['harga'] * $qty; // Hitung subtotal per produk

            // Simpan detail transaksi
            $insert_detail = mysqli_query($conn, "INSERT INTO toko_detail_transaksi (id_transaksi, id_produk, qty, subtotal) VALUES ('$id_transaksi', '".$row['id_produk']."', '$qty', '$subtotal')");
            
            if (!$insert_detail) {
                throw new Exception("Gagal menyimpan detail transaksi untuk produk ID: " . $row['id_produk']);
            }
        }

        // Hapus semua produk dari keranjang setelah transaksi berhasil
        mysqli_query($conn, "DELETE FROM toko_keranjang WHERE id_pelanggan = '$id_pelanggan'");

        // Commit transaksi
        mysqli_commit($conn);
        echo '<script>alert("Checkout berhasil! Terima kasih telah berbelanja.");location.href="riwayat_transaksi.php";</script>';
    } catch (Exception $e) {
        // Rollback jika terjadi kesalahan
        mysqli_rollback($conn);
        echo '<script>alert("Gagal melakukan checkout: ' . $e->getMessage() . '");location.href="keranjang.php";</script>';
    }
} else {
    echo '<script>alert("Keranjang Anda kosong!");location.href="home.php";</script>';
}
?>