<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/registrasi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registrasi</title>
</head>
<body>
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

                            <!-- Nama Lengkap -->
                            <div class="input-field">
                                <input type="text" class="input" name="nama_user" id="nama_user" required autocomplete="off">
                                <label for="nama_user">Nama Lengkap</label>
                            </div>

                            <!-- Nama Perusahaan -->
                            <div class="input-field">
                                <input type="text" class="input" name="nama_perusahaan" id="nama_perusahaan" required autocomplete="off">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="input-field">
                                <input type="text" class="input" name="nomor_telepon" id="nomor_telepon" required autocomplete="off">
                                <label for="nomor_telepon">Nomor Telepon</label>
                            </div>

                            <!-- Alamat Perusahaan -->
                            <div class="input-field">
                                <input type="text" class="input" name="alamat" id="alamat" required autocomplete="off">
                                <label for="alamat">Alamat Perusahaan</label>
                            </div>

                            <!-- Jenis Perusahaan -->
                            <div class="input-field">
                                <input type="text" class="input" name="jenis_perusahaan" id="jenis_perusahaan" required autocomplete="off">
                                <label for="jenis_perusahaan">Jenis Perusahaan</label>
                            </div>

                            <!-- Email -->
                            <div class="input-field">
                                <input type="email" class="input" name="email" id="email" required autocomplete="off">
                                <label for="email">Email</label>
                            </div>

                            <!-- Password -->
                            <div class="input-field">
                                <input type="password" class="input" name="password" id="password" required>
                                <label for="password">Password</label>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="input-field">
                                <input type="submit" class="submit" value="Registrasi">
                            </div>

                            <!-- Link ke Login -->
                            <div class="signin">
                                <span>Sudah punya akun? <a href="<?= base_url('login') ?>">Login di sini</a></span>
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
</body>
</html>
