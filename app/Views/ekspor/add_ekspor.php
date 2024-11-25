<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Ekspor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #EFF6FF; /* Background lembut */
        }

        .form-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #FFFFFF; /* Background form */
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #0D47A1;
        }

        .btn-back {
            background-color: #37474F; /* Tombol kembali */
            color: #fff;
            font-weight: bold;
        }

        .btn-submit {
            background-color: #1E88E5; /* Tombol simpan */
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="form-title">Tambah Data Ekspor</h2>
        <form action="<?= base_url('ekspor/store') ?>" method="post">
            <div class="row g-3">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="destinasiEkspor" class="form-label">Destinasi Ekspor</label>
                        <input type="text" class="form-control" id="destinasiEkspor" name="destinasi_ekspor"
                            placeholder="Masukkan negara tujuan ekspor" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahunEkspor" class="form-label">Tahun Ekspor</label>
                        <input type="number" class="form-control" id="tahunEkspor" name="tahun_ekspor" min="1900" max="<?= date('Y') ?>"
                            placeholder="Masukkan tahun ekspor" required>
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="produkEkspor" class="form-label">Produk Ekspor</label>
                        <input type="text" class="form-control" id="produkEkspor" name="produk_ekspor"
                            placeholder="Masukkan nama produk ekspor" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiEkspor" class="form-label">Deskripsi Ekspor</label>
                        <textarea class="form-control" id="deskripsiEkspor" name="deskripsi_ekspor" rows="3"
                            placeholder="Masukkan deskripsi ekspor"></textarea>
                    </div>
                </div>
            </div>

            <!-- Tombol Kembali dan Simpan -->
            <div class="d-flex justify-content-center gap-3 mt-4">
                <button type="button" class="btn btn-back" onclick="window.history.back()">Kembali</button>
                <button type="submit" class="btn btn-submit">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
