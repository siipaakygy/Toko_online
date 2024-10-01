<?php
if($_POST){
    $Nama = $_POST['nama'];
    $Alamat = $_POST['Alamat'];
    $No_telp = $_POST['no_tlp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($Nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else {
        include "koneksi.php";
        // Tidak menyertakan kolom 'id' karena akan otomatis diisi oleh AUTO_INCREMENT
        $insert = mysqli_query($conn, "INSERT INTO toko_pelanggan (nama, alamat, telp, username, password) 
        VALUES ('".$Nama."', '".$Alamat."','".$No_telp."', '".$username."', '".md5($password)."')") 
        or die(mysqli_error($conn));
        
        if($insert){
            echo "<script>alert('Sukses menambahkan pelanggan');location.href='tampil_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
        }
    }
}
?>
