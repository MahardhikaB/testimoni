<div class="ekspor-content">
    <div class="add-data">
        <h4>Progress</h4>
        <button id="btnTambahMediaPromosiBefore">
            Tambah Progress
        </button>
    </div>
    <div class="ekspor-grid">
        <?php if (!empty($pencapaianEkspor)): ?>
            <?php foreach ($pencapaianEkspor as $item): ?>
                <?php if ($item['status_verifikasi'] !== 'rejected'): ?>  <!-- Tambahkan kondisi untuk mengecek status -->
                    <div class="ekspor-content-one">
                        <b style="color: #ffc107; display:block; margin-bottom: 1rem;">
                            <?= $item['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
                        </b>
                        <p><strong>Tanggal:</strong> <?= esc($item['tanggal_ekspor']); ?></p>
                        <p><strong>Deskripsi:</strong> <?= esc($item['deskripsi']); ?></p>
                        <div class="content-result-file">
                            <p>File Bukti Progress : </p>
                            <img src="<?= base_url('bukti_ekspor/' . esc($item['bukti_gambar'])); ?>" alt="Bukti Ekspor" width="100%" style="max-width: 600px;"/>
                        </div>
                    </div>
                <?php endif; ?> <!-- Akhir dari kondisi pengecekan status_verifikasi -->
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada pengalaman ekspor yang tersedia.</p>
        <?php endif; ?>
    </div>
</div>
