<h4>Pengalaman Ekspor</h4>
<div class="ekspor-content">
    <div class="ekspor-grid">
        <?php if (!empty($ekspor)): ?>
            <?php foreach ($ekspor as $eksporItem): ?>
                <div class="ekspor-content-one">
                    <h5>Export Destination: <?= esc($eksporItem['negara_tujuan']); ?></h5>
                    <p><strong>Year:</strong> <?= esc($eksporItem['tanggal']); ?></p>
                    <p><strong>Product:</strong> <?= esc($eksporItem['produk_ekspor']); ?></p>
                    <p><strong>Description:</strong> <?= esc($eksporItem['deskripsi_ekspor']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada pengalaman ekspor yang tersedia.</p>
        <?php endif; ?>
    </div>
</div>