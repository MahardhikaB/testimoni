<div class="content-container">
    <!-- Program Pembinaan -->
    <div class="before-content content-result-container">
        <div class="add-data">
            <h4>Program Pembinaan</h4>
            <button id="btnTambahPembinaan">Tambah Program Pembinaan</button>
        </div>
        <?php if (!empty($pembinaan)): ?>
        <?php foreach ($pembinaan as $programItem): ?>
        <div class="content-result-card">
            <b style="color: #ffc107;">
                <?= $programItem['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
            </b>
            <div class="content-result-info">
                <div class="row">
                    <div class="col">
                        <p><strong>Program: </strong> <?= esc($programItem['nama_program']); ?></p>
                    </div>
                    <div class="col">
                        <p><strong>Tahun: </strong> <?= esc($programItem['tahun_program']) ?> </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><strong>Penyelenggara: </strong> <?= esc($programItem['penyelenggara_program']) ?> </p>
                    </div>
                    <div class="col">
                        <p><strong>Deskripsi:</strong> <?= esc($programItem['deskripsi_program']); ?></p>
                    </div>
                </div>
                <div>
                    <button class="btnEdit"
                        onclick="editPembinaan('<?= base_url('user/program/update/') . $programItem['id_program'] ?>', '<?= $programItem['nama_program'] ?>', '<?= $programItem['tahun_program'] ?>', '<?= $programItem['penyelenggara_program'] ?>', '<?= $programItem['deskripsi_program'] ?>')"
                        title="Edit">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusPembinaan('<?= base_url('user/program/delete/') . $programItem['id_program'] ?>')"
                        title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p style="margin-top: 1rem;">Belum ada program pembinaan yang ditambahkan.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Tambah Pembinaan -->
<div id="modalTambahPembinaan" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="pembinaanClose">&times;</span>
        </div>
        <h2 id="titleModalPembinaan">Tambah Program Pembinaan</h2>
        <div class="form-container">
            <form action="<?= base_url('user/program/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="namaProgram" class="form-label">Nama Program</label>
                        <input type="text" class="form-control" id="namaProgram" name="nama_program"
                            placeholder="Masukkan nama program">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="tahunProgram" class="form-label">Tahun Program</label>
                        <input type="text" class="form-control" id="tahunProgram" name="tahun_program"
                            placeholder="Masukkan tahun program">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="penyelenggaraProgram" class="form-label">Penyelenggara Program</label>
                        <input type="text" class="form-control" id="penyelenggaraProgram" name="penyelenggara_program"
                            placeholder="Masukkan penyelenggara program">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="deskripsiProgram" class="form-label">Deskripsi Program</label>
                        <input type="text" class="form-control" id="deskripsiProgram" name="deskripsi_program"
                            placeholder="Masukkan deskripsi program">
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Pembinaan -->
<div id="modalEditPembinaan" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="pembinaanClose">&times;</span>
        </div>
        <h2>Edit Program Pembinaan</h2>
        <div class="form-container">
            <form id="formEditPembinaan" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="namaProgramEdit" class="form-label">Nama Program</label>
                        <input type="text" class="form-control" id="namaProgramEdit" name="nama_program"
                            placeholder="Masukkan nama program">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="tahunProgramEdit" class="form-label">Tahun Program</label>
                        <input type="text" class="form-control" id="tahunProgramEdit" name="tahun_program"
                            placeholder="Masukkan tahun program">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="penyelenggaraProgramEdit" class="form-label">Penyelenggara Program</label>
                        <input type="text" class="form-control" id="penyelenggaraProgramEdit"
                            name="penyelenggara_program" placeholder="Masukkan penyelenggara program">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="deskripsiProgramEdit" class="form-label">Deskripsi Program</label>
                        <input type="text" class="form-control" id="deskripsiProgramEdit" name="deskripsi_program"
                            placeholder="Masukkan deskripsi program">
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div id="modalDeletePembinaan" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="pembinaanClose">&times;</span>
        </div>
        <h2>Hapus Program Pembinaan</h2>
        <div class="form-container">
            <p>Apakah Anda yakin ingin menghapus program pembinaan ini?</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <form id="formDeletePembinaan" action="" method="post">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-submit">Ya</button>
                </form>
                <button class="btn btn-cancel">Tidak</button>
            </div>
        </div>
    </div>
</div>

<script>
let modalTambahPembinaan = document.getElementById("modalTambahPembinaan");
let modalEditPembinaan = document.getElementById("modalEditPembinaan");
let modalDeletePembinaan = document.getElementById("modalDeletePembinaan");
let titleModalPembinaan = document.getElementById("titleModalPembinaan");
let btnTambahPembinaan = document.getElementById("btnTambahPembinaan");
let spanCloseModalTambahPembinaan = document.getElementsByClassName("pembinaanClose")[0];
let spanCloseModalEditPembinaan = document.getElementsByClassName("pembinaanClose")[1];
let spanCloseModalDeletePembinaan = document.getElementsByClassName("pembinaanClose")[2];

// Fungsi untuk membuka modal edit/hapus
function hapusPembinaan(action) {
    modalDeletePembinaan.style.display = "block";
    document.getElementById("formDeletePembinaan").action = action;
}

function editPembinaan(action, nama, tahun, penyelenggara, deskripsi) {
    modalEditPembinaan.style.display = "block";
    document.getElementById("formEditPembinaan").action = action;
    document.getElementById("namaProgramEdit").value = nama;
    document.getElementById("tahunProgramEdit").value = tahun;
    document.getElementById("penyelenggaraProgramEdit").value = penyelenggara;
    document.getElementById("deskripsiProgramEdit").value = deskripsi;
}

// Fungsi untuk membuka modal tambah
btnTambahPembinaan.onclick = function() {
    console.log("tambah");
    modalTambahPembinaan.style.display = "block";
    titleModalPembinaan.innerHTML = "Tambah Program Pembinaan";
};

// Tutup modal saat klik tombol 'x'
spanCloseModalTambahPembinaan.onclick = function() {
    modalTambahPembinaan.style.display = "none";
};

spanCloseModalEditPembinaan.onclick = function() {
    modalEditPembinaan.style.display = "none";
};

spanCloseModalDeletePembinaan.onclick = function() {
    modalDeletePembinaan.style.display = "none";
};
</script>