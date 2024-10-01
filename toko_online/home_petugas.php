<?php 
session_start();
if ($_SESSION['status_login'] != true) {
    header('location: login_petugas.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #64b6f7, #3a8eeb);
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .container {
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.9); /* Warna putih transparan untuk background kontainer */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in-out;
        }

        h2 {
            color: #1565C0; /* Warna biru gelap untuk heading */
        }
        
        p.lead {
            color: #1e88e5; /* Warna biru sedang untuk teks utama */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        footer {
            background-color: #fff;
            color: #000;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php 
        include "header_petugas.php";
    ?>

    <!-- Main Content -->
    <div class="container">
        <h2>Selamat Datang, <?=$_SESSION['level']?> <?=$_SESSION['nama_petugas']?> di Dashboard Petugas</h2>
        <p class="lead">Kelola data pelanggan dan produk melalui halaman ini.</p>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users"></i> Data Pelanggan</h5>
                        <p class="card-text">Lihat dan kelola informasi pelanggan yang terdaftar.</p>
                        <a href="tampil_pelanggan.php" class="btn btn-primary">Lihat Data</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-box"></i> Produk</h5>
                        <p class="card-text">Manajemen data produk dan kategori.</p>
                        <a href="daftar_produk.php" class="btn btn-primary">Kelola Produk</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistik Penjualan</h5>
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <p>&copy; 2024 Dashboard Petugas | <a href="#" class="text-primary">Kontak Kami</a></p>
        <p>
            Follow us on:
            <a href="#" class="text-primary"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-primary"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-primary"><i class="fab fa-instagram"></i></a>
        </p>
    </footer>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
                datasets: [{
                    label: 'Penjualan',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
