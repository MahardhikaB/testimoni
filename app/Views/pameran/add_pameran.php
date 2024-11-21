<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengalaman Pameran</title>
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
            background-color: #4E342E; /* Warna tombol kembali */
            color: #fff;
            font-weight: bold;
        }

        .btn-submit {
            background-color: #28a745; /* Warna tombol simpan */
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="form-title">Detail Pengalaman Pameran</h2>
        <form action="<?= base_url('pameran/store') ?>" method="post">
            <div class="row g-3">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="namaPameran" class="form-label">Nama Pameran</label>
                        <input type="text" class="form-control" id="namaPameran" name="nama_pameran" placeholder="Masukkan nama pameran" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPameran" class="form-label">Tanggal Pameran</label>
                        <input type="date" class="form-control" id="tanggalPameran" name="tanggal_pameran" required>
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="lokasiPameran" class="form-label">Lokasi Pameran</label>
                        <input type="text" class="form-control" id="lokasiPameran" name="lokasi_pameran" placeholder="Masukkan lokasi pameran" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiPameran" class="form-label">Deskripsi Pameran</label>
                        <textarea class="form-control" id="deskripsiPameran" name="deskripsi_pameran" rows="3" placeholder="Masukkan deskripsi pengalaman pameran"></textarea>
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
