<h4>Pengalaman Ekspor</h4>
<div class="ekspor-content">
    <div class="ekspor-grid">
        <?php if (!empty($ekspor)): ?>
            <?php foreach ($ekspor as $eksporItem): ?>
                <div class="ekspor-content-one">
                    <h5>Destinasi Ekspor: <?= esc($eksporItem['negara_tujuan']); ?></h5>
                    <p><strong>Tanggal Ekspor:</strong> <?= esc($eksporItem['tanggal']); ?></p>
                    <p><strong>Produk:</strong> <?= esc($eksporItem['produk_ekspor']); ?></p>
                    <p><strong>Deskripsi:</strong> <?= esc($eksporItem['deskripsi_ekspor']); ?></p>
                    <div class="content-result-file">
                        <p>File Legalitas : </p>
                        <iframe width="100%" height="300"
                            src="<?= base_url('bukti_ekspor/' . esc($eksporItem['bukti_ekspor'])); ?>"
                            title="Bukti Ekspor">
                        </iframe>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada pengalaman ekspor yang tersedia.</p>
        <?php endif; ?>
    </div>
</div>