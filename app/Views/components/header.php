<link rel="stylesheet" href="/css/header.css">

<nav>
    <!-- Logo -->
    <div class="column-1">
        <img src="/images/logo.png" alt="Logo">
    </div>

    <!-- Navigation Links -->
    <div class="column-2">
        <a href="/dashboard">Beranda</a>
        <a href="/profile">Profile Perusahaan</a>
        <a href="/progress">Progress Perusahaan</a>
    </div>

    <!-- Sign In Button -->
    <div class="column-3">
        <a href="/registrasi">Sign In</a>
    </div>

    <!-- Menu Toggle for Mobile -->
    <div class="menu-toggle" onclick="toggleMenu()">☰</div>

    <!-- Dropdown Menu for Mobile -->
    <div class="menu-dropdown">
        <a href="/dashboard">Beranda</a>
        <a href="/profile">Profile Perusahaan</a>
        <a href="/progress">Progress Perusahaan</a>
        <a href="/registrasi">Sign In</a>
    </div>
</nav>

<script>
    function toggleMenu() {
        const toggle = document.querySelector('.menu-toggle');
        const dropdown = document.querySelector('.menu-dropdown');
        toggle.classList.toggle('active');
        dropdown.classList.toggle('active');
    }
</script>
