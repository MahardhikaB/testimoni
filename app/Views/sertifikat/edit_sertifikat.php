<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sertifikat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFFFFF;
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
            color: #4E342E;
        }

        .btn-back {
            background-color: #6c757d; /* Warna tombol kembali */
            color: #ffffff;
            font-weight: bold;
            border: none;
        }

        .btn-submit {
            background-color: #28a745; /* Warna tombol simpan */
            color: #ffffff;
            font-weight: bold;
            border: none;
        }

        .btn-back:hover,
        .btn-submit:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="form-title">Edit Sertifikat</h2>
        <form action="<?= base_url('sertifikat/update/' . $sertifikat['id_sertifikat']) ?>" method="post">
            <div class="row g-3">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judulSertifikat" class="form-label">Judul Sertifikat</label>
                        <input type="text" class="form-control" id="judulSertifikat" name="judul_sertifikat"
                            value="<?= htmlspecialchars($sertifikat['judul_sertifikat'], ENT_QUOTES) ?>" placeholder="Masukkan judul sertifikat" required>
                    </div>
                    <div class="mb-3">
                        <label for="noSertifikat" class="form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control" id="noSertifikat" name="no_sertifikat"
                            value="<?= htmlspecialchars($sertifikat['no_sertifikat'], ENT_QUOTES) ?>" placeholder="Masukkan nomor sertifikat" required>
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggalTerbitSertifikat" class="form-label">Tanggal Terbit</label>
                        <input type="date" class="form-control" id="tanggalTerbitSertifikat" name="tanggal_terbit_sertifikat"
                            value="<?= $sertifikat['tanggal_terbit_sertifikat'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbitSertifikat" class="form-label">Penerbit Sertifikat</label>
                        <input type="text" class="form-control" id="penerbitSertifikat" name="penerbit_sertifikat"
                            value="<?= htmlspecialchars($sertifikat['penerbit_sertifikat'], ENT_QUOTES) ?>" placeholder="Masukkan penerbit sertifikat" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipeSertifikat" class="form-label">Tipe Sertifikat</label>
                        <select class="form-select" id="tipeSertifikat" name="tipe" required>
                            <option value="0" <?= $sertifikat['tipe'] == '0' ? 'selected' : '' ?>>Tipe Awal</option>
                            <option value="1" <?= $sertifikat['tipe'] == '1' ? 'selected' : '' ?>>Tipe Akhir</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Tombol Kembali dan Simpan -->
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
