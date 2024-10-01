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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Petugas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            font-family: 'Poppins', sans-serif;
            color: #333;
            position: relative;
            overflow-x: hidden;
        }

        .container {
            margin-top: 60px;
            max-width: 1100px;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .container:hover {
            transform: translateY(-10px);
        }

        h3 {
            text-align: center;
            margin-bottom: 40px;
            color: #ff5722;
            font-weight: 700;
            font-size: 40px;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #2196f3;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 18px;
            text-align: center;
            font-size: 16px;
            color: #333;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #e3f2fd;
        }

        tr:nth-child(odd) {
            background-color: #bbdefb;
        }

        tr:hover {
            background-color: #ff7043;
            color: white;
            transform: scale(1.05);
            transition: all 0.3s ease;
        }

        .btn {
            border-radius: 50px;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .btn-success {
            background-color: #4caf50;
            margin-right: 10px;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn-primary {
            background-color: #1e88e5;
            margin-top: 20px;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .table-container {
            margin-bottom: 40px;
            overflow-x: auto;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #666;
        }

        .parallax {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 400px;
            background: url('https://via.placeholder.com/1920x400') no-repeat center center;
            background-size: cover;
            z-index: -1;
            opacity: 0.1;
        }

        @media (max-width: 768px) {
            h3 {
                font-size: 30px;
            }

            .btn {
                font-size: 14px;
                padding: 10px 20px;
            }
        }

        /* New styles */
        .highlight {
            background-color: #f0f8ff; /* Light highlight for the entire container */
            border-radius: 15px; /* Rounded corners for the container */
        }

        .table-header {
            background: linear-gradient(90deg, #1e88e5, #2196f3); /* Gradient for the table header */
        }

        .icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon-container i {
            margin-right: 5px;
            font-size: 20px;
            transition: transform 0.2s;
        }

        .icon-container i:hover {
            transform: scale(1.2);
        }

    </style>
</head>
<body>
    <div class="parallax"></div>
    <div class="container highlight">
        <h3>Daftar Petugas</h3>
        <div class="table-container">
            <table class="table table-hover table-striped">
                <thead class="table-header">
                    <tr>
                        <th>NO</th>
                        <th>NAMA PETUGAS</th>
                        <th>USERNAME</th>
                        <th>LEVEL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "koneksi.php";
                    $qry_petugas = mysqli_query($conn, "SELECT * FROM toko_petugas");
                    $no = 0;
                    while ($data_petugas = mysqli_fetch_array($qry_petugas)) {
                        $no++; ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$data_petugas['nama_petugas']?></td>
                        <td><?=$data_petugas['username']?></td>
                        <td><?=$data_petugas['level']?></td>
                        <td>
                            <div class="icon-container">
                                <a href="ubah_petugas.php?id_petugas=<?=$data_petugas['id_petugas']?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </a> 
                                <a href="hapus_petugas.php?id_petugas=<?=$data_petugas['id_petugas']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <a href="tambah_petugas.php" class="btn btn-primary">
                <i class="fas fa-plus-circle icon"></i> Tambah Petugas
            </a>
            <a href="tampil_pelanggan.php" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Tampil Pelanggan
            </a>
            
            <a href="login_petugas.php" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Login petugas
            </a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Toko Petugas | All Rights Reserved</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
