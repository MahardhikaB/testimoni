<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">Daftar <?= $tipeTitle; ?> Menunggu Verifikasi</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Perusahaan</th>
                    <th>Destinasi</th>
                    <th>Tahun</th>
                    <th>Produk Ekspor</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($verifikasiData) && is_array($verifikasiData)): ?>
                <?php foreach ($verifikasiData as $index => $item): ?>
                <tr>
                    <td class="align-middle"><?= $index + 1; ?></td>
                    <td class="align-middle"><?= esc($item['nama_perusahaan']); ?></td>
                    <td class="align-middle"><?= esc($item['destinasi_ekspor']); ?></td>
                    <td class="align-middle"><?= esc($item['tahun_ekspor']); ?></td>
                    <td class="align-middle"><?= esc($item['produk_ekspor']); ?></td>
                    <td class="align-middle">
                        <a href="<?= base_url('/admin/dashboard/verifikasi/update/' . $item['id_ekspor'] . '/accepted'); ?>"
                            class="btn btn-success btn-sm">Terima</a>
                        <a href="<?= base_url('/admin/dashboard/verifikasi/update/' . $item['id_ekspor'] . '/rejected'); ?>"
                            class="btn btn-danger btn-sm">Tolak</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada
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