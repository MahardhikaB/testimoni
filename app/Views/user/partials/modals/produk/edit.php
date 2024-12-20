<!-- Modal Edit Media Promosi -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
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
            <form id="formEdit" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <!-- Kolom kiri -->
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="media_promosi" class="form-label">Jenis Media Promosi</label>
                        <input type="text" class="form-control" id="media_promosiEditInput" name="media_promosi"
                            value="" placeholder="Masukkan jenis media_promosi (BPOM, dll)">
                    </div>
                    <div class="mb-3 input-group">
                        <p for="fileMedia Promosi" class="form-label">File Media Promosi</p>
                        <a id="hyperlinkToFile" href="<?= base_url('/storage/' ) ?>" target="_blank"
                            class="btn btn-primary">Lihat File </a>
                        <input type="file" class="form-control" id="fileMedia Promosi" name="file_media_promosi"
                            accept=".pdf" placeholder="Upload file media_promosi">
                        <input id="inputMedia PromosiLama" type="hidden" name="file_media_promosi_lama" value="">
                    </div>
                </div>
                <!-- Tombol Kembali dan Submit -->
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>