<!-- Modal Tambah Media Promosi Before -->
<div id="modalMediaAdd" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="mediaClose">&times;</span>
        </div>
        <h2 id="titleModalMedia">Tambah Media Promosi Before</h2>
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
            <form action="<?= base_url('user/media/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="input-container">
                    <div class="input-group">
                        <label for="media_promosi" class="form-label">Media Promosi</label>
                        <input type="text" class="form-control" id="media_promosi" name="nama_media"
                            placeholder="Masukkan media promosi (Instagram, Tiktok, dll)">
                    </div>
                    <div class="input-group">
                        <label for="tahun_media" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="tahun_media" name="tahun_media"
                            placeholder="Masukkan tahun dibuat media promosi">
                    </div>
                    <div class="input-group">
                        <label for="deskripsi_media" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi_media" name="deskripsi_media"
                            placeholder="Masukkan deskripsi media promosi"></textarea>
                    </div>
                    <input id="tipeInputMedia" type="hidden" name="tipe" value="0">
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>