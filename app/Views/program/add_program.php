<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program</title>
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
        <h2 class="form-title">Tambah Program</h2>
        <form action="<?= base_url('program/store') ?>" method="post">
            <div class="row g-3">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="namaProgram" class="form-label">Nama Program</label>
                        <input type="text" class="form-control" id="namaProgram" name="nama_program" placeholder="Masukkan Nama Program" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahunProgram" class="form-label">Tahun Program</label>
                        <input type="number" class="form-control" id="tahunProgram" name="tahun_program" placeholder="Masukkan Tahun Program" required>
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="penyelenggaraProgram" class="form-label">Penyelenggara Program</label>
                        <input type="text" class="form-control" id="penyelenggaraProgram" name="penyelenggara_program" placeholder="Masukkan Penyelenggara Program" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiProgram" class="form-label">Deskripsi Program</label>
                        <textarea class="form-control" id="deskripsiProgram" name="deskripsi_program" rows="3" placeholder="Masukkan Deskripsi Program"></textarea>
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
