<!-- Modal Hapus Produk -->
<div class="modal" id="modalProdukDelete">
    <div class="modal-content">
        <div class="modal-header">
            <span class="produkClose">&times;</span>
        </div>
        <h2>Hapus Produk</h2>
        <div class="form-container">
            <p>Apakah Anda yakin ingin menghapus produk ini?</p>
            <form id="formDeleteProduk" action="<?= base_url('user/produk/delete/')?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-submit">Ya</button>
            </form>
            <button id="btnCloseProduk" class="btn btn-cancel">Tidak</button>
        </div>

    </div>
</div>