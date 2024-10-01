<?php
session_start();
include "koneksi.php";

if ($_POST) {
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $id_pelanggan = $_SESSION['id_pelanggan'];

    // Cek apakah produk sudah ada di keranjang
    $query_check = "SELECT * FROM toko_keranjang WHERE id_pelanggan = '$id_pelanggan' AND id_produk = '$id_produk'";
    $result_check = mysqli_query($conn, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Jika produk sudah ada di keranjang, tambahkan jumlahnya
        $query_update = "UPDATE toko_keranjang SET jumlah = jumlah + '$jumlah' WHERE id_pelanggan = '$id_pelanggan' AND id_produk = '$id_produk'";
        if (mysqli_query($conn, $query_update)) {
            echo "<script>alert('Jumlah produk berhasil diperbarui di keranjang');location.href='home.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui keranjang');location.href='home.php';</script>";
        }
    } else {
        // Jika produk belum ada di keranjang, tambahkan produk baru ke keranjang
        $query_insert = "INSERT INTO toko_keranjang (id_pelanggan, id_produk, jumlah) VALUES ('$id_pelanggan', '$id_produk', '$jumlah')";
        if (mysqli_query($conn, $query_insert)) {
            echo "<script>alert('Produk berhasil ditambahkan ke keranjang');location.href='home.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan produk ke keranjang');location.href='home.php';</script>";
        }
    }
} else {
    echo "<script>alert('Aksi tidak valid');location.href='home.php';</script>";
}
?>