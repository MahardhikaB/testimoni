<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
    <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
        <div class="container main">
            
            <div class="row">
                <!-- Bagian Kiri -->
                <div class="col-md-6 side-image">
                    <img src="images/logo.png" alt="">
                </div>

                <!-- Bagian Kanan -->
                <div class="col-md-6 right">
                    <form action="<?= base_url('login') ?>" method="post">
                        <?= csrf_field() ?> <!-- Menambahkan token CSRF -->

                        <div class="input-box">
                            <header>Login</header>

                            <!-- Input Email -->
                            <div class="input-field">
                                <input type="email" class="input" name="email" id="email" required autocomplete="off">
                                <label for="email">Email</label>
                            </div>

                            <!-- Input Password -->
                            <div class="input-field">
                                <input type="password" class="input" name="password" id="password" required>
                                <label for="password">Password</label>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="input-field">
                                <input type="submit" class="submit" value="Login">
                            </div>

                            <div class="signin">
                                <span>Belum punya akun? <a href="<?= base_url('registrasi') ?>">Daftar di sini</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
