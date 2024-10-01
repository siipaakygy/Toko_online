<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <title>Edit Petugas</title>
    <style>
        body {
            background: linear-gradient(135deg, #3498db, #8e44ad); /* Gradient background */
            font-family: 'Montserrat', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff; /* White text for contrast */
            overflow: hidden;
        }

        .container {
            background-color: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            color: #333; /* Dark text for readability */
            text-align: center;
            position: relative;
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h3 {
            font-size: 26px;
            color: #3498db; /* Primary color for heading */
            font-weight: 600;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            text-align: left;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 18px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.4);
            border-color: #3498db;
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
            border-radius: 10px;
            padding: 14px 24px;
            width: 100%;
            font-weight: 600;
            color: #fff;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-3px); /* Slight hover lift effect */
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .container::before {
            content: "";
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            height: 60px;
            width: 60px;
            background: #3498db;
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(52, 152, 219, 0.5);
            z-index: -1;
            animation: pulse 2s infinite ease-in-out;
        }

        @keyframes pulse {
            0%, 100% {
                transform: translateX(-50%) scale(1);
                opacity: 1;
            }
            50% {
                transform: translateX(-50%) scale(1.2);
                opacity: 0.7;
            }
        }

        footer {
            margin-top: 20px;
            font-size: 14px;
            color: #fff;
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <?php 
        include "koneksi.php";
        $qry_get_petugas = mysqli_query($conn, "SELECT * FROM toko_petugas WHERE id_petugas = '".$_GET['id_petugas']."'");
        $dt_petugas = mysqli_fetch_array($qry_get_petugas);
        ?>
        <h3>Edit Petugas</h3>
        <form action="proses_ubah_petugas.php" method="post">
            <input type="hidden" name="id_petugas" value="<?=$dt_petugas['id_petugas']?>">

            <div class="mb-3">
                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                <input type="text" name="nama_petugas" id="nama_petugas" value="<?=$dt_petugas['nama_petugas']?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" value="<?=$dt_petugas['username']?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Leave empty to keep unchanged">
            </div>

            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select name="level" class="form-select" id="level" required>
                    <option value="" disabled selected>Pilih Level</option>
                    <option value="CEO" <?= $dt_petugas['level'] == 'CEO' ? 'selected' : '' ?>>CEO</option>
                    <option value="Manager" <?= $dt_petugas['level'] == 'Manager' ? 'selected' : '' ?>>Manager</option>
                    <option value="Admin" <?= $dt_petugas['level'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="Karyawan" <?= $dt_petugas['level'] == 'Karyawan' ? 'selected' : '' ?>>Karyawan</option>
                </select>
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">Ubah Petugas</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
