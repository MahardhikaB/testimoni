<div class="content-container">
    <!-- Pengalaman Ekspor -->
    <div class="before-content content-result-container">
        <div class="add-data">
            <h4>Pencapaian Ekspor</h4>
            <button id="btnTambahEkspor">Tambah Pencapaian Ekspor</button>
        </div>
        <?php if (!empty($ekspor)): ?>
            <?php foreach ($ekspor as $eksporItem): ?>
                <div class="content-result-card">
                    <b style="color: #ffc107;">
                        <?= $eksporItem['status_verifikasi'] === 'pending' ? 'Sedang diverifikasi' : '' ?>
                    </b>
                    <div class="content-result-info">
                        <div class="row">
                            <div class="col">
                                <p><strong>Destinasi Ekspor: </strong> <?= esc($eksporItem['negara_tujuan']); ?></p>
                            </div>
                            <div class="col">
                                <p><strong>Kuantitas: </strong> <?= esc($eksporItem['kuantitas']) ?> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><strong>Nilai: </strong> <?= esc($eksporItem['nilai']) ?> </p>
                            </div>
                            <div class="col">
                                <p><strong>Tanggal Ekspor:</strong> <?= esc($eksporItem['tanggal']); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><strong>Produk:</strong> <?= esc($eksporItem['produk_ekspor']); ?></p>
                            </div>
                            <div class="col">
                                <p><strong>Deskripsi:</strong> <?= esc($eksporItem['deskripsi_ekspor']); ?></p>
                            </div>
                        </div>
                        <div>
                            <button class="btnEdit"
                                onclick="editEkspor('<?= base_url('/user/ekspor/update/') . $eksporItem['id_ekspor'] ?>', '<?= $eksporItem['negara_tujuan'] ?>', '<?= $eksporItem['tanggal'] ?>', '<?= $eksporItem['produk_ekspor'] ?>', '<?= $eksporItem['deskripsi_ekspor'] ?>', '<?= $eksporItem['kuantitas'] ?>', '<?= $eksporItem['nilai'] ?>')"
                                title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button class="btnHapus"
                                onclick="hapusEkspor('<?= base_url('/user/ekspor/delete/') . $eksporItem['id_ekspor'] ?>')"
                                title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <!-- show files with i frame-->
                    <div class="content-result-file">
                        <iframe src="<?= base_url('storage/' . $eksporItem['bukti_ekspor']) ?>"
                            width="100%" height="300px"></iframe>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="margin-top: 1rem;">Belum ada pencapaian ekspor yang ditambahkan.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Tambah Ekspor -->
<div id="modalTambahEkspor" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="eksporClose">&times;</span>
        </div>
        <h2 id="titleModalEkspor">Tambah Pencapaian Ekspor</h2>
        <div class="form-container">
            <form action="<?= base_url('/user/ekspor/store/') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="negaraTujuan" class="form-label">Negara Tujuan</label>
                        <input type="text" class="form-control" id="negaraTujuan" name="negara_tujuan"
                            placeholder="Masukkan negara tujuan">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="tanggalEkspor" class="form-label">Tanggal Ekspor</label>
                        <input type="date" class="form-control" id="tanggalEkspor" name="tanggal"
                            placeholder="Masukkan tanggal ekspor">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="produkEkspor" class="form-label">Produk Ekspor</label>
                        <input type="text" class="form-control" id="produkEkspor" name="produk_ekspor"
                            placeholder="Masukkan produk ekspor">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="deskripsiEkspor" class="form-label">Deskripsi Ekspor</label>
                        <input type="text" class="form-control" id="deskripsiEkspor" name="deskripsi_ekspor"
                            placeholder="Masukkan deskripsi ekspor">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="kuantitas" class="form-label">Kuantitas</label>
                        <input type="text" class="form-control" id="kuantitas" name="kuantitas"
                            placeholder="Masukkan kuantitas">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="nilai" class="form-label">Nilai</label>
                        <input type="text" class="form-control" id="nilai" name="nilai"
                            placeholder="Masukkan nilai">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="fileEkspor" class="form-label">File Bukti Ekspor</label>
                        <input type="file" class="form-control" id="fileEkspor" name="bukti_ekspor">
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Ekspor -->
<div id="modalEditEkspor" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="eksporClose">&times;</span>
        </div>
        <h2>Edit Pencapaian Ekspor</h2>
        <div class="form-container">
            <form id="formEditEkspor" action="" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="col-md-6 mx-auto input-container">
                    <div class="mb-3 input-group">
                        <label for="negaraTujuanEdit" class="form-label">Negara Tujuan</label>
                        <input type="text" class="form-control" id="negaraTujuanEdit" name="negara_tujuan"
                            placeholder="Masukkan negara tujuan">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="tanggalEksporEdit" class="form-label">Tanggal Ekspor</label>
                        <input type="date" class="form-control" id="tanggalEksporEdit" name="tanggal"
                            placeholder="Masukkan tanggal ekspor">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="produkEksporEdit" class="form-label">Produk Ekspor</label>
                        <input type="text" class="form-control" id="produkEksporEdit" name="produk_ekspor"
                            placeholder="Masukkan produk ekspor">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="deskripsiEksporEdit" class="form-label">Deskripsi Ekspor</label>
                        <input type="text" class="form-control" id="deskripsiEksporEdit" name="deskripsi_ekspor"
                            placeholder="Masukkan deskripsi ekspor">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="kuantitasEdit" class="form-label">Kuantitas</label>
                        <input type="text" class="form-control" id="kuantitasEdit" name="kuantitas"
                            placeholder="Masukkan kuantitas">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="nilaiEdit" class="form-label">Nilai</label>
                        <input type="text" class="form-control" id="nilaiEdit" name="nilai"
                            placeholder="Masukkan nilai">
                    </div>
                    <div class="mb-3 input-group">
                        <label for="fileEksporEdit" class="form-label">File Bukti Ekspor</label>
                        <input type="file" class="form-control" id="fileEksporEdit" name="bukti_ekspor">
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
<div id="modalDeleteEkspor" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="eksporClose">&times;</span>
        </div>
        <h2>Hapus Pencapaian Ekspor</h2>
        <div class="form-container">
            <p>Apakah Anda yakin ingin menghapus pencapaian ekspor ini?</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <form id="formDeleteEkspor" action="" method="post">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-submit">Ya</button>
                </form>
                <button class="btn btn-cancel">Tidak</button>
            </div>
        </div>
    </div>
</div>

<script>
    let modalTambahEkspor = document.getElementById("modalTambahEkspor");
    let modalEditEkspor = document.getElementById("modalEditEkspor");
    let modalDeleteEkspor = document.getElementById("modalDeleteEkspor");
    let titleModalEkspor = document.getElementById("titleModalEkspor");
    let btnTambahEkspor = document.getElementById("btnTambahEkspor");
    let spanCloseModalTambahEkspor = document.getElementsByClassName("eksporClose")[0];
    let spanCloseModalEditEkspor = document.getElementsByClassName("eksporClose")[1];
    let spanCloseModalDeleteEkspor = document.getElementsByClassName("eksporClose")[2];

    // Fungsi untuk membuka modal edit/hapus
    function hapusEkspor(action) {
        modalDeleteEkspor.style.display = "block";
        document.getElementById("formDeleteEkspor").action = action;
    }

    function editEkspor(action, negara, tanggal, produk, deskripsi, kuantitas, nilai) {
        modalEditEkspor.style.display = "block";
        document.getElementById("formEditEkspor").action = action;
        document.getElementById("negaraTujuanEdit").value = negara;
        document.getElementById("tanggalEksporEdit").value = tanggal;
        document.getElementById("produkEksporEdit").value = produk;
        document.getElementById("deskripsiEksporEdit").value = deskripsi;
        document.getElementById("kuantitasEdit").value = kuantitas;
        document.getElementById("nilaiEdit").value = nilai;
    }

    // Fungsi untuk membuka modal tambah
    btnTambahEkspor.onclick = function () {
        console.log("tambah");
        modalTambahEkspor.style.display = "block";
        titleModalEkspor.innerHTML = "Tambah Pengalaman Ekspor";
    };

    // Tutup modal saat klik tombol 'x'
    spanCloseModalTambahEkspor.onclick = function () {
        modalTambahEkspor.style.display = "none";
    };

    spanCloseModalEditEkspor.onclick = function () {
        modalEditEkspor.style.display = "none";
    };

    spanCloseModalDeleteEkspor.onclick = function () {
        modalDeleteEkspor.style.display = "none";
    };

    // Tutup modal saat klik di luar modal
    window.onclick = function (event) {
        if (event.target == modalTambahEkspor) {
            modalTambahEkspor.style.display = "none";
        }
        if (event.target == modalEditEkspor) {
            modalEditEkspor.style.display = "none";
        }
        if (event.target == modalDeleteEkspor) {
            modalDeleteEkspor.style.display = "none";
        }
    };
</script>