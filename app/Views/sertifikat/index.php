<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sertifikat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF7E5;
            padding: 20px;
        }

        .table-container {
            margin: 0 auto;
            max-width: 900px;
        }

        .btn-add {
            background-color: #28a745;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
        }

        .btn-add:hover {
            background-color: #218838;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Button Tambah dan Edit -->
    <div class="text-center mb-4">
    <a href="<?= route_to('user/sertifikat/create') ?>" class="btn btn-add">Tambah Sertifikat</a>

    </div>

    <!-- Tabel Sertifikat -->
    <div class="table-container">
        <h3 class="text-center mb-4">Daftar Sertifikat Anda</h3>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Nomor</th>
                    <th>Status Verifikasi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sertifikat) && is_array($sertifikat)): ?>
                    <?php foreach ($sertifikat as $index => $item): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= esc($item['judul_sertifikat']); ?></td>
                            <td><?= esc($item['no_sertifikat']); ?></td>
                            <td>
                                <?php if ($item['status_verifikasi'] === 'waiting'): ?>
                                    <span class="badge bg-warning">Menunggu</span>
                                <?php elseif ($item['status_verifikasi'] === 'accepted'): ?>
                                    <span class="badge bg-success">Diterima</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Ditolak</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Belum ada sertifikat yang ditambahkan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
