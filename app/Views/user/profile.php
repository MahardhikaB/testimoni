<?= $this->extend('Layout/user_layout') ?>

<?= $this->section('title') ?>
Dashboard Perusahaan
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="/css/profile.css">

<div class="hero-section">
    <div class="hero-text"></div>
    <img src="<?= base_url('images/Profile_user.png') ?>" alt="Naila Putri" class="profile-image">
</div>

<div class="profile-section">
    <div class="profile-card">
        <h3><?= $user['nama_user'] ?></h3>
        <h5><?= $perusahaan['jenis_perusahaan'] ?></h5>
        <div class="location-company">
            <i class="fa-solid fa-location-dot"></i>
            <p><?= $perusahaan['nama_perusahaan'] ?></p>
        </div>

        <div class="social-icons">
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-tiktok"></i>
        </div>
    </div>
    <div class="company-information">
        <div class="contact-details">
            <h4>Contact Perusahaan</h4>
            <p><?= $user['email'] ?></p>
            <p><?= $perusahaan['telepon'] ?></p>
        </div>
        <div class="address-details">
            <h4>Alamat Perusahaan</h4>
            <p><?= $perusahaan['alamat'] ?></p>
        </div>
    </div>
    <div class="edit-profile-btn">
        <button href="<?= base_url('profile/edit') ?>">Edit Profile</button>
    </div>
</div>

<div class="content-profile">
    <div class="tab-container">
        <!-- Tabs Section -->
        <div class="tabs">
            <div class="tabs-btn">
                <a href="#" class="tab-button" data-tab="legalitas">Legalitas</a>
            </div>
            <div class="tabs-btn">
                <a href="#" class="tab-button" data-tab="produk">Produk</a>
            </div>
            <div class="tabs-btn">
                <a href="#" class="tab-button" data-tab="sertifikasi">Sertifikasi</a>
            </div>
            <div class="tabs-btn">
                <a href="#" class="tab-button" data-tab="pengalaman-pameran">Pengalaman Pameran</a>
            </div>
            <div class="tabs-btn">
                <a href="#" class="tab-button" data-tab="pengalaman-ekspor">Pencapaian Ekspor</a>
            </div>
            <div class="tabs-btn">
                <a href="#" class="tab-button" data-tab="media-promosi">Media Promosi</a>
            </div>
            <div class="tabs-btn">
                <a href="#" class="tab-button" data-tab="pembinaan">Pembinaan</a>
            </div>
            <div class="tabs-btn">
                <a href="#" class="tab-button" data-tab="progress-lainnya">Progress Lainnya</a>
            </div>
        </div>

        <div class="content">
            <!-- Legalitas -->
            <div class="tab-content legalitas active">
                <div class="dropdown-container">
                    <select id="legalitasDropdown" class="content-dropdown">
                        <option value="before">Legalitas Before</option>
                        <option value="after">Legalitas After</option>
                        <option value="all">Tampilkan Semua</option>
                    </select>
                </div>
                <?= $this->include('user/partials/legalitas') ?>
            </div>

            <!-- Produk -->
            <div class="tab-content produk">
                <div class="dropdown-container">
                    <select id="produkDropdown" class="content-dropdown">
                        <option value="before">Produk Before</option>
                        <option value="after">Produk After</option>
                        <option value="all">Tampilkan Semua</option>
                    </select>
                </div>
                <?= $this->include('user/partials/produk') ?>
            </div>

            <!-- Sertifikasi -->
            <div class="tab-content sertifikasi">
                <div class="dropdown-container">
                    <select id="sertifikasiDropdown" class="content-dropdown">
                        <option value="before">Sertifikasi Awal</option>
                        <option value="after">Sertifikasi Akhir</option>
                        <option value="all">Tampilkan Semua</option>
                    </select>
                </div>
                <?= $this->include('user/partials/sertifikasi') ?>
            </div>

            <!-- Pameran -->
            <div class="tab-content pengalaman-pameran">
                <?= $this->include('user/partials/pameran') ?>
            </div>

            <!-- Pengalaman Ekspor -->
            <div class="tab-content pengalaman-ekspor">
                <?= $this->include('user/partials/pengalaman_ekspor') ?>
            </div>

            <!-- Media Promosi -->
            <div class="tab-content media-promosi">
                <div class="dropdown-container">
                    <select id="mediaPromosiDropdown" class="content-dropdown">
                        <option value="before">Media Promosi Before</option>
                        <option value="after">Media Promosi After</option>
                        <option value="all">Tampilkan Semua</option>
                    </select>
                </div>
                <?= $this->include('user/partials/media_promosi') ?>
            </div>

            <!-- Pembinaan -->
            <div class="tab-content pembinaan">
                <?= $this->include('user/partials/pembinaan') ?>
            </div>
            <!-- Pembinaan -->
            <div class="tab-content progress-lainnya">
                <?= $this->include('user/partials/progress_lainnya') ?>
            </div>
        </div>
    </div>
</div>

<script>
    // Select all tab buttons and content
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    // Add event listeners to all tab buttons
    tabButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            // Get the data-tab value from the clicked button
            const targetTab = this.getAttribute('data-tab');

            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            // Show the selected tab content by adding 'active' class
            document.querySelector('.' + targetTab).classList.add('active');
        });
    });

    // Add event listeners to dropdowns
    const dropdowns = document.querySelectorAll('.content-dropdown');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('change', function() {
            const targetContent = this.value;
            const parentTab = this.closest('.tab-content');
            parentTab.querySelectorAll('.content-result-container').forEach(container => {
                container.style.display = 'none';
            });
            if (targetContent === 'all') {
                parentTab.querySelectorAll('.content-result-container').forEach(container => {
                    container.style.display = 'block';
                });
            } else {
                parentTab.querySelector(`.${targetContent}-content`).style.display = 'block';
            }
        });
    });
</script>

<?= $this->endSection() ?>