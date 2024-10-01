<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
        }
        .container {
            margin-top: 50px;
            max-width: 1200px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card-header {
            background: #005f73;
            color: white;
            font-weight: 600;
            font-size: 24px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 20px;
            text-align: center;
        }
        h3 {
            text-align: center;
            margin-bottom: 30px;
            color: #ffffff;
            font-weight: bold;
            font-size: 36px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background-color: #0072ff;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 18px;
        }
        td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: rgba(0, 198, 255, 0.3);
        }
        tr:nth-child(odd) {
            background-color: rgba(0, 114, 255, 0.3);
        }
        tr:hover {
            background-color: #005f73;
            color: white;
            transition: background-color 0.3s;
        }
        .btn {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-weight: bold;
        }
        .btn-success {
            background-color: #4caf50;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-primary {
            background-color: #2196f3;
        }
        .btn-primary:hover {
            background-color: #1976d2;
            transform: scale(1.05);
        }
        .btn-success:hover {
            background-color: #388e3c;
            transform: scale(1.05);
        }
        .btn-danger:hover {
            background-color: #c62828;
            transform: scale(1.05);
        }
        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #ffffff;
        }
        .icon {
            font-size: 20px;
            margin-right: 5px;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Tampil Pelanggan</h3>
        <div class="card">
            <div class="card-header">Daftar Pelanggan</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>ALAMAT</th>
                                <th>NO TELEPON</th>
                                <th>USERNAME</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            include "koneksi.php";
                            $qry_pelanggan = mysqli_query($conn, "SELECT * FROM toko_pelanggan");
                            $no = 0;
                            while ($data_pelanggan = mysqli_fetch_array($qry_pelanggan)) {
                                $no++; ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$data_pelanggan['nama']?></td>
                                <td><?=$data_pelanggan['alamat']?></td>
                                <td><?=$data_pelanggan['telp']?></td>
                                <td><?=$data_pelanggan['username']?></td>
                                <td>
                                    <a href="ubah_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" class="btn btn-success btn-sm"><i class="fas fa-edit icon"></i>Ubah</a> 
                                    <a href="hapus_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt icon"></i>Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="tambah_pelanggan.php" class="btn btn-primary btn-lg"><i class="fas fa-plus-circle icon"></i>Tambah Pelanggan</a>
            <a href="tampil_petugas.php" class="btn btn-primary btn-lg"><i class="fas fa-user-shield icon"></i>Tampil Petugas</a>
            <a href="login.php" class="btn btn-primary btn-lg"><i class="fas fa-user-shield icon"></i>Login</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Toko Pelanggan | All Rights Reserved</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
