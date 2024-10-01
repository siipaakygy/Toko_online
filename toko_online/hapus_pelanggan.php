<?php 
    if($_GET['id_pelanggan']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($conn,"delete from toko_pelanggan where id_pelanggan='".$_GET['id_pelanggan']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus petugas');location.href='tampil_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus petugas');location.href='tampil_pelanggan.php';</script>";
        }
    }
?>