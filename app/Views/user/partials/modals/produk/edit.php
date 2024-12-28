<!-- Modal Edit Media Promosi -->
<div id="modalProdukEdit" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="produkClose">&times;</span>
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
            <form id="formEditProduk" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="input-container">
                    <div class="input-group">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="edit_nama_produk" name="nama_produk"
                            placeholder="Masukkan nama produk" value="">
                    </div>
                    <div class="input-group">
                        <label for="harga_produk" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="edit_harga_produk" name="harga_produk"
                            placeholder="Masukkan harga produk">
                    </div>
                    <div class="input-group">
                        <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="edit_deskripsi_produk" name="deskripsi_produk"
                            placeholder="Masukkan deskripsi media promosi"></textarea>
                    </div>
                    <div class="input-group">
                        <p for="foto_1" class="form-label">Foto Produk 1</p>
                        <img src="" alt="" id="edit_foto_1_preview" style="width: 100px; height: 100px; display: none;">
                        <input type="file" class="form-control" id="edit_foto_1" name="foto_1" accept="image/*"
                            placeholder="Upload file foto produk">
                        <input type="hidden" id="edit_foto_1_old" name="foto_1_old">
                    </div>
                    <div class="input-group">
                        <p for="foto_2" class="form-label">Foto Produk 2</p>
                        <img src="" alt="" id="edit_foto_2_preview" style="width: 100px; height: 100px; display: none;">
                        <input type="file" class="form-control" id="edit_foto_2" name="foto_2" accept="image/*"
                            placeholder="Upload file foto produk">
                        <input type="hidden" id="edit_foto_2_old" name="foto_2_old">
                    </div>
                    <div class="input-group">
                        <p for="foto_3" class="form-label">Foto Produk 3</p>
                        <img src="" alt="" id="edit_foto_3_preview" style="width: 100px; height: 100px; display: none;">
                        <input type="file" class="form-control" id="edit_foto_3" name="foto_3" accept="image/*"
                            placeholder="Upload file foto produk">
                        <input type="hidden" id="edit_foto_3_old" name="foto_3_old">
                    </div>
                    <div class="input-group">
                        <p for="foto_4" class="form-label">Foto Produk 4</p>
                        <img src="" alt="" id="edit_foto_4_preview" style="width: 100px; height: 100px; display: none;">
                        <input type="file" class="form-control" id="edit_foto_4" name="foto_4" accept="image/*"
                            placeholder="Upload file foto produk">
                        <input type="hidden" id="edit_foto_4_old" name="foto_4_old">
                    </div>
                    <div class="input-group">
                        <p for="foto_5" class="form-label">Foto Produk 5</p>
                        <img src="" alt="" id="edit_foto_5_preview" style="width: 100px; height: 100px; display: none;">
                        <input type="file" class="form-control" id="edit_foto_5" name="foto_5" accept="image/*"
                            placeholder="Upload file foto produk">
                        <input type="hidden" id="edit_foto_5_old" name="foto_5_old">
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>