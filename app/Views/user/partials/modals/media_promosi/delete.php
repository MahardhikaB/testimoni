<!-- Modal Hapus Media Promosi -->
<div class="modal" id="modalMediaDelete">
    <div class="modal-content">
        <div class="modal-header">
            <span class="mediaClose">&times;</span>
        </div>
        <h2>Hapus Media Promosi</h2>
        <p style="margin-top: 0.4rem;">Apakah Anda yakin ingin menghapus media_promosi ini?</p>
        <div class="btn-delete-container">
            <form id="formDeleteMedia" action="<?= base_url('user/media_promosi/delete/')?>" method="post">
                <?= csrf_field() ?>
                <button type="submit">Ya</button>
            </form>
            <button id="btnCloseMedia">Tidak</button>
        </div>

    </div>
</div>