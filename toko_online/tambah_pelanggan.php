<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            perspective: 1000px;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
            background: linear-gradient(120deg, #00c6ff, #0072ff, #00c6ff);
            background-size: 300% 300%;
            animation: gradient-animation 6s ease infinite;
        }

        @keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .parallax-container {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            perspective: 1000px;
            overflow: hidden;
            z-index: -1;
        }

        .layer {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            transform-style: preserve-3d;
        }

        .floating-object {
            position: absolute;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
            transition: transform 0.3s ease, background-color 0.3s;
        }

        /* Hover interaction for floating objects */
        .floating-object:hover {
            background-color: rgba(0, 198, 255, 0.8);
            transform: scale(1.2);
        }

        .floating-object:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-object:nth-child(2) {
            top: 50%;
            left: 80%;
            animation-delay: 2s;
        }

        .floating-object:nth-child(3) {
            top: 70%;
            left: 20%;
            animation-delay: 4s;
        }

        .floating-object:nth-child(4) {
            top: 10%;
            left: 50%;
            animation-delay: 3s;
            width: 40px;
            height: 40px;
        }

        .floating-object:nth-child(5) {
            top: 60%;
            left: 30%;
            animation-delay: 5s;
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 0;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .form-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            padding: 40px;
            width: 400px;
            text-align: center;
            position: relative;
            z-index: 10;
            animation: pop 0.5s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Neon glow on form elements */
        .form-control {
            border: 2px solid #0072ff;
            border-radius: 10px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #00c6ff;
            box-shadow: 0 0 15px rgba(0, 198, 255, 0.7);
        }

        .btn-primary {
            background-color: #0072ff;
            border-color: #0072ff;
            transition: background-color 0.3s, border-color 0.3s, transform 0.2s;
            box-shadow: 0 0 10px rgba(0, 114, 255, 0.5);
        }

        .btn-primary:hover {
            background-color: #00c6ff;
            border-color: #00c6ff;
            transform: translateY(-2px);
        }

        h3 {
            color: #0072ff;
            margin-bottom: 30px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .icon {
            font-size: 50px;
            color: #0072ff;
            margin-bottom: 20px;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #0072ff;
        }

        .footer a {
            color: #00c6ff;
            text-decoration: none;
            font-weight: bold;
        }

        /* Mouse move parallax effect */
        body {
            perspective: 1px;
        }

        .parallax-container {
            transform: translateZ(-2px) scale(3);
        }
    </style>
    <title>Register</title>
</head>
<body>
    <div class="parallax-container">
        <div class="floating-object"></div>
        <div class="floating-object"></div>
        <div class="floating-object"></div>
        <div class="floating-object"></div>
        <div class="floating-object"></div>
    </div>

    <div class="form-container">
        <i class="fas fa-user-plus icon"></i>
        <h3>Register</h3>
        <form action="proses_tambah_pelanggan.php" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat:</label>
                <textarea name="Alamat" class="form-control" id="Alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="no_tlp" class="form-label">No Telepon:</label>
                <input type="text" name="no_tlp" class="form-control" id="no_tlp" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Tambah Pelanggan</button>
        </form>
        <div class="footer">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
