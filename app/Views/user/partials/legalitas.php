<?php if (session()->get('success_legalitas')): ?>
<div id="myAlert" class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?= session()->get('success_legalitas') ?>
</div>
<?php endif; ?>
<?php if (session()->get('errors_legalitas')): ?>
<script>
window.onload = function() {
    document.getElementById("modalLegalitasAdd").style.display = "block";
};
</script>
<?php endif; ?>

<div class="content-container">
    <!-- Legalitas Awal -->
    <?php 
        // dd(base_url('/storage/' . $legalitas[0]['file_legalitas']));
     ?>
    <div class="before-content content-result-container">
        <div class="add-data">
            <h4>Legalitas Before</h4>
            <button id="btnTambahLegalitasBefore">
                Tambah Legalitas Before
            </button>
        </div>
        <?php if (!empty($legalitas) && is_array($legalitas)): 
                $found = false;    
                foreach ($legalitas as $item):
                    if (in_array($item['tipe'], [0])):
                        $found=true;
        ?>
        <div class="content-result-card">
            <b style="color: #ffc107; display:block; margin-bottom: 1rem;">
                <?= $item['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
            </b>
            <div class="content-result-info">
                <p>Legalitas : <?= htmlspecialchars($item['legalitas']) ?></p>
                <div>
                    <button class="btnEdit"
                        onclick="editData('<?= base_url('/user/legalitas/update/') . $item['id_legalitas'] ?>', '<?= $item['legalitas'] ?>' ,'<?= $item['file_legalitas'] ?>')"
                        title="Edit">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusData('<?= base_url('/user/legalitas/delete/') . $item['id_legalitas'] ?>')"
                        title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="content-result-file">
                <p>File Legalitas : </p>
                <iframe width="100%" height="300"
                    src="<?= base_url('/storage/' . htmlspecialchars($item['file_legalitas'])) ?>" title="Document">
                </iframe>
            </div>
        </div>
        <?php endif; 
            endforeach; 
            if (!$found):
        ?>
        <p style="margin-top: 1rem;">Belum ada legalitas awal yang ditambahkan.</p>
        <?php endif; 
         else:
        ?>
        <p style="margin-top: 1rem;">Belum ada legalitas awal yang ditambahkan.</p>
        <?php
            endif; 
        ?>
    </div>
    <!-- Legalitas After -->
    <div class="after-content content-result-container">
        <div class="add-data">
            <h4>Legalitas After</h4>
            <button id="btnTambahLegalitasAfter">
                Tambah Legalitas After
            </button>
        </div>
        <?php if (!empty($legalitas) && is_array($legalitas)): 
                $found = false;    
                foreach ($legalitas as $item):
                    if (in_array($item['tipe'], [1])):
                        $found=true;
        ?>
        <div class="content-result-card">
            <b style="color: #ffc107; display:block; margin-bottom: 1rem;">
                <?= $item['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
            </b>
            <div class="content-result-info">
                <p>Legalitas : <?= htmlspecialchars($item['legalitas']) ?></p>
                <div>
                    <button class="btnEdit"
                        onclick="editData('<?= base_url('/user/legalitas/update/') . $item['id_legalitas'] ?>', '<?= $item['legalitas'] ?>' ,'<?= $item['file_legalitas'] ?>')"
                        title="Edit">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusData('<?= base_url('/user/legalitas/delete/') . $item['id_legalitas'] ?>')"
                        title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="content-result-file">
                <p>File Legalitas : </p>
                <iframe width="100%" height="300"
                    src="<?= base_url('/storage/' . htmlspecialchars($item['file_legalitas'])) ?>" title="Document">
                </iframe>
            </div>
        </div>
        <?php endif; 
            endforeach; 
            if (!$found):
        ?>
        <p style="margin-top: 1rem;">Belum ada legalitas awal yang ditambahkan.</p>
        <?php endif; 
         else:
        ?>
        <p style="margin-top: 1rem;">Belum ada legalitas awal yang ditambahkan.</p>
        <?php
            endif; 
        ?>

    </div>
</div>

<!-- Modal Edit Legalitas -->
<div id="modalLegalitasEdit" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2>Edit Legalitas</h2>
        <div class="form-container">
            <?php if (session()->get('errors_legalitas')): ?>
            <div class="alert-error">
                <ul>
                    <?php foreach (session()->get('errors_legalitas') as $error): ?>
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
                        <label for="legalitas" class="form-label">Jenis Legalitas</label>
                        <input type="text" class="form-control" id="legalitasEditInput" name="legalitas" value=""
                            placeholder="Masukkan jenis legalitas (PT/CV/NIB/,DLL)">
                    </div>
                    <div class="mb-3 input-group">
                        <p for="fileLegalitas" class="form-label">File Legalitas</p>
                        <a id="hyperlinkToFile" href="<?= base_url('/storage/' ) ?>" target="_blank"
                            class="btn btn-primary">Lihat File </a>
                        <input type="file" class="form-control" id="fileLegalitas" name="file_legalitas" accept=".pdf"
                            placeholder="Upload file legalitas">
                        <input id="inputLegalitasLama" type="hidden" name="file_legalitas_lama" value="">
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

<!-- Modal Hapus Legalitas -->

<div class="modal" id="modalLegalitasDelete">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2>Hapus Legalitas</h2>
        <div class="form-container">
            <p>Apakah Anda yakin ingin menghapus legalitas ini?</p>
            <form id="formDelete" action="<?= base_url('user/legalitas/delete/')?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-submit">Ya</button>
            </form>
            <button id="btnClose" class="btn btn-cancel">Tidak</button>
        </div>

    </div>
</div>

<!-- Modal Tambah Legalitas -->
<div id="modalLegalitasAdd" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2 id="titleModalLegalitas">Tambah Legalitas Before</h2>
        <div class="form-container">
            <?php if (session()->get('errors_legalitas')): ?>
            <div class="alert-error">
                <ul>
                    <?php foreach (session()->get('errors_legalitas') as $error): ?>
                    <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            <form action="<?= base_url('user/legalitas/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="legalitas" class="form-label">Jenis Legalitas</label>
                        <input type="text" class="form-control" id="legalitas" name="legalitas"
                            placeholder="Masukkan jenis legalitas (PT/CV/NIB/,DLL)">
                    </div>
                    <div class="mb-3 input-group">
                        <p for="fileLegalitas" class="form-label">File Legalitas</p>
                        <input type="file" class="form-control" id="fileLegalitas" name="file_legalitas" accept=".pdf"
                            placeholder="Upload file legalitas">
                    </div>
                    <input id="tipeInputLegalitas" type="hidden" name="tipe" value="0">
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let modalLegalitasEdit = document.getElementById("modalLegalitasEdit");
let modalLegalitasDelete = document.getElementById("modalLegalitasDelete");
let modalLegalitasAdd = document.getElementById("modalLegalitasAdd");

let titleModalLegalitas = document.getElementById("titleModalLegalitas");
let tipeInputLegalitas = document.getElementById("tipeInputLegalitas")

let legalitasEditInput = document.getElementById("legalitasEditInput");
let hyperlinkToFile = document.getElementById("hyperlinkToFile");
let inputLegalitasLama = document.getElementById("inputLegalitasLama");

let btnTambahLegalitasBefore = document.getElementById("btnTambahLegalitasBefore");
let btnTambahLegalitasAfter = document.getElementById("btnTambahLegalitasAfter");
let btnClose = document.getElementById("btnClose");


let formDelete = document.getElementById("formDelete");
let formEdit = document.getElementById("formEdit");

let span = document.getElementsByClassName("close");
let alert = document.getElementById("myAlert");

function hapusData(action) {
    console.log(action);
    modalLegalitasDelete.style.display = "block";
    formDelete.action = action;
}

function editData(action, legalitas, fileLegalitas) {
    modalLegalitasEdit.style.display = "block";
    formEdit.action = action;
    formEdit.method = "post";
    legalitasEditInput.value = legalitas;
    hyperlinkToFile.href = "<?= base_url('/storage/') ?>" + fileLegalitas;
    hyperlinkToFile.innerHTML = 'Lihat file: ' + fileLegalitas;
    inputLegalitasLama.value = fileLegalitas;
    console.log(action + " " + legalitas + " " + fileLegalitas);
}

btnTambahLegalitasBefore.onclick = function() {
    modalLegalitasAdd.style.display = "block";
    titleModalLegalitas.innerHTML = "Tambah Legalitas Before";
    tipeInputLegalitas.value = "0";
}

btnTambahLegalitasAfter.onclick = function() {
    modalLegalitasAdd.style.display = "block";
    titleModalLegalitas.innerHTML = "Tambah Legalitas After";
    tipeInputLegalitas.value = "1";
}

span[0].onclick = function() {
    modalLegalitasEdit.style.display = "none";
}

span[1].onclick = function() {
    modalLegalitasDelete.style.display = "none";
}

span[2].onclick = function() {
    modalLegalitasAdd.style.display = "none";
}

btnClose.onclick = function() {
    modalLegalitasDelete.style.display = "none";
}
</script>