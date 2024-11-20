<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Sertifikat</title>
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
        <h2 class="form-title">Detail Sertifikat</h2>
        <form action="<?= base_url('sertifikat/store') ?>" method="post">
            <div class="row g-3">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judulSertifikat" class="form-label">Judul Sertifikat</label>
                        <input type="text" class="form-control" id="judulSertifikat" name="judul_sertifikat" placeholder="Masukkan judul sertifikat">
                    </div>
                    <div class="mb-3">
                        <label for="noSertifikat" class="form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control" id="noSertifikat" name="no_sertifikat" placeholder="Masukkan nomor sertifikat">
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggalTerbitSertifikat" class="form-label">Tanggal Terbit Sertifikat</label>
                        <input type="date" class="form-control" id="tanggalTerbitSertifikat" name="tanggal_terbit_sertifikat">
                    </div>
                    <div class="mb-3">
                        <label for="penerbitSertifikat" class="form-label">Penerbit Sertifikat</label>
                        <input type="text" class="form-control" id="penerbitSertifikat" name="penerbit_sertifikat" placeholder="Masukkan penerbit sertifikat">
                    </div>
                    <div class="mb-3">
                        <label for="tipeSertifikat" class="form-label">Tipe Sertifikat</label>
                        <select class="form-select" id="tipeSertifikat" name="tipe">
                            <option value="0" selected>Tipe Awal</option>
                            <option value="1">Tipe Akhir</option>
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
