<?php  
include "header.php";
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Selamat Datang, <?= $_SESSION['nama'] ?>!</h2>
    <p class="lead text-center mb-4">Silahkan berbelanja produk terbaik kami</p>

    <!-- Tampilan daftar produk secara grid -->
    <div class="row">
        <?php
        include "koneksi.php";
        $query = "SELECT * FROM toko_produk";
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card shadow border-0 rounded overflow-hidden">
                    <img src="foto_produk/<?= $row['foto_produk'] ?>" class="card-img-top" alt="<?= $row['nama_produk'] ?>" style="max-height: 250px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
                        <p class="card-text"><?= $row['deskripsi'] ?></p>
                        <p class="card-text"><strong>Rp <?= number_format($row['harga'], 0, ',', '.') ?></strong></p>
                        <div class="d-flex justify-content-center">
                            <a href="beli_produk.php?id_produk=<?= $row['id_produk'] ?>" class="btn btn-sm btn-outline-success mx-1">Beli</a>
                            <a href="tambah_keranjang.php?id=<?= $row['id_produk'] ?>" class="btn btn-sm btn-outline-primary mx-1">Tambah ke Keranjang</a>
                        </div>
                        <small class="text-muted">Tersedia</small>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Additional Styles -->
<style>
    body {
        background: linear-gradient(to right, #ffefba, #ffffff); /* Soft gradient background */
        color: #333;
        font-family: 'Arial', sans-serif;
    }

    h2 {
        font-size: 2.5rem; /* Larger heading */
        font-weight: bold; /* Bolder heading */
    }

    .card {
        transition: transform 0.3s, box-shadow 0.3s; /* Smooth transition */
        border-radius: 10px; /* Rounded corners */
    }

    .card:hover {
        transform: translateY(-10px); /* Lift effect */
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); /* Deeper shadow */
    }

    .lead {
        margin-bottom: 2rem; /* Space below lead text */
        font-weight: 300; /* Lighter weight */
    }

    .btn-outline-success, .btn-outline-primary {
        transition: background-color 0.3s, color 0.3s; /* Button hover effects */
    }

    .btn-outline-success:hover {
        background-color: #28a745; /* Change background on hover */
        color: white; /* Change text color */
    }

    .btn-outline-primary:hover {
        background-color: #007bff; /* Change background on hover */
        color: white; /* Change text color */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        h2 {
            font-size: 2rem; /* Adjust heading size on smaller screens */
        }
    }
</style>

<?php 
include "footer.php";
?>
