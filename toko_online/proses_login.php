<?php 
if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
    } else {
        include "koneksi.php";
        
        // Encrypt password dengan md5
        $encrypted_password = md5($password);
        
        // Query untuk mengecek user dan password
        $qry_login = mysqli_query($conn, "SELECT * FROM toko_pelanggan WHERE username = '".$username."' AND password = '".$encrypted_password."'");
        
        if(mysqli_num_rows($qry_login) > 0){
            $dt_login = mysqli_fetch_array($qry_login);
            session_start();
            $_SESSION['id_pelanggan'] = $dt_login['id_pelanggan'];
            $_SESSION['nama'] = $dt_login['nama'];
            $_SESSION['status_login'] = true;

            // Redirect ke halaman home
            header("location: home.php");
        } else {
            echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
        }
    }
}
?>