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