<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['status_login'])) {
    echo "<script>alert('Silakan login terlebih dahulu');location.href='login.php';</script>";
}

if(isset($_GET['id'])) {
    $id_produk = $_GET['id'];
    $id_pelanggan = $_SESSION['id_pelanggan'];

    // Menampilkan produk yang ingin ditambahkan ke keranjang
    $query_produk = "SELECT * FROM toko_produk WHERE id_produk = '$id_produk'";
    $result_produk = mysqli_query($conn, $query_produk);
    $produk = mysqli_fetch_assoc($result_produk);
}
?>

<html>
    <head>
        <title>Tambah ke Keranjang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-...">
    </head>
    <body>
        <div class="container mt-5">
            <h3>Tambah Produk ke Keranjang</h3>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $produk['nama_produk'] ?></h5>
                    <p class="card-text"><?= $produk['deskripsi'] ?></p>
                    <p class="card-text"><strong>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></strong></p>
                    
                    <form action="proses_tambah_keranjang.php" method="post">
                        <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" value="1" min="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>