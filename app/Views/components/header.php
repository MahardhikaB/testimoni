<link rel="stylesheet" href="/css/header.css">

<nav>
    <!-- Logo -->
    <div class="column-1">
        <img src="/images/logo.png" alt="Logo">
    </div>

    <!-- Navigation Links -->
    <div class="column-2">
        <a href="/user/dashboard">Beranda</a>
        <a href="/user/profile">Profile Perusahaan</a>
        <a href="/user/progress">Progress Perusahaan</a>
    </div>

    <!-- Sign In Button -->
    <div class="column-3 ">
        <p>
            <?= session()->get('nama_user') ?: 'User' ?>
        </p>

        <a href="<?= base_url('/logout') ?>" class="btn btn-default btn-flat float-end">Keluar</a> 
    </div>

    <!-- Menu Toggle for Mobile -->
    <div class="menu-toggle" onclick="toggleMenu()">☰</div>

    <!-- Dropdown Menu for Mobile -->
    <div class="menu-dropdown">
        <a href="/user/dashboard">Beranda</a>
        <a href="/user/profile">Profile Perusahaan</a>
        <a href="/user/progress">Progress Perusahaan</a>
        <a href="/logout">Log Out</a>
    </div>

    <script>
    function toggleMenu() {
        const toggle = document.querySelector('.menu-toggle');
        const dropdown = document.querySelector('.menu-dropdown');
        toggle.classList.toggle('active');
        dropdown.classList.toggle('active');
    }

    // document.querySelector('.user-image').addEventListener('click', function() {
    // const dropdownMenu = document.querySelector('.user-menu .dropdown-menu');
    // dropdownMenu.classList.toggle('show');
    // });
</script>
</nav>


