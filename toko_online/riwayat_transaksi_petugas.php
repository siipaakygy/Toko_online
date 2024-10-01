<?php
// Cek apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Memulai sesi jika belum dimulai
}

// Cek status login
if ($_SESSION['status_login'] != true) {
    header('location: login.php');
    exit();
}

// Koneksi ke database
include "koneksi.php";

// Ambil data transaksi
$query = "SELECT 
                toko_transaksi.id_transaksi, 
                toko_pelanggan.nama AS nama_pelanggan, 
                toko_produk.nama_produk, 
                toko_transaksi.tgl_transaksi, 
                SUM(toko_detail_transaksi.subtotal) AS total 
          FROM 
                toko_transaksi 
          JOIN 
                toko_pelanggan ON toko_transaksi.id_pelanggan = toko_pelanggan.id_pelanggan 
          JOIN 
                toko_detail_transaksi ON toko_transaksi.id_transaksi = toko_detail_transaksi.id_transaksi 
          JOIN 
                toko_produk ON toko_detail_transaksi.id_produk = toko_produk.id_produk
          GROUP BY 
                toko_transaksi.id_transaksi
          ORDER BY 
                toko_transaksi.tgl_transaksi DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #64b6f7, #3a8eeb);
            color: #fff;
        }

        .container {
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .card {
            background: #fff;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            color: #3a8eeb;
        }

        .card-footer {
            background: #f8f9fa;
            border-top: none;
        }
    </style>
</head>
<body>
<?php include "header_petugas.php"; ?>
    <div class="container">
        <h3 class="mb-4">Riwayat Transaksi</h3>
        
        <div class="row">
            <?php 
            $no = 0;
            while ($row = mysqli_fetch_assoc($result)):
                $no++; ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Pelanggan: <?= $row['nama_pelanggan'] ?></h6>
                            <p class="card-text">Tanggal: <?= $row['tgl_transaksi'] ?></p>
                            <p class="card-text">Total: <?= number_format($row['total'], 0, ',', '.') ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Transaksi #<?= $row['id_transaksi'] ?></small>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
