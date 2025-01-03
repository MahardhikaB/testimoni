<!-- Modal Tambah Pencapaian Ekspor -->
<div id="modalLainnyaAdd" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="lainnyaClose">&times;</span>
        </div>
        <h2 id="titleModalLainnya">Tambah Progress Lainnya</h2>
        <div class="form-container">
            <?php if (session()->get('errors')): ?>
            <div class="alert-error">
                <ul>
                    <?php foreach (session()->get('errors') as $error): ?>
                    <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            <form action="<?= base_url('user/progress-lainnya/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="input-container">
                    <div class="input-group">
                        <label for="tanggal_ekspor" class="form-label">Tanggal Progress</label>
                        <input type="date" class="form-control" id="tanggal_ekspor" name="tanggal_ekspor">
                    </div>
                    <div class="input-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="input-group">
                        <p for="bukti_gambar" class="form-label">Foto Bukti Progress</p>
                        <input type="file" class="form-control" id="bukti_gambar" name="bukti_gambar" accept=".jpg,.jpeg,.png">
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>