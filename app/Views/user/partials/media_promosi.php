<?php if (session()->get('success_media_promosi')): ?>
<div id="myAlert" class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?= session()->get('success_media_promosi') ?>
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
    <?php 
        // dd(base_url('/storage/' . $mediaPromosi[0]['file_media_promosi']));
     ?>
    <div class="before-content content-result-container">
        <div class="add-data">
            <h4>Media Promosi Before</h4>
            <button id="btnTambahMedia PromosiBefore">
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
                        onclick="editData('<?= base_url('/user/media_promosi/update/') . $item['id_media'] ?>', '<?= $item['nama_media'] ?>' ,'<?= $item['tahun_media'] ?>', '<?= $item['deskripsi_media'] ?>')"
                        title="Edit">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusData('<?= base_url('/user/media_promosi/delete/') . $item['id_media'] ?>')"
                        title="Hapus">
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
        <p style="margin-top: 1rem;">Belum ada media promosi awal yang ditambahkan.</p>
        <?php endif; 
         else:
        ?>
        <p style="margin-top: 1rem;">Belum ada media promosi awal yang ditambahkan.</p>
        <?php
            endif; 
        ?>
    </div>
    <!-- Media Promosi After -->
    <div class="after-content content-result-container">
        <div class="add-data">
            <h4>Media Promosi Before</h4>
            <button id="btnTambahMedia PromosiBefore">
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
                        onclick="editData('<?= base_url('/user/media_promosi/update/') . $item['id_media'] ?>', '<?= $item['nama_media'] ?>' ,'<?= $item['tahun_media'] ?>', '<?= $item['deskripsi_media'] ?>')"
                        title="Edit">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusData('<?= base_url('/user/media_promosi/delete/') . $item['id_media'] ?>')"
                        title="Hapus">
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
        <p style="margin-top: 1rem;">Belum ada media promosi awal yang ditambahkan.</p>
        <?php endif; 
         else:
        ?>
        <p style="margin-top: 1rem;">Belum ada media promosi awal yang ditambahkan.</p>
        <?php
            endif; 
        ?>
    </div>
</div>

<!-- Modal Edit Media Promosi -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
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
            <form id="formEdit" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <!-- Kolom kiri -->
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="media_promosi" class="form-label">Jenis Media Promosi</label>
                        <input type="text" class="form-control" id="media_promosiEditInput" name="media_promosi"
                            value="" placeholder="Masukkan jenis media_promosi (BPOM, dll)">
                    </div>
                    <div class="mb-3 input-group">
                        <p for="fileMedia Promosi" class="form-label">File Media Promosi</p>
                        <a id="hyperlinkToFile" href="<?= base_url('/storage/' ) ?>" target="_blank"
                            class="btn btn-primary">Lihat File </a>
                        <input type="file" class="form-control" id="fileMedia Promosi" name="file_media_promosi"
                            accept=".pdf" placeholder="Upload file media_promosi">
                        <input id="inputMedia PromosiLama" type="hidden" name="file_media_promosi_lama" value="">
                    </div>
                </div>
                <!-- Tombol Kembali dan Submit -->
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus Media Promosi -->

<div class="modal" id="myModalDelete">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2>Hapus Media Promosi</h2>
        <p style="margin-top: 0.4rem;">Apakah Anda yakin ingin menghapus media_promosi ini?</p>
        <div class="btn-delete-container">
            <form id="formDelete" action="<?= base_url('user/media_promosi/delete/')?>" method="post">
                <?= csrf_field() ?>
                <button type="submit">Ya</button>
            </form>
            <button id="btnClose">Tidak</button>
        </div>

    </div>
</div>

<!-- Modal Tambah Media Promosi Before -->
<div id="myModalAdd" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2 id="titleModal">Tambah Media Promosi Before</h2>
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
            <form action="<?= base_url('user/media_promosi/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="media_promosi" class="form-label">Jenis Media Promosi</label>
                        <input type="text" class="form-control" id="media_promosi" name="media_promosi"
                            placeholder="Masukkan jenis media_promosi (BPOM, dll)">
                    </div>
                    <div class="mb-3 input-group">
                        <p for="fileMedia Promosi" class="form-label">File Media Promosi</p>
                        <input type="file" class="form-control" id="fileMedia Promosi" name="file_media_promosi"
                            accept=".pdf" placeholder="Upload file media_promosi">
                    </div>
                    <input id="tipe_input" type="hidden" name="tipe" value="0">
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let modal = document.getElementById("myModal");
let modalDelete = document.getElementById("myModalDelete");
let modalAdd = document.getElementById("myModalAdd");

let titleModal = document.getElementById("titleModal");
let tipe_input = document.getElementById("tipe_input")

let media_promosiEditInput = document.getElementById("media_promosiEditInput");
let hyperlinkToFile = document.getElementById("hyperlinkToFile");
let inputMediaPromosiLama = document.getElementById("inputMediaPromosiLama");

let btnTambahMediaPromosiBefore = document.getElementById("btnTambahMediaPromosiBefore");
let btnTambahMediaPromosiAfter = document.getElementById("btnTambahMediaPromosiAfter");
let btnClose = document.getElementById("btnClose");


let formDelete = document.getElementById("formDelete");
let formEdit = document.getElementById("formEdit");

let span = document.getElementsByClassName("close");
let alert = document.getElementById("myAlert");

function hapusData(action) {
    console.log(action);
    modalDelete.style.display = "block";
    formDelete.action = action;
}

function editData(action, media_promosi, fileMediaPromosi) {
    modal.style.display = "block";
    formEdit.action = action;
    formEdit.method = "post";
    media_promosiEditInput.value = media_promosi;
    hyperlinkToFile.href = "<?= base_url('/storage/') ?>" + fileMediaPromosi;
    hyperlinkToFile.innerHTML = 'Lihat file: ' + fileMediaPromosi;
    inputMediaPromosiLama.value = fileMediaPromosi;
    console.log(action + " " + media_promosi + " " + fileMediaPromosi);
}

btnTambahMediaPromosiBefore.onclick = function() {
    console.log("TEEST")
    modalAdd.style.display = "block";
    titleModal.innerHTML = "Tambah MediaPromosi Before";
    tipe_input.value = "0";
}

btnTambahMediaPromosiAfter.onclick = function() {
    modalAdd.style.display = "block";
    titleModal.innerHTML = "Tambah MediaPromosi After";
    tipe_input.value = "1";
}

span[0].onclick = function() {
    modal.style.display = "none";
}

span[1].onclick = function() {
    modalDelete.style.display = "none";
}

span[2].onclick = function() {
    modalAdd.style.display = "none";
}

btnClose.onclick = function() {
    modalDelete.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === modal || event.target === modalAdd || event.target === modalDelete) {
        modal.style.display = "none";
        modalAdd.style.display = "none";
        modalDelete.style.display = "none";
    }
};
</script>