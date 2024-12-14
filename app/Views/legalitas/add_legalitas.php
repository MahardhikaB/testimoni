<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Legalitas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #FFF7E5;
        /* Warna background lembut */
    }

    .form-container {
        max-width: 640px;
        margin: 40px auto;
        padding: 20px;
        background-color: #FFFBEA;
        /* Warna background form */
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
        background-color: #4E342E;
        /* Warna tombol */
        color: #fff;
        font-weight: bold;
    }

    .btn-submit {
        background-color: #28a745;
        /* Warna tombol submit */
        color: #fff;
    }
    </style>
</head>

<body>
    <div class="form-container">
        <?php if (session()->get('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->get('errors') as $error): ?>
                <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        <h2 class="form-title">Tambah Legalitas</h2>
        <form action="<?= base_url('user/legalitas/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row g-3">
                <!-- Kolom kiri -->
                <div class="col-md-6 mx-auto">
                    <div class="mb-3">
                        <label for="legalitas" class="form-label">Jenis Legalitas</label>
                        <input type="text" class="form-control" id="legalitas" name="legalitas"
                            placeholder="Masukkan jenis legalitas (BPOM, dll)">
                    </div>
                    <div class="mb-3">
                        <label for="fileLegalitas" class="form-label">File Legalitas</label>
                        <input type="file" class="form-control" id="fileLegalitas" name="file_legalitas" accept=".pdf"
                            placeholder="Upload file legalitas">
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