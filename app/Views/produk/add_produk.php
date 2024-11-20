<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF7E5; /* Warna background lembut */
        }

        .form-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #FFFBEA; /* Warna background form */
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-back {
            background-color: #4E342E; /* Warna tombol */
            color: #fff;
            font-weight: bold;
        }

        .btn-submit {
            background-color: #28a745; /* Warna tombol submit */
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="form-title">Detail Produk</h2>
        <form action="<?= base_url('produk/store') ?>" method="post">
            <div class="row g-3">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="namaProduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="namaProduk" name="nama_produk" placeholder="Masukkan nama produk">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiProduk" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="deskripsiProduk" name="deskripsi_produk" rows="3" placeholder="Masukkan deskripsi produk"></textarea>
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hargaProduk" class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" id="hargaProduk" name="harga_produk" placeholder="Masukkan harga produk">
                    </div>
                    <div class="mb-3">
                        <label for="ketersediaanProduk" class="form-label">Ketersediaan Produk</label>
                        <select class="form-select" id="ketersediaanProduk" name="ketersediaan_produk">
                            <option value="tersedia" selected>Tersedia</option>
                            <option value="habis">Habis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipeProduk" class="form-label">Tipe Produk</label>
                        <select class="form-select" id="tipeProduk" name="tipe">
                            <option value="0" selected>Produk Awal</option>
                            <option value="1">Produk Akhir</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Tombol Kembali dan Submit -->
            <div class="d-flex justify-content-center gap-3 mt-4">
                <button type="button" class="btn btn-back">Kembali</button>
                <button type="submit" class="btn btn-submit">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
