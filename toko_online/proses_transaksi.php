<?php
session_start();
include "koneksi.php"; // Koneksi ke database

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Ambil detail produk
    $query = mysqli_query($conn, "SELECT * FROM toko_produk WHERE id_produk = '$id_produk'");
    $produk = mysqli_fetch_assoc($query);

    if (!$produk) {
        echo "<script>alert('Produk tidak ditemukan');location.href='home.php';</script>";
        exit;
    }

    // Cek apakah pengguna sudah login
    if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
        echo "<script>alert('Anda harus login untuk melakukan transaksi');location.href='login.php';</script>";
        exit;
    }

    // Jika sudah login, simpan informasi transaksi
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $id_petugas = null; // Set ID petugas jika diperlukan
    $qty = 1; // Untuk saat ini, kita set jumlah menjadi 1
    $subtotal = $produk['harga'] * $qty; // Hitung subtotal

    // Mulai transaksi
    mysqli_begin_transaction($conn);
    try {
        // Simpan data transaksi ke tabel toko_transaksi
        $insert_transaksi = mysqli_query($conn, "INSERT INTO toko_transaksi (id_pelanggan, id_petugas, tgl_transaksi) VALUES ('$id_pelanggan', '$id_petugas', NOW())");
        $id_transaksi = mysqli_insert_id($conn); // Ambil ID transaksi terakhir yang disisipkan

        // Simpan detail transaksi ke tabel toko_detail_transaksi
        $insert_detail = mysqli_query($conn, "INSERT INTO toko_detail_transaksi (id_transaksi, id_produk, qty, subtotal) VALUES ('$id_transaksi', '$id_produk', '$qty', '$subtotal')");

        // Commit transaksi
        mysqli_commit($conn);
        
        echo "<script>alert('Transaksi berhasil!');location.href='transaksi.php';</script>";
    } catch (Exception $e) {
        // Rollback jika terjadi kesalahan
        mysqli_rollback($conn);
        echo "<script>alert('Gagal melakukan transaksi');location.href='home.php';</script>";
    }
} else {
    echo "<script>alert('ID produk tidak ditemukan');location.href='home.php';</script>";
}
?>