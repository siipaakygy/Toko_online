<?php 
session_start();
include "koneksi.php"; // Koneksi ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    echo "<script>alert('Anda harus login untuk melihat riwayat transaksi');location.href='login.php';</script>";
    exit;
}

// Ambil ID pelanggan dari session
$id_pelanggan = $_SESSION['id_pelanggan'];

// Query untuk mengambil riwayat transaksi
$query = "
    SELECT tt.*, td.*, tp.nama_produk 
    FROM toko_transaksi tt 
    JOIN toko_detail_transaksi td ON tt.id_transaksi = td.id_transaksi 
    JOIN toko_produk tp ON td.id_produk = tp.id_produk 
    WHERE tt.id_pelanggan = '$id_pelanggan' 
    ORDER BY tt.tgl_transaksi DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Riwayat Transaksi Anda</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['id_transaksi'] ?></td>
                        <td><?= $row['nama_produk'] ?></td>
                        <td><?= $row['qty'] ?></td>
                        <td>Rp <?= number_format($row['subtotal'], 0, ',', '.') ?></td>
                        <td><?= $row['tgl_transaksi'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="home.php" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</body>
</html>