<?php
// Cek apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Memulai sesi jika belum dimulai
}

// Cek status login petugas
if ($_SESSION['status_login'] != true) {
    header('location: login.php');
    exit();
}

// Koneksi ke database
include "koneksi.php";

// Cek apakah ada id_produk yang dikirim melalui URL
if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Mulai transaksi
    mysqli_begin_transaction($conn);

    try {
        // Hapus detail transaksi yang terkait dengan produk ini
        $query_hapus_detail = "DELETE FROM toko_detail_transaksi WHERE id_produk = '$id_produk'";
        if (!mysqli_query($conn, $query_hapus_detail)) {
            throw new Exception("Gagal menghapus detail transaksi");
        }

        // Hapus produk dari tabel toko_produk
        $query_hapus_produk = "DELETE FROM toko_produk WHERE id_produk = '$id_produk'";
        if (!mysqli_query($conn, $query_hapus_produk)) {
            throw new Exception("Gagal menghapus produk");
        }

        // Commit transaksi
        mysqli_commit($conn);
        echo "<script>alert('Produk dan detail transaksi terkait berhasil dihapus');location.href='daftar_produk.php';</script>";
    } catch (Exception $e) {
        // Rollback jika terjadi kesalahan
        mysqli_rollback($conn);
        echo "<script>alert('Error: " . $e->getMessage() . "');location.href='daftar_produk.php';</script>";
    }
} else {
    echo "<script>alert('ID produk tidak ditemukan');location.href='daftar_produk.php';</script>";
}
?>
