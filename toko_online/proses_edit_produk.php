<?php
if ($_POST) {
    include "koneksi.php";
    
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Jika ada file foto baru di-upload
    if ($_FILES['foto_produk']['name']) {
        $foto_produk = $_FILES['foto_produk']['name'];
        $target_dir = "images/";
        $target_file = $target_dir . basename($foto_produk);

        // Pindahkan file yang diupload ke folder tujuan
        move_uploaded_file($_FILES['foto_produk']['tmp_name'], $target_file);

        // Update data dengan foto baru
        $query = "UPDATE toko_produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', foto_produk='$foto_produk' WHERE id_produk='$id_produk'";
    } else {
        // Update data tanpa mengubah foto
        $query = "UPDATE toko_produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga' WHERE id_produk='$id_produk'";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Sukses memperbarui produk');location.href='daftar_produk.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui produk');location.href='edit_produk.php?id=$id_produk';</script>";
    }
}
?>