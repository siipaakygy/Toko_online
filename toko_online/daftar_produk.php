<?php 
session_start();
if($_SESSION['status_login'] != true){
    header('location: login_petugas.php');
    exit();
}

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
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #1e88e5;
            color: white;
        }
        .navbar-brand {
            font-weight: bold;
            color: white;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            margin-bottom: 20px;
            border: none;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }
        .btn-primary:hover {
            background-color: #1a252f;
            border-color: #1a252f;
        }
        .btn-danger {
            background-color: #e74c3c;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        .img-hover-zoom {
            overflow: hidden;
            border-radius: 10px;
            position: relative;
            height: 300px;
        }
        .img-hover-zoom img {
            transition: transform 0.5s ease;
            border-radius: 10px;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .img-hover-zoom:hover img {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<?php include "header_petugas.php"; ?>
    
    <!-- Daftar Produk -->
    <div class="container">
        <h3 class="mt-4">Daftar Produk</h3>
        <div class="row">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="img-hover-zoom">
                            <img src="foto_produk/<?= $row['foto_produk'] ?>" alt="<?= $row['nama_produk'] ?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
                            <p class="card-text"><?= $row['deskripsi'] ?></p>
                            <p class="card-text"><strong>Rp<?= number_format($row['harga'], 0, ',', '.') ?></strong></p>
                            <div class="d-flex justify-content-between">
                                <a href="edit_produk.php?id_produk=<?= $row['id_produk'] ?>" class="btn btn-primary">Edit</a>
                                <a href="hapus_produk.php?id_produk=<?= $row['id_produk'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
