<?php 
include "header.php";
include "koneksi.php";

// Ambil data produk berdasarkan ID produk dari URL
$qry_detail_produk = mysqli_query($conn, "SELECT * FROM toko_produk WHERE id_produk = '".$_GET['id_produk']."'");
$dt_produk = mysqli_fetch_array($qry_detail_produk);

// Cek apakah produk ditemukan
if (!$dt_produk) {
    echo "<script>alert('Produk tidak ditemukan!');location.href='home.php';</script>";
    exit();
}
?>

<h2>Beli Produk</h2>
<div class="row">
    <div class="col-md-4">
        <img src="foto_produk/<?=$dt_produk['foto_produk']?>" class="card-img-top" alt="<?=$dt_produk['nama_produk']?>">
    </div>
    <div class="col-md-8">
        <form action="proses_beli.php?id_produk=<?=$dt_produk['id_produk']?>" method="post">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>Nama Produk</td><td><?=$dt_produk['nama_produk']?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td><td><?=$dt_produk['deskripsi']?></td>
                    </tr>
                    <tr>
                        <td>Harga</td><td>Rp <?=number_format($dt_produk['harga'], 0, ',', '.');?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Beli</td><td><input type="number" name="jumlah_beli" value="1" min="1"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="btn btn-success" type="submit" value="BELI"></td>
                    </tr>
                </thead>
            </table>
        </form>
    </div>
</div>

<?php 
include "footer.php";
?>