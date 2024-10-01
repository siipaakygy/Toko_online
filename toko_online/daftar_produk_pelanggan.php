<?php 
// Koneksi ke database
include "koneksi.php";

// Ambil data produk dari database
$query = "SELECT * FROM toko_produk";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?shopping,store') no-repeat center center fixed; /* Beautiful background image */
            background-size: cover; /* Cover the whole page */
            color: #333;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: rgba(30, 136, 229, 0.8); /* Slightly transparent navbar */
            color: white;
        }

        .navbar-brand {
            font-weight: bold;
            color: white;
        }

        .container {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .card {
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.05); /* Slight scale effect on hover */
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
        }

        .card-title {
            color: #007bff;
            font-weight: bold; /* Bold title for emphasis */
        }

        .card-title:hover {
            color: #0056b3;
        }

        .btn-success, .btn-primary {
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        footer {
            margin-top: 20px;
            padding: 20px 0;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        /* Custom styles for responsiveness */
        @media (max-width: 576px) {
            .container {
                padding: 1rem; /* Smaller padding for mobile */
            }
        }
    </style>
</head>
<body>
<?php include "header.php"; ?>

<!-- Daftar Produk -->
<div class="container">
    <h3 class="mt-4 text-center">Daftar Produk</h3>
    <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="foto_produk/<?= $row['foto_produk'] ?>" class="card-img-top" alt="<?= $row['nama_produk'] ?>" style="max-height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
                        <p class="card-text"><?= $row['deskripsi'] ?></p>
                        <p class="card-text"><strong>Rp <?= number_format($row['harga'], 0, ',', '.') ?></strong></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="beli_produk.php?id_produk=<?= $row['id_produk'] ?>" class="btn btn-sm btn-success">Beli</a>
                                <a href="tambah_keranjang.php?id=<?= $row['id_produk'] ?>" class="btn btn-sm btn-primary">Tambah ke Keranjang</a>
                            </div>
                            <small class="text-muted">Tersedia</small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<footer>
    <p>&copy; <?= date("Y") ?> Toko Online. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
