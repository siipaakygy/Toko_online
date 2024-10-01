<?php
if($_POST){
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $alamat = $_POST['Alamat'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Validasi form
    if(empty($nama)){
        echo "<script>alert('Nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else {
        include "koneksi.php";
        
        // Jika password kosong, tidak mengupdate field password
        if(empty($password)){
            $update = mysqli_query($conn, 
                "UPDATE toko_pelanggan 
                SET nama='$nama', alamat='$alamat', telp='$telp', username='$username' 
                WHERE id_pelanggan='$id_pelanggan'") 
                or die(mysqli_error($conn));
        } else {
            // Jika password tidak kosong, mengupdate semua field termasuk password
            $update = mysqli_query($conn, 
                "UPDATE toko_pelanggan 
                SET nama='$nama', alamat='$alamat', telp='$telp', username='$username', password='$password' 
                WHERE id_pelanggan='$id_pelanggan'") 
                or die(mysqli_error($conn));
        }
        
        // Pengecekan apakah update berhasil
        if($update){
            echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id=".$id_pelanggan."';</script>";
        }
    }
}
?>