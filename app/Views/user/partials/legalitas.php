<?php if (session()->get('success_legalitas')): ?>
<div id="myAlert" class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?= session()->get('success_legalitas') ?>
</div>
<?php endif; ?>
<?php if (session()->get('errors')): ?>
<script>
window.onload = function() {
    document.getElementById("myModal").style.display = "block";
};
</script>
<?php endif; ?>

<div id="legalitas" class="content-container">
    <!-- Legalitas Awal -->
    <?php 
        // dd(base_url('/storage/' . $legalitas[0]['file_legalitas']));
     ?>
    <div class="before-content content-result-container">
        <h4>Legalitas Before</h4>
        <?php if (!empty($legalitas) && is_array($legalitas)): 
                $found = false;    
                foreach ($legalitas as $item):
                    if (in_array($item['tipe'], [0, 3])):
                        $found=true;
        ?>
        <div class="content-result-card">
            <b style="color: #ffc107;">
                <?= $item['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
            </b>
            <div class="content-result-info">
                <p>Legalitas : <?= htmlspecialchars($item['legalitas']) ?></p>
                <div>
                    <button class="btnEdit" onclick="" title="Edit">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus" onclick="hapusData(<?= $legalitas[0]['id_legalitas'] ?>)" title="Hapus">
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
            endif; 
        ?>
    </div>
    <!-- Legalitas After -->
    <div class="after-content content-result-container">
        <h4>Legalitas After</h4>
        <?php if (!empty($legalitas) && is_array($legalitas)): 
                $found = false;    
                foreach ($legalitas as $item):
                    if (in_array($item['tipe'], [1, 3])):
                        $found=true;
        ?>
        <div class="content-result-card">
            <b style="color: #ffc107;">
                <?= $item['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
            </b>
            <div class="content-result-info">
                <p>Legalitas : <?= htmlspecialchars($item['legalitas']) ?></p>
                <div>
                    <button class="btnEdit" onclick="" title="Edit">
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
            endif; 
        ?>
    </div>
    <div class="add-data">
        <button id="btnTambahLegalitasBefore">
            Tambah Legalitas Before
        </button>
        <button id="btnTambahLegalitasAfter">
            Tambah Legalitas After
        </button>
    </div>
</div>

<!-- Modal Edit Legalitas -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2>Edit Legalitas</h2>
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
            <form action="<?= base_url('user/legalitas/update/') . $legalitas[0]['id_legalitas'] ?>" method="post"
                enctype="multipart/form-data">
                <?= csrf_field() ?>
                <!-- Kolom kiri -->
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="legalitas" class="form-label">Jenis Legalitas</label>
                        <input type="text" class="form-control" id="legalitas" name="legalitas"
                            value="<?= $legalitas[0]['legalitas'] ?>"
                            placeholder="Masukkan jenis legalitas (BPOM, dll)">
                    </div>
                    <div class="mb-3 input-group">
                        <p for="fileLegalitas" class="form-label">File Legalitas</p>
                        <a href="<?= base_url('/storage/' . $legalitas[0]['file_legalitas']) ?>" target="_blank"
                            class="btn btn-primary">Lihat File <?= $legalitas[0]['file_legalitas']  ?></a>
                        <input type="file" class="form-control" id="fileLegalitas" name="file_legalitas" accept=".pdf"
                            placeholder="Upload file legalitas">
                        <input type="hidden" name="file_legalitas_lama" value="<?= $legalitas[0]['file_legalitas'] ?>">
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

<div class="modal" id="myModalDelete">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2>Hapus Legalitas</h2>
        <p style="margin-top: 0.4rem;">Apakah Anda yakin ingin menghapus legalitas ini?</p>
        <div class="btn-delete-container">
            <form id="formDelete" action="<?= base_url('user/legalitas/delete/')?>" method="post">
                <?= csrf_field() ?>
                <button type="submit">Ya</button>
            </form>
            <button id="btnClose">Tidak</button>
        </div>

    </div>
</div>

<!-- Modal Tambah Legalitas Before -->
<div id="myModalAdd" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2 id="titleModal">Tambah Legalitas Before</h2>
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
            <form action="<?= base_url('user/legalitas/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="legalitas" class="form-label">Jenis Legalitas</label>
                        <input type="text" class="form-control" id="legalitas" name="legalitas"
                            placeholder="Masukkan jenis legalitas (BPOM, dll)">
                    </div>
                    <div class="mb-3 input-group">
                        <p for="fileLegalitas" class="form-label">File Legalitas</p>
                        <input type="file" class="form-control" id="fileLegalitas" name="file_legalitas" accept=".pdf"
                            placeholder="Upload file legalitas">
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
let btn = document.getElementsByClassName("btnEdit");
let btnTambahLegalitasBefore = document.getElementById("btnTambahLegalitasBefore");
let btnTambahLegalitasAfter = document.getElementById("btnTambahLegalitasAfter");
let btnClose = document.getElementById("btnClose");
let span = document.getElementsByClassName("close");
let formDelete = document.getElementById("formDelete");
let alert = document.getElementById("myAlert");

function hapusData(action) {
    console.log(action);
    modalDelete.style.display = "block";
    formDelete.action = action;
}

btn[0].onclick = function() {
    modal.style.display = "block";
}

btn[1].onclick = function() {
    modal.style.display = "block";
}

btnTambahLegalitasBefore.onclick = function() {
    modalAdd.style.display = "block";
    titleModal.innerHTML = "Tambah Legalitas Before";
    tipe_input.value = "0";
}

btnTambahLegalitasAfter.onclick = function() {
    modalAdd.style.display = "block";
    titleModal.innerHTML = "Tambah Legalitas After";
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