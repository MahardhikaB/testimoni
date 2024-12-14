<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar legalitas</title>
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
        <a href="<?= route_to('user/legalitas/create') ?>" class="btn btn-add">Tambah legalitas</a>

    </div>

    <!-- Tabel legalitas -->
    <div class="table-container">
        <h3 class="text-center mb-4">Daftar Legalitas Anda</h3>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Legalitas</th>
                    <th>File Legalitas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($legalitas) && is_array($legalitas)): ?>
                <?php foreach ($legalitas as $index => $item): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= esc($item['legalitas']); ?></td>
                    <td><a href="/storage/<?= $item['file_legalitas'] ?>"><?= esc($item['file_legalitas']); ?></a>
                    </td>
                    <td>
                        <?php if ($item['status_verifikasi'] === 'pending'): ?>
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
                    <td colspan="4" class="text-center">Belum ada legalitas yang ditambahkan.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>