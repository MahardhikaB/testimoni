<?php if (session()->get('success_produk')): ?>
<script>
document.querySelector('.legalitas').classList.remove('active');
document.querySelector('.produk').classList.add('active');
</script>
<div id="myAlert" class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?= session()->get('success_produk') ?>
</div>
<?php endif; ?>
<?php if (session()->get('produk_errors')): ?>
<script>
document.querySelector('.legalitas').classList.remove('active');
document.querySelector('.produk').classList.add('active');
window.onload = function() {
    document.getElementById("modalProdukAdd").style.display = "block";
};
</script>
<?php endif; ?>

<div class="content-container">
    <!-- Produk Awal -->
    <div class="before-content content-result-container">
        <div class="add-data">
            <h4>Produk Before</h4>
            <button id="btnTambahProdukBefore">
                Tambah Produk Before
            </button>
        </div>
        <?php if (!empty($produk) && is_array($produk)): 
                $found = false;    
                foreach ($produk as $item):
                    if (in_array($item['tipe'], [0])):
                        $found=true;
        ?>
        <div class="content-result-card">
            <b style="color: #ffc107; margin-bottom: 0.4rem; display: block;">
                <?= $item['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
            </b>
            <div class="content-result-info">
                <div class="content-text-container">
                    <h5>
                        Nama Produk
                    </h5>
                    <p>
                        <?= $item['nama_produk']?>
                    </p>
                </div>
                <div>
                    <button class="btnEdit" title="Edit Produk">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusDataMedia('<?= base_url('/user/media/delete/') . $item['id_produk'] ?>')"
                        title="Hapus Produk">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="content-result-text">
                <div class="content-text-container">
                    <h5>
                        Harga
                    </h5>
                    <p>
                        <?= $item['harga_produk']?>
                </div>
                <div class="content-text-container">
                    <h5>
                        Deskripsi Produk
                    </h5>
                    <p>
                        <?= $item['deskripsi_produk']?>
                    </p>
                </div>
            </div>
            <div class="content-result-image-produk">
                <h5>
                    Foto Produk
                </h5>
                <div class="produk-image-container">
                    <?php if (!empty($item['foto_1'])): ?>
                    <div class="produk-image">
                        <img onclick="openImageModal('<?= base_url('/storage/photos/') . $item['foto_1'] ?>', '1')"
                            class="foto" src="<?= base_url('/storage/photos/') . $item['foto_1']  ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($item['foto_2'])): ?>
                    <div class="produk-image">
                        <img onclick="openImageModal('<?= base_url('/storage/photos/') . $item['foto_2'] ?>', '2')"
                            class="foto" src="<?= base_url('/storage/photos/') . $item['foto_2']  ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <div class="produk-image">
                        <?php if (!empty($item['foto_3'])): ?>
                        <img onclick="openImageModal('<?= base_url('/storage/photos/') . $item['foto_3'] ?>', '3')"
                            class="foto" src="<?= base_url('/storage/photos/') . $item['foto_3']  ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($item['foto_4'])): ?>
                    <div class="produk-image">
                        <img onclick="openImageModal('<?= base_url('/storage/photos/') . $item['foto_4'] ?>', '4')"
                            class="foto" src="<?= base_url('/storage/photos/') . $item['foto_4']  ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($item['foto_5'])): ?>
                    <div class="produk-image">
                        <img onclick="openImageModal('<?= base_url('/storage/photos/') . $item['foto_5'] ?>', '5')"
                            class="foto" src="<?= base_url('/storage/photos/') . $item['foto_5']  ?>" alt="">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; 
            endforeach; 
            if (!$found):
        ?>
        <p style="margin-top: 1rem;">Belum ada Produk before yang ditambahkan.</p>
        <?php endif; 
         else:
        ?>
        <p style="margin-top: 1rem;">Belum ada Produk before yang ditambahkan.</p>
        <?php
            endif; 
        ?>
    </div>
    <!-- Produk After -->
    <div class="after-content content-result-container">
        <div class="add-data">
            <h4>Produk After</h4>
            <button id="btnTambahProdukAfter">
                Tambah Produk After
            </button>
        </div>
        <?php if (!empty($produk) && is_array($produk)): 
                $found = false;    
                foreach ($produk as $item):
                    if (in_array($item['tipe'], [1])):
                        $found=true;
        ?>
        <div class="content-result-card">
            <b style="color: #ffc107; margin-bottom: 0.4rem; display: block;">
                <?= $item['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
            </b>
            <div class="content-result-info">
                <div class="content-text-container">
                    <h5>
                        Nama Produk
                    </h5>
                    <p>
                        <?= $item['nama_produk']?>
                    </p>
                </div>
                <div>
                    <button class="btnEdit" title="Edit Produk">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusDataMedia('<?= base_url('/user/media/delete/') . $item['id_produk'] ?>')"
                        title="Hapus Produk">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="content-result-text">
                <div class="content-text-container">
                    <h5>
                        Harga
                    </h5>
                    <p>
                        <?= $item['harga_produk']?>
                </div>
                <div class="content-text-container">
                    <h5>
                        Deskripsi Produk
                    </h5>
                    <p>
                        <?= $item['deskripsi_produk']?>
                    </p>
                </div>
            </div>
            <div class="content-result-image-produk">
                <h5>
                    Foto Produk
                </h5>
                <div class="produk-image-container">
                    <?php if (!empty($item['foto_1'])): ?>
                    <div class="produk-image">
                        <img onclick="openImageModal('<?= base_url('/storage/photos/') . $item['foto_1'] ?>', '1')"
                            class="foto" src="<?= base_url('/storage/photos/') . $item['foto_1']  ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($item['foto_2'])): ?>
                    <div class="produk-image">
                        <img onclick="openImageModal('<?= base_url('/storage/photos/') . $item['foto_2'] ?>', '2')"
                            class="foto" src="<?= base_url('/storage/photos/') . $item['foto_2']  ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <div class="produk-image">
                        <?php if (!empty($item['foto_3'])): ?>
                        <img onclick="openImageModal('<?= base_url('/storage/photos/') . $item['foto_3'] ?>', '3')"
                            class="foto" src="<?= base_url('/storage/photos/') . $item['foto_3']  ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($item['foto_4'])): ?>
                    <div class="produk-image">
                        <img onclick="openImageModal('<?= base_url('/storage/photos/') . $item['foto_4'] ?>', '4')"
                            class="foto" src="<?= base_url('/storage/photos/') . $item['foto_4']  ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($item['foto_5'])): ?>
                    <div class="produk-image">
                        <img onclick="openImageModal('<?= base_url('/storage/photos/') . $item['foto_5'] ?>', '5')"
                            class="foto" src="<?= base_url('/storage/photos/') . $item['foto_5']  ?>" alt="">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; 
            endforeach; 
            if (!$found):
        ?>
        <p style="margin-top: 1rem;">Belum ada Produk after yang ditambahkan.</p>
        <?php endif; 
         else:
        ?>
        <p style="margin-top: 1rem;">Belum ada Produk after yang ditambahkan.</p>
        <?php
            endif; 
        ?>
    </div>
</div>

<?= $this->include('user/partials/modals/produk/add') ?>
<?= $this->include('user/partials/modals/produk/edit') ?>
<?= $this->include('user/partials/modals/produk/delete') ?>
<?= $this->include('user/partials/modals/produk/image') ?>

<script src="../../../../js/produkModal.js"></script>
<script src="../../../../js/modal.js"></script>