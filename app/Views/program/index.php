<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Awal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #FFF7E5;
        }

        .button-container {
            text-align: center;
        }

        .btn-edit {
            background-color: #28a745;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .btn-edit:hover {
            background-color: #218838;
            color: white;
        }
    </style>
</head>

<body>
    <!-- butoon tambah data -->
    <div class="button-container">
        <a href="<?= base_url('program/create') ?>" class="btn btn-edit">Add Produk</a>
    </div>
    <div class="button-container">
        <a href="<?= base_url('program/edit/1') ?>" class="btn btn-edit">Edit Produk</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
