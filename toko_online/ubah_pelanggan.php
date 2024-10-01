<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #ff6b6b, #556270);
            font-family: 'Arial', sans-serif;
            color: #fff;
            overflow-x: hidden;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background: rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h3 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 28px;
        }
        .form-floating .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 15px 10px;
            height: auto;
        }
        .form-floating label {
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.25);
            box-shadow: none;
            border-color: #ff6b6b;
        }
        .btn-primary {
            background-color: #ff6b6b;
            border: none;
            border-radius: 30px;
            padding: 12px 40px;
            font-size: 18px;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #d54b4b;
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.3);
        }
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        .text-center {
            margin-top: 40px;
        }
        .container::before {
            content: "";
            position: absolute;
            top: -100%;
            left: -100%;
            width: 200%;
            height: 200%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.05), transparent);
            animation: rotate 10s infinite linear;
        }
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <title>Ubah Pelanggan</title>
</head>
<body>
    <div class="container position-relative">
        <?php 
        include "koneksi.php";
        $qry_get_pelanggan=mysqli_query($conn,"select * from toko_pelanggan where id_pelanggan = '".$_GET['id_pelanggan']."'");
        $dt_pelanggan=mysqli_fetch_array($qry_get_pelanggan);
        ?>
        <h3>Ubah Pelanggan</h3>
        <form action="proses_ubah_pelanggan.php" method="post">
            <input type="hidden" name="id_pelanggan" value="<?=$dt_pelanggan['id_pelanggan']?>">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?=$dt_pelanggan['nama']?>" required>
                <label for="nama">Nama</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" id="alamat" name="Alamat" placeholder="Alamat" rows="4" required><?=$dt_pelanggan['alamat']?></textarea>
                <label for="alamat">Alamat</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="telp" name="telp" placeholder="No Telepon" value="<?=$dt_pelanggan['telp']?>" required>
                <label for="telp">No Telepon</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?=$dt_pelanggan['username']?>" required>
                <label for="username">Username</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password (Leave blank if unchanged)</label>
            </div>

            <div class="text-center">
                <input type="submit" name="simpan" value="Ubah Pelanggan" class="btn btn-primary">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
