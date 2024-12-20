<!-- Modal Tambah Media Promosi Before -->
<div id="myModalAdd" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2 id="titleModal">Tambah Media Promosi Before</h2>
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
            <form action="<?= base_url('user/media_promosi/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="media_promosi" class="form-label">Jenis Media Promosi</label>
                        <input type="text" class="form-control" id="media_promosi" name="media_promosi"
                            placeholder="Masukkan jenis media_promosi (BPOM, dll)">
                    </div>
                    <div class="mb-3 input-group">
                        <p for="fileMedia Promosi" class="form-label">File Media Promosi</p>
                        <input type="file" class="form-control" id="fileMedia Promosi" name="file_media_promosi"
                            accept=".pdf" placeholder="Upload file media_promosi">
                    </div>
                    <input id="tipe_input" type="hidden" name="tipe" value="0">
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>