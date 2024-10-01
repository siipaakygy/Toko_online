<?php
// Cek apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Memulai sesi jika belum dimulai
}

// Cek status login
if ($_SESSION['status_login'] != true) {
    header('location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background animation */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at 50% 50%, #141e30, #243b55);
            background-size: 300% 300%;
            animation: backgroundMove 15s ease infinite;
            color: #fff;
            overflow: hidden;
        }

        /* Gradient background animation */
        @keyframes backgroundMove {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }

        /* Form container styling */
        .container {
            max-width: 500px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            transform: perspective(500px) rotateX(5deg);
            animation: floating 4s ease-in-out infinite;
        }

        /* Floating animation */
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        /* Form heading with subtle shadow and gradient text */
        h3 {
            text-align: center;
            font-weight: bold;
            background: linear-gradient(90deg, #ff758c, #ff6a62);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 10px rgba(255, 120, 150, 0.7);
             margin-bottom: 30px;
        }

        /* Glowing form inputs */
        .form-control, .form-select {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            color: #fff;
            transition: all 0.3s ease;
        }

        /* Glow effect when focusing */
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 20px rgba(72, 207, 173, 0.7);
            border-color: rgba(72, 207, 173, 0.7);
            outline: none;
            transform: scale(1.05);
        }

        /* Stylish button with hover animation */
        .btn-primary {
            background: linear-gradient(45deg, #ff758c, #ff6a62);
            border: none;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.4s ease;
            width: 100%;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0 10px 20px rgba(255, 120, 150, 0.6);
            position: relative;
            overflow: hidden;
        }

        /* Button hover effect with expanding shadow */
        .btn-primary:hover {
            background: linear-gradient(45deg, #ff6a62, #ff758c);
            box-shadow: 0 15px 30px rgba(255, 120, 150, 0.8);
            transform: translateY(-5px) scale(1.05);
        }

        /* Button neon effect on hover */
        .btn-primary:after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.4s ease;
        }

        .btn-primary:hover:after {
            transform: scale(1.1);
            opacity: 0;
        }

        /* Particle animation */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: url('https://i.gifer.com/ZZ5H.gif') center/cover no-repeat;
            opacity: 0.05;
        }
    </style>
</head>
<body>
    <div class="particles"></div>

    <div class="container">
        <h3>Tambah Petugas</h3>
        <form action="proses_tambah_petugas.php" method="post">
            <div class="mb-3">
                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" placeholder="Masukkan nama petugas" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select name="level" class="form-select" id="level" required>
                    <option value="" disabled selected>Pilih Level</option>
                    <option value="CEO">CEO</option>
                    <option value="Manager">Manager</option>
                    <option value="Admin">Admin</option>
                    <option value="Karyawan">Karyawan</option>
                </select>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Tambah Petugas</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
