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
                                onclick="editSertifikasi('<?= base_url('/user/sertifikasi/update/') . $sertifikatItem['id_sertifikat'] ?>', '<?= $sertifikatItem['judul_sertifikat'] ?>')"
                                title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button class="btnHapus"
                                onclick="hapusSertifikasi('<?= base_url('/user/sertifikasi/delete/') . $sertifikatItem['id_sertifikat'] ?>')"
                                title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
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
                                onclick="editSertifikasi('<?= base_url('/user/sertifikasi/update/') . $sertifikatItem['id_sertifikat'] ?>', '<?= $sertifikatItem['judul_sertifikat'] ?>')"
                                title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button class="btnHapus"
                                onclick="hapusSertifikasi('<?= base_url('/user/sertifikasi/delete/') . $sertifikatItem['id_sertifikat'] ?>')"
                                title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="margin-top: 1rem;">Belum ada sertifikasi akhir yang ditambahkan.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Tambah Sertifikasi -->
<div id="modalTambahSertifikasi" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <h2 id="titleModalSertifikasi">Tambah Sertifikasi</h2>
        <div class="form-container">
            <form action="<?= base_url('user/sertifikat/store/') ?>" method="post">
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
                        <input type="date" class="form-control" id="tanggalTerbitSertifikat" name="tanggal_terbit_sertifikat"
                            placeholder="Masukkan tanggal terbit sertifikat">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="penerbitSertifikat" class="form-label">Penerbit Sertifikat</label>
                        <input type="text" class="form-control" id="penerbitSertifikat" name="penerbit_sertifikat"
                            placeholder="Masukkan penerbit sertifikat">
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
            <span class="close">&times;</span>
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
                        <input type="date" class="form-control" id="tanggalTerbitSertifikat" name="tanggal_terbit_sertifikat"
                            placeholder="Masukkan tanggal terbit sertifikat">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="penerbitSertifikat" class="form-label">Penerbit Sertifikat</label>
                        <input type="text" class="form-control" id="penerbitSertifikat" name="penerbit_sertifikat"
                            placeholder="Masukkan penerbit sertifikat">
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let modalSertifikasi = document.getElementById("modalSertifikasi");
    let modalTambahSertifikasi = document.getElementById("modalTambahSertifikasi");
    let titleModalSertifikasi = document.getElementById("titleModalSertifikasi");
    let tipeSertifikasiInput = document.getElementById("tipeSertifikasiInput");
    let btnTambahSertifikasiAwal = document.getElementById("btnTambahSertifikasiAwal");
    let btnTambahSertifikasiAkhir = document.getElementById("btnTambahSertifikasiAkhir");
    let spanCloseModalSertifikasi = modalSertifikasi.querySelector(".close");
    let spanCloseModalTambah = modalTambahSertifikasi.querySelector(".close");

    // Fungsi untuk membuka modal edit/hapus
    function hapusSertifikasi(action) {
        modalSertifikasi.style.display = "block";
        document.getElementById("formEditSertifikasi").action = action;
    }

    function editSertifikasi(action, judul) {
        modalSertifikasi.style.display = "block";
        document.getElementById("formEditSertifikasi").action = action;
        document.getElementById("judulSertifikatEdit").value = judul;
    }

    // Fungsi untuk membuka modal tambah
    btnTambahSertifikasiAwal.onclick = function () {
        modalTambahSertifikasi.style.display = "block";
        titleModalSertifikasi.innerHTML = "Tambah Sertifikasi Awal";
        tipeSertifikasiInput.value = "0";
    };

    btnTambahSertifikasiAkhir.onclick = function () {
        modalTambahSertifikasi.style.display = "block";
        titleModalSertifikasi.innerHTML = "Tambah Sertifikasi Akhir";
        tipeSertifikasiInput.value = "1";
    };

    // Tutup modal saat klik tombol 'x'
    spanCloseModalSertifikasi.onclick = function () {
        modalSertifikasi.style.display = "none";
    };

    spanCloseModalTambah.onclick = function () {
        modalTambahSertifikasi.style.display = "none";
    };

    // Tutup modal saat klik di luar modal
    window.onclick = function (event) {
        if (event.target == modalSertifikasi) {
            modalSertifikasi.style.display = "none";
        }
        if (event.target == modalTambahSertifikasi) {
            modalTambahSertifikasi.style.display = "none";
        }
    };
</script>