<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/registrasi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registrasi</title>
    <style>
        /* Warning Alert Styles */
        .alert {
            background: #ffdb9b;
            padding: 20px 40px;
            min-width: 320px;
            position: fixed;
            right: 10px;
            top: 10px;
            border-radius: 4px;
            border-left: 8px solid #ffa502;
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, transform 0.3s, visibility 0.3s;
            transform: translateX(100%);
        }

        .alert.show {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
        }

        .alert .fa-exclamation-circle {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #ce8500;
            font-size: 30px;
        }

        .alert .msg {
            margin-left: 50px;
            font-size: 16px;
            color: #ce8500;
        }

        .alert .close-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: #ce8500;
        }

        .alert .close-btn:hover {
            color: #b37400;
        }

        button {
            padding: 10px 20px;
            background: #743ae1;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #5d2bc0;
        }

        .success {
            background: #d4edda;
            padding: 20px 40px;
            min-width: 320px;
            position: fixed;
            right: 10px;
            top: 10px;
            border-radius: 4px;
            border-left: 8px solid #28a745;
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, transform 0.3s, visibility 0.3s;
            transform: translateX(100%);
        }

        .success.show {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
        }

        .success .fa-check-circle {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #218838;
            font-size: 30px;
        }

        .success .msg {
            margin-left: 50px;
            font-size: 16px;
            color: #218838;
        }

        .success .close-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: #218838;
        }

        .success .close-btn:hover {
            color: #196f3d;
        }
    </style>
</head>
<body>
        <!-- Warning Alert -->
        <div class="alert hide">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Pesan error akan muncul di sini</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>
    <!-- Success Alert -->
    <div class="success hide">
        <span class="fas fa-check-circle"></span>
        <span class="msg">Pesan sukses akan muncul di sini</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>

    <div class="wrapper">
        
        <div class="container main">
            <!-- Tampilkan pesan flash error -->
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <!-- Bagian Kiri -->
                <div class="col-md-6 right">
                <form action="<?= base_url('signUp') ?>" method="post">
    <?= csrf_field() ?>

    <div class="input-box">
        <header class="h2">Registrasi</header>

        <div class="input-field">
            <input type="text" class="input" name="nama_user" id="nama_user" value="<?= old('nama_user') ?>" required autocomplete="off">
            <label for="nama_user">Nama Lengkap</label>
        </div>

        <div class="input-field">
            <input type="text" class="input" name="nama_perusahaan" id="nama_perusahaan" value="<?= old('nama_perusahaan') ?>" required autocomplete="off">
            <label for="nama_perusahaan">Nama Perusahaan</label>
        </div>

        <div class="input-field">
            <input type="text" class="input" name="nomor_telepon" id="nomor_telepon" value="<?= old('nomor_telepon') ?>" required autocomplete="off">
            <label for="nomor_telepon">Nomor Telepon</label>
        </div>

        <div class="input-field">
            <input type="text" class="input" name="alamat" id="alamat" value="<?= old('alamat') ?>" required autocomplete="off">
            <label for="alamat">Alamat Perusahaan</label>
        </div>

        <label class="pb-1 px-3" for="jenis_perusahaan">Jenis Perusahaan</label>
        <div class="input-field pb-4">
            <select class="form-select" name="jenis_perusahaan" id="jenis_perusahaan" required>
                <option value="" disabled <?= old('jenis_perusahaan') ? '' : 'selected' ?>>Pilih Jenis Perusahaan</option>
                <option value="Ekspor" <?= old('jenis_perusahaan') == 'Ekspor' ? 'selected' : '' ?>>Ekspor</option>
                <option value="Importir" <?= old('jenis_perusahaan') == 'Importir' ? 'selected' : '' ?>>Importir</option>
            </select>
        </div>

        <div class="input-field">
            <input type="email" class="input" name="email" id="email" value="<?= old('email') ?>" required autocomplete="off">
            <label for="email">Email</label>
        </div>

        <div class="input-field">
            <input type="password" class="input" name="password" id="password" required>
            <label for="password">Password</label>
            <small class="pb-4 text-muted">*Password minimal 8 karakter</small>
        </div>

        <div class="input-field">
            <input type="submit" class="submit" value="Registrasi">
        </div>
    </div>
</form>

                </div>
                
                <!-- Bagian Kanan -->
                <div class="col-md-6 side-image">
                    <img src="/images/logo.png" alt="Register Image">
                </div>

            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const flashError = <?= json_encode(session()->getFlashdata('error')) ?>;
        const flashValidationErrors = <?= json_encode(session()->getFlashdata('errors')) ?>;
        const flashSuccess = <?= json_encode(session()->getFlashdata('success')) ?>;

        if (flashError) {
            const alert = document.querySelector('.alert');
            alert.querySelector('.msg').textContent = flashError;
            alert.classList.add('show');
            alert.classList.remove('hide');
            setTimeout(function() {
                alert.classList.remove('show');
                alert.classList.add('hide');
            }, 5000);
        }

        if (flashValidationErrors) {
            const alert = document.querySelector('.alert');
            alert.querySelector('.msg').textContent = Object.values(flashValidationErrors).join(' ');
            alert.classList.add('show');
            alert.classList.remove('hide');
            setTimeout(function() {
                alert.classList.remove('show');
                alert.classList.add('hide');
            }, 5000);
        }

        if (flashSuccess) {
            const success = document.querySelector('.success');
            success.querySelector('.msg').textContent = flashSuccess;
            success.classList.add('show');
            success.classList.remove('hide');
            setTimeout(function() {
                success.classList.remove('show');
                success.classList.add('hide');
            }, 5000);
        }
    });
</script>
</body>
</html>
