<!-- Modal Hapus Media Promosi -->
<div class="modal" id="modalMediaDelete">
    <div class="modal-content">
        <div class="modal-header">
            <span class="mediaClose">&times;</span>
        </div>
        <h2>Hapus Media Promosi</h2>
        <div class="form-container">
            <p>Apakah Anda yakin ingin menghapus media promosi ini?</p>
            <form id="formDeleteMedia" action="<?= base_url('user/media_promosi/delete/')?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-submit">Ya</button>
            </form>
            <button id="btnCloseMedia" class="btn btn-cancel">Tidak</button>
        </div>
    </div>
</div>