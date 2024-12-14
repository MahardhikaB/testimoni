<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Login</title>
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
                            <header class="h2">Login</header>

                            <!-- Input Email -->
                            <!-- Input Email -->
                            <div class="input-field">
                                <input type="email" class="input" name="email" id="email" required autocomplete="off" value="<?= old('email') ?>">
                                <label for="email">Email</label>
                            </div>

                            <!-- Input Password -->
                            <div class="input-field">
                                <input type="password" class="input" name="password" id="password" required value="<?= old('password') ?>">
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