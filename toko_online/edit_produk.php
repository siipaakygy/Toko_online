<?php 
session_start();
if($_SESSION['status_login'] != true){
    header('location: login_petugas.php');
    exit();
}

// Koneksi ke database
include "koneksi.php";

// Ambil ID produk yang akan diedit
$id_produk = $_GET['id_produk'];

// Ambil data produk berdasarkan ID dari database
$query = "SELECT * FROM toko_produk WHERE id_produk = '$id_produk'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Produk</title>
    <style>
        body {
            background-image: url('https://www.example.com/library-background.jpg'); /* Ganti dengan URL gambar latar belakang */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px 0px #000;
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }
        .btn-primary:hover {
            background-color: #1a252f;
            border-color: #1a252f;
        }
        .current-image {
            display: block;
            margin-bottom: 10px;
            max-height: 200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center my-4">Edit Produk</h3>
        <div class="form-container">
            <form id="editProdukForm" action="proses_edit_produk.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_produk" value="<?= $row['id_produk'] ?>">
                <div class="mb-3">
                    <label for="namaProduk" class="form-label">Nama Produk:</label>
                    <input type="text" id="namaProduk" name="nama_produk" class="form-control" value="<?= $row['nama_produk'] ?>">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <input type="text" id="deskripsi" name="deskripsi" class="form-control" value="<?= $row['deskripsi'] ?>">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga:</label>
                    <input type="number" id="harga" name="harga" class="form-control" value="<?= $row['harga'] ?>">
                </div>
                <div class="mb-3">
                    <label for="fotoProduk" class="form-label">Foto Produk:</label>
                    <!-- Tampilkan gambar produk yang sudah ada -->
                    <img src="images/<?= $row['foto_produk'] ?>" alt="Foto Produk" class="current-image">
                    <input type="file" id="fotoProduk" name="foto_produk" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update Produk</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>