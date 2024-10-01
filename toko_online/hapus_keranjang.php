<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['status_login'])) {
    echo "<script>alert('Silakan login terlebih dahulu');location.href='login.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $id_keranjang = $_GET['id'];
    $query_hapus = "DELETE FROM toko_keranjang WHERE id_keranjang = '$id_keranjang'";
    
    if (mysqli_query($conn, $query_hapus)) {
        echo "<script>alert('Produk berhasil dihapus dari keranjang');location.href='keranjang.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus produk dari keranjang');location.href='keranjang.php';</script>";
    }
} else {
    echo "<script>alert('Aksi tidak valid');location.href='keranjang.php';</script>";
}
?>