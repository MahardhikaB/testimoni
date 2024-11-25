<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="/path/to/your/css/styles.css">
    <style>
        /* Tambahkan gaya sederhana untuk tata letak */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header, footer {
            text-align: center;
            margin-bottom: 20px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin: 0 0 20px 0;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: #007bff;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome, <?= isset($user['nama_user']) ? esc($user['nama_user']) : 'Guest' ?>!</h1>
            <p>Your role: <?= isset($user['role']) ? esc($user['role']) : 'Unknown' ?></p>
        </header>

        <nav>
            <ul>
                <li><a href="<?= base_url('/user/dashboard') ?>">Dashboard</a></li>
                <li><a href="<?= base_url('/logout') ?>">Logout</a></li>
            </ul>
        </nav>

        <main>
            <h2>Dashboard User</h2>
            <p>Ini adalah halaman dashboard untuk user dengan informasi login Anda.</p>
        </main>

        <footer>
            <p>&copy; <?= date('Y') ?>. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
