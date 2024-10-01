<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tambah Produk</title>
    <style>
        body {
            background-image: url('https://www.example.com/library-background.jpg'); /* Ganti dengan URL gambar latar belakang perpustakaan */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px 0px #000;
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }
        .btn-primary:hover {
            background-color: #1a252f;
            border-color: #1a252f;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center my-4">Tambah Produk</h3>
        <div class="form-container">
            <form id="tambahProdukForm" action="proses_tambah_produk.php" method="post">
                <div class="mb-3">
                    <label for="namaProduk" class="form-label">Nama Produk:</label>
                    <input type="text" id="namaProduk" name="nama_produk" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <input type="text" id="deskripsi" name="deskripsi" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga:</label>
                    <input type="number" id="harga" name="harga" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="fotoProduk" class="form-label">Foto Produk:</label>
                    <input type="file" id="fotoProduk" name="foto_produk" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Produk</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('tambahProdukForm').addEventListener('submit', function(event) {
            var namaProduk = document.getElementById('namaProduk').value;
            var deskripsi = document.getElementById('deskripsi').value;
            var harga = document.getElementById('harga').value;
            var fotoProduk = document.getElementById('fotoProduk').value;

            if (namaProduk === '' || deskripsi === '' || fotoProduk === '') {
                alert('Semua kolom harus diisi!');
                event.preventDefault();
            } else {
                alert('Produk berhasil ditambahkan!');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>