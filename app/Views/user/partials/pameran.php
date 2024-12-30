<div class="content-container">
    <!-- Pengalaman Pameran -->
    <div class="before-content content-result-container">
        <div class="add-data">
            <h4>Pengalaman Pameran</h4>
            <button id="btnTambahPameran">Tambah Pengalaman Pameran</button>
        </div>
        <?php if (!empty($pameran)): ?>
            <?php foreach ($pameran as $pameranItem): ?>
                <div class="content-result-card">
                    <b style="color: #ffc107;">
                        <?= $pameranItem['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
                    </b>
                    <div class="content-result-info">
                        <div class="row">
                            <div class="col">
                                <p><strong>Nama Pameran: </strong> <?= esc($pameranItem['nama_pameran']); ?></p>
                            </div>
                            <div class="col">
                                <p><strong>Tanggal: </strong> <?= esc($pameranItem['tanggal_pameran']) ?> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><strong>Lokasi: </strong> <?= esc($pameranItem['lokasi_pameran']) ?> </p>
                            </div>
                            <div class="col">
                                <p><strong>Deskripsi:</strong> <?= esc($pameranItem['deskripsi_pameran']); ?></p>
                            </div>
                        </div>
                        <div>
                            <button class="btnEdit"
                                onclick="editPameran('<?= base_url('/user/pameran/update/') . $pameranItem['id_pameran'] ?>', '<?= $pameranItem['nama_pameran'] ?>', '<?= $pameranItem['tanggal_pameran'] ?>', '<?= $pameranItem['lokasi_pameran'] ?>', '<?= $pameranItem['deskripsi_pameran'] ?>')"
                                title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button class="btnHapus"
                                onclick="hapusPameran('<?= base_url('/user/pameran/delete/') . $pameranItem['id_pameran'] ?>')"
                                title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="margin-top: 1rem;">Belum ada pengalaman pameran yang ditambahkan.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Tambah Pameran -->
<div id="modalTambahPameran" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="pameranClose">&times;</span>
        </div>
        <h2 id="titleModalPameran">Tambah Pengalaman Pameran</h2>
        <div class="form-container">
            <form action="<?= base_url('/user/pameran/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="namaPameran" class="form-label">Nama Pameran</label>
                        <input type="text" class="form-control" id="namaPameran" name="nama_pameran"
                            placeholder="Masukkan nama pameran">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="tanggalPameran" class="form-label">Tanggal Pameran</label>
                        <input type="date" class="form-control" id="tanggalPameran" name="tanggal_pameran"
                            placeholder="Masukkan tanggal pameran">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="lokasiPameran" class="form-label">Lokasi Pameran</label>
                        <input type="text" class="form-control" id="lokasiPameran" name="lokasi_pameran"
                            placeholder="Masukkan lokasi pameran">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="deskripsiPameran" class="form-label">Deskripsi Pameran</label>
                        <input type="text" class="form-control" id="deskripsiPameran" name="deskripsi_pameran"
                            placeholder="Masukkan deskripsi pameran">
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Pameran -->
<div id="modalEditPameran" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="pameranClose">&times;</span>
        </div>
        <h2>Edit Pengalaman Pameran</h2>
        <div class="form-container">
            <form id="formEditPameran" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="namaPameranEdit" class="form-label">Nama Pameran</label>
                        <input type="text" class="form-control" id="namaPameranEdit" name="nama_pameran"
                            placeholder="Masukkan nama pameran">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="tanggalPameranEdit" class="form-label">Tanggal Pameran</label>
                        <input type="date" class="form-control" id="tanggalPameranEdit" name="tanggal_pameran"
                            placeholder="Masukkan tanggal pameran">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="lokasiPameranEdit" class="form-label">Lokasi Pameran</label>
                        <input type="text" class="form-control" id="lokasiPameranEdit" name="lokasi_pameran"
                            placeholder="Masukkan lokasi pameran">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="deskripsiPameranEdit" class="form-label">Deskripsi Pameran</label>
                        <input type="text" class="form-control" id="deskripsiPameranEdit" name="deskripsi_pameran"
                            placeholder="Masukkan deskripsi pameran">
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
<div id="modalDeletePameran" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="pameranClose">&times;</span>
        </div>
        <h2>Hapus Pengalaman Pameran</h2>
        <div class="form-container">
            <p>Apakah Anda yakin ingin menghapus pengalaman pameran ini?</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <form id="formDeletePameran" action="" method="post">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-submit">Ya</button>
                </form>
                <button class="btn btn-cancel">Tidak</button>
            </div>
        </div>
    </div>
</div>

<script>
    let modalTambahPameran = document.getElementById("modalTambahPameran");
    let modalEditPameran = document.getElementById("modalEditPameran");
    let modalDeletePameran = document.getElementById("modalDeletePameran");
    let titleModalPameran = document.getElementById("titleModalPameran");
    let btnTambahPameran = document.getElementById("btnTambahPameran");
    let spanCloseModalTambahPameran = document.getElementsByClassName("pameranClose")[0];
    let spanCloseModalEditPameran = document.getElementsByClassName("pameranClose")[1];
    let spanCloseModalDeletePameran = document.getElementsByClassName("pameranClose")[2];

    // Fungsi untuk membuka modal edit/hapus
    function hapusPameran(action) {
        modalDeletePameran.style.display = "block";
        document.getElementById("formDeletePameran").action = action;
    }

    function editPameran(action, nama, tanggal, lokasi, deskripsi) {
        modalEditPameran.style.display = "block";
        document.getElementById("formEditPameran").action = action;
        document.getElementById("namaPameranEdit").value = nama;
        document.getElementById("tanggalPameranEdit").value = tanggal;
        document.getElementById("lokasiPameranEdit").value = lokasi;
        document.getElementById("deskripsiPameranEdit").value = deskripsi;
    }

    // Fungsi untuk membuka modal tambah
    btnTambahPameran.onclick = function () {
        modalTambahPameran.style.display = "block";
    }

    // Fungsi untuk menutup modal ketika user mengklik tombol 'x'
    spanCloseModalTambahPameran.onclick = function () {
        modalTambahPameran.style.display = "none";
    }

    spanCloseModalEditPameran.onclick = function () {
        modalEditPameran.style.display = "none";
    }

    spanCloseModalDeletePameran.onclick = function () {
        modalDeletePameran.style.display = "none";
    }

    // Fungsi untuk menutup modal ketika user mengklik di luar modal
    window.onclick = function (event) {
        if (event.target == modalTambahPameran) {
            modalTambahPameran.style.display = "none";
        }
        if (event.target == modalEditPameran) {
            modalEditPameran.style.display = "none";
        }
        if (event.target == modalDeletePameran) {
            modalDeletePameran.style.display = "none";
        }
    }
</script>