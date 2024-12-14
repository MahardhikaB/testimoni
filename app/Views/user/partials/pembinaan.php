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