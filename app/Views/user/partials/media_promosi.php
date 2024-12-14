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