<?php 
if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='login_petugas.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('Password tidak boleh kosong');location.href='login_petugas.php';</script>";
    } else {
        include "koneksi.php";
        // Menggunakan md5 untuk enkripsi password
        $qry_login = mysqli_query($conn, "SELECT * FROM toko_petugas WHERE username = '".$username."' AND password = '".md5($password)."'");

        if(mysqli_num_rows($qry_login) > 0){
            $dt_login = mysqli_fetch_array($qry_login);
            session_start();
            // Menyimpan data login ke session
            $_SESSION['id_petugas'] = $dt_login['id_petugas'];
            $_SESSION['nama_petugas'] = $dt_login['nama_petugas'];
            $_SESSION['level'] = $dt_login['level'];
            $_SESSION['status_login'] = true;

            // Pesan sukses login dan redirect
            echo "<script>alert('Anda berhasil login');location.href='home_petugas.php';</script>";
        } else {
            // Pesan jika login gagal
            echo "<script>alert('Username dan Password tidak benar');location.href='login_petugas.php';</script>";
        }
    }
}
?>