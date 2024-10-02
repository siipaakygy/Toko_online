<?php
if($_POST){
    $Nama = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Level = $_POST['level'];

    if(empty($Nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } else {
        include "koneksi.php";
        // Tidak menyertakan kolom 'id' karena akan otomatis diisi oleh AUTO_INCREMENT
        $insert = mysqli_query($conn, "INSERT INTO toko_petugas (nama_petugas, username, password, level) 
        VALUES ('".$Nama."', '".$username."', '".md5($password)."', '".$Level."')") 
        or die(mysqli_error($conn));
        
        if($insert){
            echo "<script>alert('Sukses menambahkan pegawai');location.href='login_petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pegawai');location.href='tambah_petugas.php';</script>";
        }
    }
}
?>
