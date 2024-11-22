<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ekspor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F4F7F6; /* Warna background lembut */
        }

        .form-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #FFFFFF; /* Warna background form */
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
        <h2 class="form-title">Edit Data Ekspor</h2>
        <form action="<?= base_url('ekspor/update/' . $ekspor['id_ekspor']) ?>" method="post">
            <div class="row g-3">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="userIdEkspor" class="form-label">User ID Ekspor</label>
                        <input type="number" class="form-control" id="userIdEkspor" name="user_id_ekspor"
                            value="<?= htmlspecialchars($ekspor['user_id_ekspor'], ENT_QUOTES) ?>" placeholder="Masukkan User ID Ekspor" required>
                    </div>
                    <div class="mb-3">
                        <label for="destinasiEkspor" class="form-label">Destinasi Ekspor</label>
                        <input type="text" class="form-control" id="destinasiEkspor" name="destinasi_ekspor"
                            value="<?= htmlspecialchars($ekspor['destinasi_ekspor'], ENT_QUOTES) ?>" placeholder="Masukkan Destinasi Ekspor" required>
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tahunEkspor" class="form-label">Tahun Ekspor</label>
                        <input type="number" class="form-control" id="tahunEkspor" name="tahun_ekspor"
                            value="<?= htmlspecialchars($ekspor['tahun_ekspor'], ENT_QUOTES) ?>" placeholder="Masukkan Tahun Ekspor" required>
                    </div>
                    <div class="mb-3">
                        <label for="produkEkspor" class="form-label">Produk Ekspor</label>
                        <input type="text" class="form-control" id="produkEkspor" name="produk_ekspor"
                            value="<?= htmlspecialchars($ekspor['produk_ekspor'], ENT_QUOTES) ?>" placeholder="Masukkan Produk Ekspor" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiEkspor" class="form-label">Deskripsi Ekspor</label>
                        <textarea class="form-control" id="deskripsiEkspor" name="deskripsi_ekspor" rows="3" placeholder="Masukkan Deskripsi Ekspor" required><?= htmlspecialchars($ekspor['deskripsi_ekspor'], ENT_QUOTES) ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Tombol Kembali dan Submit -->
            <div class="d-flex justify-content-center gap-3 mt-4">
                <button type="button" class="btn btn-back px-4" onclick="window.history.back()">Kembali</button>
                <button type="submit" class="btn btn-submit px-4">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
