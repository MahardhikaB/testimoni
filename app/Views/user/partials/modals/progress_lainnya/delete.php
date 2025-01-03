<!-- Modal Hapus Progress Lainyya -->
<div class="modal" id="modalLainnyaDelete">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2>Hapus Progress Lainnya</h2>
        <div class="form-container">
            <p>Apakah Anda yakin ingin menghapus progress lainnya ini?</p>
            <form id="formDeleteLainnya" action="<?= base_url('user/progress-lainnya/delete/')?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-submit">Ya</button>
            </form>
            <button id="btnCloseMedia" class="btn btn-cancel">Tidak</button>
        </div>
    </div>
</div>