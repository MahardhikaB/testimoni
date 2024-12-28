<!-- Modal Hapus Produk -->
<div class="modal" id="modalProdukDelete">
    <div class="modal-content">
        <div class="modal-header">
            <span class="produkClose">&times;</span>
        </div>
        <h2>Hapus Produk</h2>
        <p style="margin-top: 0.4rem;">Apakah Anda yakin ingin menghapus produk ini?</p>
        <div class="btn-delete-container">
            <form id="formDeleteProduk" action="<?= base_url('user/produk/delete/')?>" method="post">
                <?= csrf_field() ?>
                <button type="submit">Ya</button>
            </form>
            <button id="btnClose">Tidak</button>
        </div>

    </div>
</div>