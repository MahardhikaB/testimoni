<?= $this->extend('/admin/templates/layout') ?>
<?= $this->section('content') ?>

<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Verifikasi Sertifikat</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Verifikasi</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Sertifikat Menunggu Verifikasi</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Judul Sertifikat</th>
                                        <th>Nomor Sertifikat</th>
                                        <th>User ID</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Penerbit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($sertifikat) && is_array($sertifikat)): ?>
                                        <?php foreach ($sertifikat as $index => $item): ?>
                                            <tr>
                                                <td><?= $index + 1; ?></td>
                                                <td><?= esc($item['judul_sertifikat']); ?></td>
                                                <td><?= esc($item['no_sertifikat']); ?></td>
                                                <td><?= esc($item['user_id_sertifikat']); ?></td>
                                                <td><?= esc($item['tanggal_terbit_sertifikat']); ?></td>
                                                <td><?= esc($item['penerbit_sertifikat']); ?></td>
                                                <td>
                                                <a href="<?= base_url('/admin/dashboard/verifikasi/update/' . $item['id_sertifikat'] . '/accepted'); ?>" class="btn btn-success btn-sm">Terima</a>
                                                <a href="<?= base_url('/admin/dashboard/verifikasi/update/' . $item['id_sertifikat'] . '/rejected'); ?>" class="btn btn-danger btn-sm">Tolak</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada sertifikat yang menunggu verifikasi.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->

<?= $this->endSection('content') ?>
