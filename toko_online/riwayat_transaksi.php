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

// Ambil ID pelanggan dari sesi
$id_pelanggan = $_SESSION['id_pelanggan'];

// Ambil data transaksi hanya untuk pelanggan yang sedang login
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
          WHERE 
                toko_transaksi.id_pelanggan = '$id_pelanggan' -- Filter berdasarkan ID pelanggan
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
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            font-family: 'Arial', sans-serif; /* Font style */
        }
        .container {
            margin-top: 5rem;
            background-color: rgba(255, 255, 255, 0.9); /* White background */
            border-radius: 10px; /* Rounded corners */
            padding: 2rem; /* Padding around the content */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }
        h3 {
            color: #007bff; /* Heading color */
        }
        table {
            transition: transform 0.3s;
        }
        table:hover {
            transform: scale(1.01); /* Slight scale effect on hover */
        }
        th {
            background-color: #007bff; /* Blue background for header */
            color: white; /* White text for header */
        }
        td {
            vertical-align: middle; /* Center align cell content */
        }
    </style>
</head>
<body>
<?php include "header.php"; ?>
    <div class="container mt-5">
        <h3>Riwayat Transaksi</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Produk</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                while ($row = mysqli_fetch_assoc($result)):
                    $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                    <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                    <td><?= htmlspecialchars($row['tgl_transaksi']) ?></td>
                    <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td> <!-- Format total harga -->
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
