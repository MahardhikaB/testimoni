<div class="content-container">
    <div class="ekspor-content ">       
        <h4>Pengalaman Ekspor</h4>
        <div class="add-data">
            <button id="btnTambahMediaPromosiBefore">
                Tambah Pengalaman Ekspor
            </button>
        </div>
        <div class="ekspor-grid">
            <?php if (!empty($ekspor)): ?>
                <?php foreach ($ekspor as $eksporItem): ?>
                    <div class="ekspor-content-one content-result-card">
                        <h5>Destinasi Ekspor: <?= esc($eksporItem['negara_tujuan']); ?></h5>
                        <div>
                            <button class="btnEdit"
                                onclick="editSertifikasi('<?= base_url('/user/sertifikasi/update/') . $eksporItem['id_ekspor'] ?>', '<?= $eksporItem['negara_tujuan'] ?>')"
                                title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button class="btnHapus"
                                onclick="hapusSertifikasi('<?= base_url('/user/sertifikasi/delete/') . $eksporItem['id_ekspor'] ?>')"
                                title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                        <p><strong>Tanggal Ekspor:</strong> <?= esc($eksporItem['tanggal']); ?></p>
                        <p><strong>Produk:</strong> <?= esc($eksporItem['produk_ekspor']); ?></p>
                        <p><strong>Deskripsi:</strong> <?= esc($eksporItem['deskripsi_ekspor']); ?></p>

                        <div class="content-result-file">
                            <p>File Bukti Ekspor : </p>
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
</div>