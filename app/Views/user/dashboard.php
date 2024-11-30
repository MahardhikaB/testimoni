<?= $this->extend('Layout/user_layout') ?>

<?= $this->section('title') ?>
Dashboard Perusahaan
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="/css/dashboard_user.css">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="hero-section">
    <div class="hero-text">
        <h1>Dashboard Perusahaan</h1>
        <p>Selamat Datang, <b>Alifia Putri Budiyanti.</b> 
            <br>Lihat perkembangan terbaru perusahaan anda di sini.</br></p>
        <a href="<?= base_url('/profile') ?>" class="btn">My Profile</a>
    </div>
</div>

<div class="company-information">
    <div class="user-details">
        <h4>PT JAYA SUKSES</h4>
        <p>Nama Peserta : Alifia Putri Budiyanti</p>
        <p>Alamat Perusahaan : Jalan Mawar Merah Nomor 13</p>
    </div>
    <div class="bootcamp-details">
        <h4>MASA PELATIHAN</h4>
        <p>Tanggal Mulai  : 01 - 07 - 2023</p>
        <p>Tanggal Selesai : 09 - 10 - 2023</p>
    </div>
</div>

<div class="content-profile">
<div class="search-bar-container">
    <h2 class="overview-title">OVERVIEW</h2>
    <div class="search-input-container">
        <input type="text" class="search-input" placeholder="Cari Data">
        <i class="fas fa-search search-icon"></i>
    </div>
</div>


    <!-- Table Section -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Sebelum</th>
                    <th>Sesudah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Legalitas</td>
                    <td>
                        <a href="<?= base_url('documents/document.txt') ?>" target="_blank">
                            <i class="<?= getFileIcon('documents/document.txt') ?>"></i> <?= basename('documents/document.txt') ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('documents/Shame.pdf') ?>" target="_blank">
                            <i class="<?= getFileIcon('documents/Shame.pdf') ?>"></i> <?= basename('documents/Shame.pdf') ?>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ekspor</td>
                    <td>
                        <a href="<?= base_url('documents/ekspor-before.docx') ?>" target="_blank">
                            <i class="<?= getFileIcon('documents/ekspor-before.docx') ?>"></i> <?= basename('documents/ekspor-before.docx') ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('documents/ekspor-after.xlsx') ?>" target="_blank">
                            <i class="<?= getFileIcon('documents/ekspor-after.xlsx') ?>"></i> <?= basename('documents/ekspor-after.xlsx') ?>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Sertifikasi</td>
                    <td>
                        <a href="<?= base_url('documents/company-logo.png') ?>" target="_blank">
                            <i class="<?= getFileIcon('documents/company-logo.png') ?>"></i> <?= basename('documents/company-logo.png') ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('documents/company-update.jpg') ?>" target="_blank">
                            <i class="<?= getFileIcon('documents/company-update.jpg') ?>"></i> <?= basename('documents/company-update.jpg') ?>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



</div>

<?= $this->endSection() ?>

<?php
function getFileIcon($file) {
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION)); // Get the file extension

    // Return the appropriate Font Awesome icon class based on the file extension
    switch ($extension) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
            return 'fas fa-file-image';  // Image file icon
        case 'pdf':
            return 'fas fa-file-pdf';    // PDF file icon
        case 'doc':
        case 'docx':
        case 'txt':
            return 'fas fa-file-alt';    // Document file icon (Word, text)
        case 'xls':
        case 'xlsx':
            return 'fas fa-file-excel';  // Excel file icon
        default:
            return 'fas fa-file';        // Generic file icon for unknown types
    }
}
?>