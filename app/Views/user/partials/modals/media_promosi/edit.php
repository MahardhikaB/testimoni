<!-- Modal Edit Media Promosi -->
<div id="modalMediaEdit" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="mediaClose">&times;</span>
        </div>
        <h2>Edit Media Promosi</h2>
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
            <form id="formEditMedia" action="" method="post">
                <?= csrf_field() ?>
                <!-- Kolom kiri -->
                <div class="input-container">
                    <div class="input-group">
                        <label for="edit_media_promosi" class="form-label">Media Promosi</label>
                        <input type="text" class="form-control" id="edit_media_promosi" name="nama_media" value=""
                            placeholder="Masukkan media promosi (Instagram, Tiktok, dll)">
                    </div>
                    <div class="input-group">
                        <label for="edit_tahun_media" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="edit_tahun_media" name="tahun_media"
                            placeholder="Masukkan tahun dibuat media promosi">
                    </div>
                    <div class="input-group">
                        <label for="edit_deskripsi_media" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi_media" name="deskripsi_media"
                            placeholder="Masukkan deskripsi media promosi"></textarea>
                    </div>
                    <input id="tipeInputMedia" type="hidden" name="tipe" value="0">
                </div>
                <!-- Tombol Kembali dan Submit -->
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>