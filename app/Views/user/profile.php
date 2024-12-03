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
            <p>J<?= $perusahaan['alamat'] ?></p>
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
                <a href="#" class="tab-button" data-tab="pengalaman-ekspor">Pengalaman Ekspor</a>
            </div>
            <div class="tabs-btn">
                <a href="#" class="tab-button" data-tab="media-promosi">Media Promosi</a>
            </div>
            <div class="tabs-btn">
                <a href="#" class="tab-button" data-tab="pembinaan">Pembinaan</a>
            </div>
        </div>

        <div class="content">
            <!-- Legalitas -->
            <div class="tab-content legalitas active">
                <div id="legalitas-before" class="content ">
                    <!-- Legalitas Awal -->
                    <h4>Legalitas Awal</h4>
                    <div class="legalitas-before-content">
                        <div class="legalitas-grid">
                            <div class="content-before-content-one">
                                <p><strong>Company Name:</strong> PT Maju Terus</p>
                                <p><strong>Legal Form:</strong> Perseroan Terbatas (PT)</p>
                                <p><strong>Establishment Date:</strong> 2015-07-20</p>
                                <p><strong>Notarial Deed Number:</strong> Deed No. 22/2015</p>
                                <p><strong>Notary Name:</strong> Ahmad Rifai, SH</p>
                                <p><strong>Company Address:</strong> Jl. Anggrek No. 25, Bandung</p>
                                <p><strong>Business Sector:</strong> Teknologi Informasi</p>
                            </div>
                            <div class="content-before-content-two">
                                <h5>Business Permit</h5>
                                <p><strong>Permit Number:</strong> SIUP No. 567/2021</p>
                                <p><strong>Issued By:</strong> Dinas Perdagangan Bandung</p>
                                <p><strong>Issue Date:</strong> 2021-05-15</p>
                                <p><strong>Valid Until:</strong> 2026-05-15</p>
                            </div>
                            <div class="content-before-content-three">
                                <h5>Company Registration Certificate</h5>
                                <p><strong>Registration Number:</strong> TDP No. 789/2016</p>
                                <p><strong>Issued By:</strong> Dinas Perindustrian dan Perdagangan</p>
                                <p><strong>Issue Date:</strong> 2016-03-18</p>
                                <p><strong>Valid Until:</strong> 2031-03-18</p>
                            </div>
                            <div class="content-before-content-four">
                                <h5>Legal Representative</h5>
                                <p><strong>Name:</strong> Andi Pratama</p>
                                <p><strong>Position:</strong> CEO</p>
                                <p><strong>Contact:</strong> +62 813 9876 5432</p>

                            </div>
                            <div class="content-before-content-five">

                                <h5>Amendments</h5>
                                <p><strong>Amendment Date:</strong> 2023-04-15 — Perubahan nama perusahaan dari PT Karya Digital menjadi PT Maju Terus </p>
                                <p><strong>Amendment Date:</strong> 2024-01-10 — Perubahan alamat kantor pusat dari Jl. Kemangi No. 18 ke Jl. Anggrek No. 25</p>

                            </div>
                        </div>
                    </div>
                    <!-- Legalitas Akhir -->
                    <h4>Legalitas Akhir</h4>
                    <div class="legalitas-before-content">
                        <div class="legalitas-grid">
                            <div class="content-before-content-one">
                                <p><strong>Company Name:</strong> PT Example Corp</p>
                                <p><strong>Legal Form:</strong> Perseroan Terbatas (PT)</p>
                                <p><strong>Establishment Date:</strong> 2010-05-10</p>
                                <p><strong>Notarial Deed Number:</strong> Deed No. 12/2010</p>
                                <p><strong>Notary Name:</strong> John Doe, SH</p>
                                <p><strong>Company Address:</strong> Jl. Dummy No. 123, Jakarta</p>
                                <p><strong>Business Sector:</strong> Software Development</p>
                            </div>
                            <div class="content-before-content-two">
                                <h5>Business Permit</h5>
                                <p><strong>Permit Number:</strong> SIUP No. 1234/2020</p>
                                <p><strong>Issued By:</strong> Dinas Perdagangan Jakarta</p>
                                <p><strong>Issue Date:</strong> 2020-04-25</p>
                                <p><strong>Valid Until:</strong> 2025-04-25</p>
                            </div>
                            <div class="content-before-content-three">
                                <h5>Company Registration Certificate</h5>
                                <p><strong>Registration Number:</strong> TDP No. 4321/2011</p>
                                <p><strong>Issued By:</strong> Dinas Perindustrian dan Perdagangan</p>
                                <p><strong>Issue Date:</strong> 2011-06-15</p>
                                <p><strong>Valid Until:</strong> 2031-06-15</p>
                            </div>
                            <div class="content-before-content-four">
                                <h5>Legal Representative</h5>
                                <p><strong>Name:</strong> Jane Smith</p>
                                <p><strong>Position:</strong> CEO</p>
                                <p><strong>Contact:</strong> +62 812 3456 7890</p>
                            </div>
                            <div class="content-before-content-five">
                                <h5>Amendments</h5>
                                <p><strong>Amendment Date:</strong> 2022-08-01 — Perubahan nama perusahaan dari PT Dummy Digital menjadi PT Example Corp</p>
                                <p><strong>Amendment Date:</strong> 2023-03-15 — Perubahan alamat kantor pusat dari Jl. Lama No. 100 ke Jl. Dummy No. 123</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produk -->
            <div class="tab-content produk">
                <!-- Produk Awal -->
                <h4>Produk Awal</h4>
                <div class="produk-before-content">
                    <div class="produk-grid">
                        <?php
                        $produkAwal = array_filter($produk, fn($p) => $p['tipe'] == 0);
                        ?>
                        <?php if (!empty($produkAwal)): ?>
                            <?php foreach ($produkAwal as $produkItem): ?>
                                <div class="produk-before-content-one">
                                    <h5>Product Name: <?= esc($produkItem['nama_produk']); ?></h5>
                                    <p><strong>Description:</strong> <?= esc($produkItem['deskripsi_produk']); ?></p>
                                    <p><strong>Price:</strong> Rp <?= number_format($produkItem['harga_produk'], 0, ',', '.'); ?></p>
                                    <p><strong>Availability:</strong> <?= esc($produkItem['ketersediaan_produk']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Tidak ada produk awal yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Produk Akhir -->
                <h4>Produk Akhir</h4>
                <div class="produk-before-content">
                    <div class="produk-grid">
                        <?php
                        $produkAkhir = array_filter($produk, fn($p) => $p['tipe'] == 1);
                        ?>
                        <?php if (!empty($produkAkhir)): ?>
                            <?php foreach ($produkAkhir as $produkItem): ?>
                                <div class="produk-before-content-one">
                                    <h5>Product Name: <?= esc($produkItem['nama_produk']); ?></h5>
                                    <p><strong>Description:</strong> <?= esc($produkItem['deskripsi_produk']); ?></p>
                                    <p><strong>Price:</strong> Rp <?= number_format($produkItem['harga_produk'], 0, ',', '.'); ?></p>
                                    <p><strong>Availability:</strong> <?= esc($produkItem['ketersediaan_produk']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Tidak ada produk akhir yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Sertifikasi -->
            <div class="tab-content sertifikasi">
                <!-- Sertifikasi Awal -->
                <h4>Sertifikasi Awal</h4>
                <div class="sertifikasi-before-content">
                    <div class="sertifikasi-grid">
                        <?php
                        $sertifikasiAwal = array_filter($sertifikat, fn($s) => $s['tipe'] == 0);
                        ?>
                        <?php if (!empty($sertifikasiAwal)): ?>
                            <?php foreach ($sertifikasiAwal as $sertifikatItem): ?>
                                <div class="sertifikasi-before-content-one">
                                    <h5>Certification Title: <?= esc($sertifikatItem['judul_sertifikat']); ?></h5>
                                    <p><strong>Certificate Number:</strong> <?= esc($sertifikatItem['no_sertifikat']); ?></p>
                                    <p><strong>Issue Date:</strong> <?= esc($sertifikatItem['tanggal_terbit_sertifikat']); ?></p>
                                    <p><strong>Issuer:</strong> <?= esc($sertifikatItem['penerbit_sertifikat']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Tidak ada sertifikasi awal yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sertifikasi Akhir -->
                <h4>Sertifikasi Akhir</h4>
                <div class="sertifikasi-before-content">
                    <div class="sertifikasi-grid">
                        <?php
                        $sertifikasiAkhir = array_filter($sertifikat, fn($s) => $s['tipe'] == 1);
                        ?>
                        <?php if (!empty($sertifikasiAkhir)): ?>
                            <?php foreach ($sertifikasiAkhir as $sertifikatItem): ?>
                                <div class="sertifikasi-before-content-one">
                                    <h5>Certification Title: <?= esc($sertifikatItem['judul_sertifikat']); ?></h5>
                                    <p><strong>Certificate Number:</strong> <?= esc($sertifikatItem['no_sertifikat']); ?></p>
                                    <p><strong>Issue Date:</strong> <?= esc($sertifikatItem['tanggal_terbit_sertifikat']); ?></p>
                                    <p><strong>Issuer:</strong> <?= esc($sertifikatItem['penerbit_sertifikat']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Tidak ada sertifikasi akhir yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Pameran -->
            <div class="tab-content pengalaman-pameran">
                <h4>Pengalaman Pameran</h4>
                <div class="pameran-content">
                    <div class="pameran-grid">
                        <?php if (!empty($pameran)): ?>
                            <?php foreach ($pameran as $pameranItem): ?>
                                <div class="pameran-content-one">
                                    <h5>Exhibition: <?= esc($pameranItem['nama_pameran']); ?></h5>
                                    <p><strong>Date:</strong> <?= esc($pameranItem['tanggal_pameran']); ?></p>
                                    <p><strong>Location:</strong> <?= esc($pameranItem['lokasi_pameran']); ?></p>
                                    <p><strong>Description:</strong> <?= esc($pameranItem['deskripsi_pameran']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Tidak ada pengalaman pameran yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Pengalaman Ekspor -->
            <div class="tab-content pengalaman-ekspor">
                <h4>Pengalaman Ekspor</h4>
                <div class="ekspor-content">
                    <div class="ekspor-grid">
                        <?php if (!empty($ekspor)): ?>
                            <?php foreach ($ekspor as $eksporItem): ?>
                                <div class="ekspor-content-one">
                                    <h5>Export Destination: <?= esc($eksporItem['destinasi_ekspor']); ?></h5>
                                    <p><strong>Year:</strong> <?= esc($eksporItem['tahun_ekspor']); ?></p>
                                    <p><strong>Product:</strong> <?= esc($eksporItem['produk_ekspor']); ?></p>
                                    <p><strong>Description:</strong> <?= esc($eksporItem['deskripsi_ekspor']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Tidak ada pengalaman ekspor yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Media Promosi -->
            <div class="tab-content media-promosi">
                <h4>Media Promosi</h4>
                <div class="promosi-content">
                    <div class="promosi-grid">
                        <?php if (!empty($mediaPromosi)): ?>
                            <?php foreach ($mediaPromosi as $media): ?>
                                <div class="promosi-content-one">
                                    <h5>Media: <?= esc($media['nama_media']); ?></h5>
                                    <p><strong>Year:</strong> <?= esc($media['tahun_media']); ?></p>
                                    <p><strong>Description:</strong> <?= esc($media['deskripsi_media']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Tidak ada data media promosi yang tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Pembinaan -->
            <div class="tab-content pembinaan">
                <h4>Program Pembinaan</h4>
                <div class="pembinaan-content">
                    <div class="pembinaan-grid">
                        <?php if (!empty($pembinaan)) : ?>
                            <?php foreach ($pembinaan as $pembinaanItem) : ?>
                                <div class="pembinaan-content-one">
                                    <h5>Program: <?= esc($pembinaanItem['nama_program']); ?></h5>
                                    <p><strong>Year:</strong> <?= esc($pembinaanItem['tahun_program']); ?></p>
                                    <p><strong>Organizer:</strong> <?= esc($pembinaanItem['penyelenggara_program']); ?></p>
                                    <p><strong>Description:</strong> <?= esc($pembinaanItem['deskripsi_program']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No programs found.</p>
                        <?php endif; ?>
                    </div>
                </div>
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
</script>

<?= $this->endSection() ?>