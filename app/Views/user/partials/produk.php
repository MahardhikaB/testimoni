<?php if (session()->get('success_produk')): ?>
<div id="myAlert" class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?= session()->get('success_produk') ?>
</div>
<?php endif; ?>

<?php if (session()->get('errors')): ?>
<script>
window.onload = function() {
    document.getElementById("myModal").style.display = "block";
};
</script>
<?php endif; ?>

<div id="produk" class="content-container">
    <!-- Produk Awal -->
    <div class="before-content content-result-container">
        <h4>Produk Awal</h4>
        <?php
        $produkAwal = array_filter($produk, fn($p) => $p['tipe'] == 0);
        $found = false;
        ?>
        <?php if (!empty($produkAwal)): ?>
            <?php foreach ($produkAwal as $produkItem): ?>
                <div class="content-result-card">
                    <div class="content-result-info">
                        <p>Nama Produk: <?= esc($produkItem['nama_produk']); ?></p>
                        <p>Deskripsi: <?= esc($produkItem['deskripsi_produk']); ?></p>
                        <p>Harga: Rp <?= number_format($produkItem['harga_produk'], 0, ',', '.'); ?></p>
                        <div>
                            <button class="btnEdit" onclick="" title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button class="btnHapus" onclick="hapusData('<?= base_url('/produk/delete/') . $produkItem['id_produk'] ?>')" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php $found = true; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!$found): ?>
        <p style="margin-top: 1rem;">Belum ada produk awal yang ditambahkan.</p>
        <?php endif; ?>
    </div>

    <!-- Produk Akhir -->
    <div class="after-content content-result-container">
        <h4>Produk Akhir</h4>
        <?php
        $produkAkhir = array_filter($produk, fn($p) => $p['tipe'] == 1);
        $found = false;
        ?>
        <?php if (!empty($produkAkhir)): ?>
            <?php foreach ($produkAkhir as $produkItem): ?>
                <div class="content-result-card">
                    <div class="content-result-info">
                        <p>Nama Produk: <?= esc($produkItem['nama_produk']); ?></p>
                        <p>Deskripsi: <?= esc($produkItem['deskripsi_produk']); ?></p>
                        <p>Harga: Rp <?= number_format($produkItem['harga_produk'], 0, ',', '.'); ?></p>
                        <div>
                            <button class="btnEdit" onclick="" title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button class="btnHapus" onclick="hapusData('<?= base_url('/produk/delete/') . $produkItem['id_produk'] ?>')" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php $found = true; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!$found): ?>
        <p style="margin-top: 1rem;">Belum ada produk akhir yang ditambahkan.</p>
        <?php endif; ?>
    </div>

    <div class="add-data">
        <button id="btnTambahProdukAwal">Tambah Produk Awal</button>
        <button id="btnTambahProdukAkhir">Tambah Produk Akhir</button>
    </div>
</div>

<!-- Modal Tambah/Edit Produk -->
<div id="myModalProduk" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2 id="titleModalProduk">Tambah Produk</h2>
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
            <form id="formProduk" action="<?= base_url('produk/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                            placeholder="Masukkan nama produk">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="deskripsi_produk" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk"
                            placeholder="Masukkan deskripsi produk"></textarea>
                    </div>
                    <div class="mb-3 input-group">
                        <label for="harga_produk" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga_produk" name="harga_produk"
                            placeholder="Masukkan harga produk">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="foto_produk" class="form-label">Foto Produk (Maks 5)</label>
                        <input type="file" class="form-control" id="foto_produk" name="foto_produk[]"
                            accept="image/*" multiple>
                    </div>
                    <input id="tipe_produk" type="hidden" name="tipe" value="0">
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let modalProduk = document.getElementById("myModalProduk");
let titleModalProduk = document.getElementById("titleModalProduk");
let tipeProduk = document.getElementById("tipe_produk");

let btnTambahProdukAwal = document.getElementById("btnTambahProdukAwal");
let btnTambahProdukAkhir = document.getElementById("btnTambahProdukAkhir");
let spanProduk = modalProduk.getElementsByClassName("close")[0];

btnTambahProdukAwal.onclick = function () {
    modalProduk.style.display = "block";
    titleModalProduk.innerHTML = "Tambah Produk Awal";
    tipeProduk.value = "0";
}

btnTambahProdukAkhir.onclick = function () {
    modalProduk.style.display = "block";
    titleModalProduk.innerHTML = "Tambah Produk Akhir";
    tipeProduk.value = "1";
}

spanProduk.onclick = function () {
    modalProduk.style.display = "none";
}

window.onclick = function (event) {
    if (event.target === modalProduk) {
        modalProduk.style.display = "none";
    }
};
</script>
