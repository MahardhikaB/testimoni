<?php if (session()->get('success_sertifikat')): ?>
<script>
document.querySelector('.legalitas').classList.remove('active');
document.querySelector('.sertifikasi').classList.add('active');
</script>
<div id="myAlert" class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?= session()->get('success_sertifikat') ?>
</div>
<?php endif; ?>
<?php if (session()->get('sertifikat_errors')): ?>
<script>
document.querySelector('.legalitas').classList.remove('active');
document.querySelector('.sertifikasi').classList.add('active');
window.onload = function() {
    document.getElementById("modalTambahSertifikasi").style.display = "block";
};
</script>
<?php endif; ?>
<div class="content-container">
    <!-- Sertifikasi Awal -->
    <div class="before-content content-result-container">
        <div class="add-data">
            <h4>Sertifikasi Awal</h4>
            <button id="btnTambahSertifikasiAwal">Tambah Sertifikasi Awal</button>
        </div>
        <?php
        $sertifikasiAwal = array_filter($sertifikat, fn($s) => $s['tipe'] == 0);
        ?>
        <?php if (!empty($sertifikasiAwal)): ?>
        <?php foreach ($sertifikasiAwal as $sertifikatItem): ?>
        <div class="content-result-card">
            <b style="color: #ffc107;">
                <?= $sertifikatItem['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
            </b>
            <div class="content-result-info">
                <p>Certification Title: <?= esc($sertifikatItem['judul_sertifikat']); ?></p>
                <p><strong>Certificate Number:</strong> <?= esc($sertifikatItem['no_sertifikat']); ?></p>
                <p><strong>Issue Date:</strong> <?= esc($sertifikatItem['tanggal_terbit_sertifikat']); ?></p>
                <p><strong>Issuer:</strong> <?= esc($sertifikatItem['penerbit_sertifikat']); ?></p>
                <div>
                    <button class="btnEdit"
                        onclick="editSertifikasi('<?= base_url('/user/sertifikat/update/') . $sertifikatItem['id_sertifikat'] ?>', '<?= $sertifikatItem['judul_sertifikat'] ?>')"
                        title="Edit">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusSertifikasi('<?= base_url('/user/sertifikat/delete/') . $sertifikatItem['id_sertifikat'] ?>')"
                        title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <!-- show files with i frame-->
            <div class="content-result-file">
                <iframe src="<?= base_url('storage/sertifikat/' . $sertifikatItem['file_sertifikat']) ?>" width="100%"
                    height="300px"></iframe>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p style="margin-top: 1rem;">Belum ada sertifikasi awal yang ditambahkan.</p>
        <?php endif; ?>
    </div>

    <!-- Sertifikasi Akhir -->
    <div class="after-content content-result-container">
        <div class="add-data">
            <h4>Sertifikasi Akhir</h4>
            <button id="btnTambahSertifikasiAkhir">Tambah Sertifikasi Akhir</button>
        </div>
        <?php
        $sertifikasiAkhir = array_filter($sertifikat, fn($s) => $s['tipe'] == 1);
        ?>
        <?php if (!empty($sertifikasiAkhir)): ?>
        <?php foreach ($sertifikasiAkhir as $sertifikatItem): ?>
        <div class="content-result-card">
            <b style="color: #ffc107;">
                <?= $sertifikatItem['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
            </b>
            <div class="content-result-info">
                <p>Certification Title: <?= esc($sertifikatItem['judul_sertifikat']); ?></p>
                <p><strong>Certificate Number:</strong> <?= esc($sertifikatItem['no_sertifikat']); ?></p>
                <p><strong>Issue Date:</strong> <?= esc($sertifikatItem['tanggal_terbit_sertifikat']); ?></p>
                <p><strong>Issuer:</strong> <?= esc($sertifikatItem['penerbit_sertifikat']); ?></p>
                <div>
                    <button class="btnEdit"
                        onclick="editSertifikasi('<?= base_url('/user/sertifikat/update/') . $sertifikatItem['id_sertifikat'] ?>', '<?= $sertifikatItem['judul_sertifikat'] ?>')"
                        title="Edit">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button class="btnHapus"
                        onclick="hapusSertifikasi('<?= base_url('/user/sertifikat/delete/') . $sertifikatItem['id_sertifikat'] ?>')"
                        title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <!-- show files with i frame-->
            <div class="content-result-file">
                <iframe src="<?= base_url('storage/sertifikat/' . $sertifikatItem['file_sertifikat']) ?>" width="100%"
                    height="300px"></iframe>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p style="margin-top: 1rem;">Belum ada sertifikasi awal yang ditambahkan.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Tambah Sertifikasi -->
<div id="modalTambahSertifikasi" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="sertifikatClose">&times;</span>
        </div>
        <h2 id="titleModalSertifikasi">Tambah Sertifikasi</h2>
        <div class="form-container">
            <form action="<?= base_url('user/sertifikat/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="judulSertifikat" class="form-label">Judul Sertifikat</label>
                        <input type="text" class="form-control" id="judulSertifikat" name="judul_sertifikat"
                            placeholder="Masukkan judul sertifikat">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="noSertifikat" class="form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control" id="noSertifikat" name="no_sertifikat"
                            placeholder="Masukkan nomor sertifikat">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="tanggalTerbitSertifikat" class="form-label">Tanggal Terbit Sertifikat</label>
                        <input type="date" class="form-control" id="tanggalTerbitSertifikat"
                            name="tanggal_terbit_sertifikat" placeholder="Masukkan tanggal terbit sertifikat">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="penerbitSertifikat" class="form-label">Penerbit Sertifikat</label>
                        <input type="text" class="form-control" id="penerbitSertifikat" name="penerbit_sertifikat"
                            placeholder="Masukkan penerbit sertifikat">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="fileSertifikat" class="form-label">File Sertifikat</label>
                        <input type="file" class="form-control" id="fileSertifikat" name="file_sertifikat">
                    </div>
                    <input id="tipeSertifikasiInput" type="hidden" name="tipe" value="0">
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Sertifikasi -->
<div id="modalSertifikasi" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="sertifikatClose">&times;</span>
        </div>
        <h2>Edit Sertifikasi</h2>
        <div class="form-container">
            <form id="formEditSertifikasi" action="" method="post">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="judulSertifikat" class="form-label">Judul Sertifikat</label>
                        <input type="text" class="form-control" id="judulSertifikatEdit" name="judul_sertifikat"
                            placeholder="Masukkan judul sertifikat">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="noSertifikat" class="form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control" id="noSertifikat" name="no_sertifikat"
                            placeholder="Masukkan nomor sertifikat">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="tanggalTerbitSertifikat" class="form-label">Tanggal Terbit Sertifikat</label>
                        <input type="date" class="form-control" id="tanggalTerbitSertifikat"
                            name="tanggal_terbit_sertifikat" placeholder="Masukkan tanggal terbit sertifikat">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="penerbitSertifikat" class="form-label">Penerbit Sertifikat</label>
                        <input type="text" class="form-control" id="penerbitSertifikat" name="penerbit_sertifikat"
                            placeholder="Masukkan penerbit sertifikat">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="fileSertifikat" class="form-label">File Sertifikat</label>
                        <input type="file" class="form-control" id="fileSertifikat" name="file_sertifikat">
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
<div id="modalDelete" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="sertifikatClose">&times;</span>
        </div>
        <h2>Hapus Sertifikasi</h2>
        <div class="form-container">
            <p>Apakah Anda yakin ingin menghapus sertifikasi ini?</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <form id="formDeleteSertifikasi" action="" method="post">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-submit">Ya</button>
                </form>
                <button class="btn btn-cancel">Tidak</button>
            </div>
        </div>
    </div>
</div>

<script>
let modalSertifikasi = document.getElementById("modalSertifikasi");
let modalTambahSertifikasi = document.getElementById("modalTambahSertifikasi");
let modalDeleteSertifikasi = document.getElementById("modalDelete");
let titleModalSertifikasi = document.getElementById("titleModalSertifikasi");
let tipeSertifikasiInput = document.getElementById("tipeSertifikasiInput");
let btnTambahSertifikasiAwal = document.getElementById("btnTambahSertifikasiAwal");
let btnTambahSertifikasiAkhir = document.getElementById("btnTambahSertifikasiAkhir");
let spanCloseModalTambah = document.getElementsByClassName("sertifikatClose")[0];
let spanCloseModalSertifikasi = document.getElementsByClassName("sertifikatClose")[1];
let spanCloseModalDelete = document.getElementsByClassName("sertifikatClose")[2];

// Fungsi untuk membuka modal edit/hapus
function hapusSertifikasi(action) {
    modalDeleteSertifikasi.style.display = "block";
    document.getElementById("formDeleteSertifikasi").action = action;
}

function editSertifikasi(action, judul) {
    modalSertifikasi.style.display = "block";
    document.getElementById("formEditSertifikasi").action = action;
    document.getElementById("judulSertifikatEdit").value = judul;
}

// Fungsi untuk membuka modal tambah
btnTambahSertifikasiAwal.onclick = function() {
    modalTambahSertifikasi.style.display = "block";
    titleModalSertifikasi.innerHTML = "Tambah Sertifikasi Awal";
    tipeSertifikasiInput.value = "0";
};

btnTambahSertifikasiAkhir.onclick = function() {
    modalTambahSertifikasi.style.display = "block";
    titleModalSertifikasi.innerHTML = "Tambah Sertifikasi Akhir";
    tipeSertifikasiInput.value = "1";
};

// Tutup modal saat klik tombol 'x'
spanCloseModalSertifikasi.onclick = function() {
    console.log('close');
    modalSertifikasi.style.display = "none";
};

spanCloseModalTambah.onclick = function() {
    modalTambahSertifikasi.style.display = "none";
};

spanCloseModalDelete.onclick = function() {
    modalDeleteSertifikasi.style.display = "none";
};

// Tutup modal saat klik di luar modal
window.onclick = function(event) {
    if (event.target == modalSertifikasi) {
        modalSertifikasi.style.display = "none";
    }
    if (event.target == modalTambahSertifikasi) {
        modalTambahSertifikasi.style.display = "none";
    }
    if (event.target == modalDeleteSertifikasi) {
        modalDeleteSertifikasi.style.display = "none";
    }
};
</script>