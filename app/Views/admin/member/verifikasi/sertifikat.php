<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">Daftar <?= $section; ?> Menunggu Verifikasi</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Member</th>
                    <th>Nama Perusahaan</th>
                    <th>Judul Sertifikat</th>
                    <th>Nomor Sertifikat</th>
                    <th>Tanggal Terbit</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($verifikasiData) && is_array($verifikasiData)): ?>
                <?php foreach ($verifikasiData as $index => $item): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= esc($item['nama_user']); ?></td>
                    <td><?= esc($item['nama_perusahaan']); ?></td>
                    <td><?= esc($item['judul_sertifikat']); ?></td>
                    <td><?= esc($item['no_sertifikat']); ?></td>
                    <td><?= esc($item['tanggal_terbit_sertifikat']); ?></td>
                    <td><?= esc($item['penerbit_sertifikat']); ?></td>
                    <td>
                        <a href="<?= base_url('/admin/dashboard/verifikasi/update/' . $item['id_sertifikat'] . '/accepted'); ?>"
                            class="btn btn-success btn-sm">Terima</a>
                        <a href="<?= base_url('/admin/dashboard/verifikasi/update/' . $item['id_sertifikat'] . '/rejected'); ?>"
                            class="btn btn-danger btn-sm">Tolak</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Tidak ada
                        <?php  
                            if(strlen($section) > 10) {
                                $section = explode("-", $section);
                                echo implode(" ", $section);
                            } else {
                                echo $section;
                            }
                        ?> yang menunggu
                        verifikasi.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div> <!-- /.card-body -->
</div> <!-- /.card -->