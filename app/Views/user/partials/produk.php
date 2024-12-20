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
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada produk akhir yang tersedia.</p>
        <?php endif; ?>
    </div>
</div>