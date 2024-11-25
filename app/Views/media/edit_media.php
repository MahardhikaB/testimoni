<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Media</title>
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
        <h2 class="form-title">Edit Media</h2>
        <form action="<?= base_url('media/update/' . $media['id_media']) ?>" method="post">
            <div class="row g-3">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="namaMedia" class="form-label">Nama Media</label>
                        <input type="text" class="form-control" id="namaMedia" name="nama_media"
                            value="<?= htmlspecialchars($media['nama_media'], ENT_QUOTES) ?>" placeholder="Masukkan Nama Media" required>
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tahunMedia" class="form-label">Tahun Media</label>
                        <input type="number" class="form-control" id="tahunMedia" name="tahun_media"
                            value="<?= htmlspecialchars($media['tahun_media'], ENT_QUOTES) ?>" placeholder="Masukkan Tahun Media" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiMedia" class="form-label">Deskripsi Media</label>
                        <textarea class="form-control" id="deskripsiMedia" name="deskripsi_media" rows="3" placeholder="Masukkan Deskripsi Media"><?= htmlspecialchars($media['deskripsi_media'], ENT_QUOTES) ?></textarea>
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
