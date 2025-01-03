<?php if (session()->get('success_lainnya')): ?>
    <script>
        document.querySelector('.legalitas').classList.remove('active');
        document.querySelector('.progress-lainnya').classList.add('active');
    </script>
    <div id="myAlert" class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?= session()->get('success_lainnya') ?>
    </div>
<?php endif; ?>

<?php if (session()->get('errors')): ?>
    <script>
        window.onload = function() {
            document.getElementById("myModal").style.display = "block";
        };
    </script>
<?php endif; ?>

<div class="content-container">
    <!-- lainnya Promosi -->
    <div class="before-content content-result-container">
        <div class="add-data">
            <h4>Progress Lainnya</h4>
            <button id="btnTambahLainnyaBefore">
                Tambah Progress Lainnya
            </button>
        </div>

        <?php if (!empty($pencapaianEkspor) && is_array($pencapaianEkspor)): ?>
            <?php foreach ($pencapaianEkspor as $item): ?>
                <div class="content-result-card">
                    <b style="color: #ffc107; margin-bottom: 0.4rem; display: block;">
                        <?= $item['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
                    </b>
                    <div class="content-result-info">
                        <div class="content-text-container">
                            <h5>Tanggal Progress</h5>
                            <p><?= $item['tanggal_ekspor'] ?></p>
                        </div>
                        <div>
                            <button class="btnEdit"
                                onclick="editDatalainnya('<?= base_url('/user/progress-lainnya/update/') . $item['id'] ?>', '<?= $item['deskripsi'] ?>', '<?= $item['tanggal_ekspor'] ?>', '<?= $item['bukti_gambar'] ?>')"
                                title="Edit lainnya Promosi">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button class="btnHapus"
                                onclick="hapusDatalainnya('<?= base_url('/user/progress-lainnya/delete/') . $item['id'] ?>')"
                                title="Hapus lainnya Promosi">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="content-result-text">
                        <div class="content-text-container">
                            <h5>Deskripsi</h5>
                            <p><?= $item['deskripsi'] ?></p>
                        </div>
                        <div class="content-text-container">
                            <h5>Foto Bukti Progress</h5>
                            <?php if (!empty($item['bukti_gambar'])): ?>
                                <img src="<?= base_url('storage/' . $item['bukti_gambar']) ?>" alt="Gambar Bukti" style="max-width: 400px; height: auto;">
                            <?php else: ?>
                                <p>Tidak ada gambar</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="margin-top: 1rem;">Belum ada data progress lainnya yang ditambahkan.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Tambahkan Modal untuk Tambah/Edit/Hapus Data -->
<?= $this->include('user/partials/modals/progress_lainnya/add') ?>
<?= $this->include('user/partials/modals/progress_lainnya/edit') ?>
<?= $this->include('user/partials/modals/progress_lainnya/delete') ?>

<!-- Tambahkan Skrip Pendukung -->
<script src="../../../../js/lainnyaModal.js"></script>
<script src="../../../../js/modal.js"></script>