<?php 
session_start();
if ($_SESSION['status_login'] != true) {
    header('location: login_petugas.php');
    exit();
}

// Koneksi ke database
include "koneksi.php";

// Cek jika data produk dan jumlah telah dikirim
if (isset($_POST['jumlah_beli']) && isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    $qty = $_POST['jumlah_beli'];
    $id_pelanggan = $_SESSION['id_pelanggan']; // ID pelanggan dari sesi
    $id_petugas = isset($_SESSION['id_petugas']) ? $_SESSION['id_petugas'] : null; // Menggunakan NULL jika tidak ada petugas
    $tgl_transaksi = date('Y-m-d'); // Tanggal transaksi

    // Mulai transaksi
    mysqli_begin_transaction($conn);
    try {
        // Simpan data transaksi ke tabel toko_transaksi
        $insert_transaksi = mysqli_query($conn, "INSERT INTO toko_transaksi (id_pelanggan, id_petugas, tgl_transaksi) VALUES ('$id_pelanggan', " . ($id_petugas ? "'$id_petugas'" : "NULL") . ", '$tgl_transaksi')");
        
        if (!$insert_transaksi) {
            throw new Exception("Gagal menyimpan transaksi: " . mysqli_error($conn));
        }

        $id_transaksi = mysqli_insert_id($conn); // Ambil ID transaksi terakhir yang disisipkan

        // Ambil harga produk
        $query_produk = mysqli_query($conn, "SELECT harga FROM toko_produk WHERE id_produk = '$id_produk'");
        $data_produk = mysqli_fetch_assoc($query_produk);
        $subtotal = $data_produk['harga'] * $qty; // Hitung subtotal

        // Simpan detail transaksi ke tabel toko_detail_transaksi
        $insert_detail = mysqli_query($conn, "INSERT INTO toko_detail_transaksi (id_transaksi, id_produk, qty, subtotal) VALUES ('$id_transaksi', '$id_produk', '$qty', '$subtotal')");
        
        if (!$insert_detail) {
            throw new Exception("Gagal menyimpan detail transaksi: " . mysqli_error($conn));
        }

        // Commit transaksi
        mysqli_commit($conn);
        echo "<script>alert('Transaksi berhasil!');location.href='riwayat_transaksi.php';</script>";
    } catch (Exception $e) {
        // Rollback jika terjadi kesalahan
        mysqli_rollback($conn);
        echo "<script>alert('Gagal melakukan transaksi: " . $e->getMessage() . "');location.href='home.php';</script>";
    }
} else {
    echo "<script>alert('Tidak ada data yang dikirim');location.href='home.php';</script>";
}
?>