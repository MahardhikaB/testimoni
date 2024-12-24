<?php if (session()->get('success_media')): ?>
<script>
document.querySelector('.legalitas').classList.remove('active');
document.querySelector('.media-promosi').classList.add('active');
</script>
<div id="myAlert" class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?= session()->get('success_media') ?>
</div>
<?php endif; ?>
<?php if (session()->get('errors')): ?>
<script>
window.onload = function() {
    document.getElementById("myModal").style.display = "block";
};
</script>
<?php endif; ?>

<div class="content-container">
    <!-- Media Promosi Awal -->
    <div class="before-content content-result-container">
        <div class="add-data">
            <h4>Media Promosi Before</h4>
            <button id="btnTambahMediaPromosiBefore">
                Tambah Media Promosi Before
            </button>
        </div>
        <?php if (!empty($mediaPromosi) && is_array($mediaPromosi)): 
                $found = false;    
                foreach ($mediaPromosi as $item):
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
                        Media Promosi
                    </h5>
                    <p>
                        <?= $item['nama_media']?>
                    </p>
                </div>
                <div>
                    <button class="btnEdit"
                        onclick="editDataMedia('<?= base_url('/user/media/update/') . $item['id_media'] ?>', '<?= $item['nama_media'] ?>' ,'<?= $item['tahun_media'] ?>', '<?= $item['deskripsi_media'] ?>')"
                        title="Edit Media Promosi">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusDataMedia('<?= base_url('/user/media/delete/') . $item['id_media'] ?>')"
                        title="Hapus Media Promosi">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="content-result-text">
                <div class="content-text-container">
                    <h5>
                        Tahun
                    </h5>
                    <p>
                        <?= $item['tahun_media']?>
                </div>
                <div class="content-text-container">
                    <h5>
                        Deskripsi
                    </h5>
                    <p>
                        <?= $item['deskripsi_media']?>
                    </p>
                </div>
            </div>
        </div>
        <?php endif; 
            endforeach; 
            if (!$found):
        ?>
        <p style="margin-top: 1rem;">Belum ada media promosi before yang ditambahkan.</p>
        <?php endif; 
         else:
        ?>
        <p style="margin-top: 1rem;">Belum ada media promosi before yang ditambahkan.</p>
        <?php
            endif; 
        ?>
    </div>
    <!-- Media Promosi After -->
    <div class="after-content content-result-container">
        <div class="add-data">
            <h4>Media Promosi After</h4>
            <button id="btnTambahMediaPromosiAfter">
                Tambah Media Promosi After
            </button>
        </div>
        <?php if (!empty($mediaPromosi) && is_array($mediaPromosi)): 
                $found = false;    
                foreach ($mediaPromosi as $item):
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
                        Media Promosi
                    </h5>
                    <p>
                        <?= $item['nama_media']?>
                    </p>
                </div>
                <div>
                    <button class="btnEdit"
                        onclick="editDataMedia('<?= base_url('/user/media/update/') . $item['id_media'] ?>', '<?= $item['nama_media'] ?>' ,'<?= $item['tahun_media'] ?>', '<?= $item['deskripsi_media'] ?>')"
                        title="Edit Media Promosi">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusDataMedia('<?= base_url('/user/media/delete/') . $item['id_media'] ?>')"
                        title="Hapus Media Promosi">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="content-result-text">
                <div class="content-text-container">
                    <h5>
                        Tahun
                    </h5>
                    <p>
                        <?= $item['tahun_media']?>
                </div>
                <div class="content-text-container">
                    <h5>
                        Deskripsi
                    </h5>
                    <p>
                        <?= $item['deskripsi_media']?>
                    </p>
                </div>
            </div>
        </div>
        <?php endif; 
            endforeach; 
            if (!$found):
        ?>
        <p style="margin-top: 1rem;">Belum ada media promosi after yang ditambahkan.</p>
        <?php endif; 
         else:
        ?>
        <p style="margin-top: 1rem;">Belum ada media promosi after yang ditambahkan.</p>
        <?php
            endif; 
        ?>
    </div>
</div>

<?= $this->include('user/partials/modals/media_promosi/add') ?>
<?= $this->include('user/partials/modals/media_promosi/edit') ?>
<?= $this->include('user/partials/modals/media_promosi/delete') ?>

<script src="../../../../js/mediaModal.js"></script>