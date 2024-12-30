<!-- Modal Tambah Media Promosi Before -->
<div id="modalProdukAdd" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="produkClose">&times;</span>
        </div>
        <h2 id="titleModalProduk">Tambah Media Promosi Before</h2>
        <div class="form-container">
            <?php if (session()->get('produk_errors')): ?>
            <div class="alert-error">
                <ul>
                    <?php foreach (session()->get('produk_errors') as $error): ?>
                    <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            <form action="<?= base_url('user/produk/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="input-container">
                    <div class="input-group">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                            placeholder="Masukkan nama produk">
                    </div>
                    <div class="input-group">
                        <label for="harga_produk" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga_produk" name="harga_produk"
                            placeholder="Masukkan harga produk">
                    </div>
                    <div class="input-group">
                        <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk"
                            placeholder="Masukkan deskripsi media promosi"></textarea>
                    </div>
                    <div class="input-group">
                        <p for="foto_1" class="form-label">Foto Produk 1</p>
                        <input type="file" class="form-control" id="foto_1" name="foto_1" accept="image/*"
                            placeholder="Upload file foto produk">
                    </div>
                    <div class="input-group">
                        <p for="foto_2" class="form-label">Foto Produk 2</p>
                        <input type="file" class="form-control" id="foto_2" name="foto_2" accept="image/*"
                            placeholder="Upload file foto produk">
                    </div>
                    <div class="input-group">
                        <p for="foto_3" class="form-label">Foto Produk 3</p>
                        <input type="file" class="form-control" id="foto_3" name="foto_3" accept="image/*"
                            placeholder="Upload file foto produk">
                    </div>
                    <div class="input-group">
                        <p for="foto_4" class="form-label">Foto Produk 4</p>
                        <input type="file" class="form-control" id="foto_4" name="foto_4" accept="image/*"
                            placeholder="Upload file foto produk">
                    </div>
                    <div class="input-group">
                        <p for="foto_5" class="form-label">Foto Produk 5</p>
                        <input type="file" class="form-control" id="foto_5" name="foto_5" accept="image/*"
                            placeholder="Upload file foto produk">
                    </div>
                    <input id="tipeInputProduk" type="hidden" name="tipe" value="0">
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>