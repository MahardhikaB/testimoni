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