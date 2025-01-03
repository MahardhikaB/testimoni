<!-- Modal Edit Pencapaian Ekspor -->
<div id="modalLainnyaEdit" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="lainnyaClose">&times;</span>
        </div>
        <h2>Edit Pencapaian Ekspor</h2>
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
            <form id="formEditLainnya" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="input-container">
                    <div class="input-group">
                        <label for="tanggal_ekspor" class="form-label">Tanggal Ekspor</label>
                        <input type="date" class="form-control" id="edit_tanggal_ekspor" name="tanggal_ekspor" value="">
                    </div>
                    <div class="input-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="input-group">
                        <label for="bukti_gambar" class="form-label">File Bukti Ekspor</label>
                        <input type="file" class="form-control" id="edit_bukti_gambar" name="bukti_gambar" accept=".jpg,.jpeg,.png">
                        <input type="hidden" id="bukti_gambar_lama" name="bukti_gambar_lama" value="">
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>