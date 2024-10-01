
<?php
session_start();
include "koneksi.php";


if (!isset($_SESSION['status_login'])) {
    echo "<script>alert('Silakan login terlebih dahulu');location.href='login.php';</script>";
    exit();
}

$id_pelanggan = $_SESSION['id_pelanggan'];

// Query untuk mendapatkan produk dalam keranjang
$query_keranjang = "SELECT toko_keranjang.*, toko_produk.nama_produk, toko_produk.harga, toko_produk.foto_produk 
                    FROM toko_keranjang 
                    JOIN toko_produk ON toko_keranjang.id_produk = toko_produk.id_produk 
                    WHERE toko_keranjang.id_pelanggan = '$id_pelanggan'";
$result_keranjang = mysqli_query($conn, $query_keranjang);

// Hitung total harga
$total_harga = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include "header.php"; ?>

    <div class="container mt-5">
        <h2>Keranjang Belanja</h2>

        <?php if (mysqli_num_rows($result_keranjang) > 0) { ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_keranjang)) { 
                        $subtotal = $row['harga'] * $row['jumlah'];
                        $total_harga += $subtotal;
                    ?>
                        <tr>
                            <td><img src="foto_produk/<?= $row['foto_produk'] ?>" alt="<?= $row['nama_produk'] ?>" style="width: 100px;"></td>
                            <td><?= $row['nama_produk'] ?></td>
                            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                            <td><?= $row['jumlah'] ?></td>
                            <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                            <td>
                                <a href="hapus_keranjang.php?id=<?= $row['id_keranjang'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="text-end">
                <h4>Total Harga: Rp <?= number_format($total_harga, 0, ',', '.') ?></h4>
                <a href="checkout.php" class="btn btn-success">Checkout</a>
            </div>
        <?php } else { ?>
            <div class="alert alert-info">Keranjang belanja Anda kosong.</div>
        <?php } ?>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>