<!-- Modal Hapus Pencapaian Ekspor -->
<div class="modal" id="modalLainnyaDelete">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2>Hapus Pencapaian Ekspor</h2>
        <p style="margin-top: 0.4rem;">Apakah Anda yakin ingin menghapus pencapaian ekspor ini?</p>
        <div class="btn-delete-container">
            <form id="formDeleteLainnya" action="<?= base_url('user/progress-lainnya/delete/')?>" method="post">
                <?= csrf_field() ?>
                <button type="submit">Ya</button>
            </form>
            <button id="btnCloseMedia">Tidak</button>
        </div>
    </div>
</div>