<?= $this->extend('/admin/templates/layout') ?>
<?= $this->section('content') ?>

<?php 
    // dd($users);
?>

<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Member</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">Member</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
                <div class="app-content">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body p-0">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">No.</th>
                                                    <th>Nama Member</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Jenis Perusahaan</th>
                                                    <th>Alamat</th>
                                                    <th>Pelatihan Mulai</th>
                                                    <th>Pelatihan Selesai</th>
                                                    <th style="width: 40px">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no = 1;
                                                    foreach ($users as $user) : 
                                                ?>
                                                <tr class="hover:bg-slate-50">
                                                    <td class="align-middle">
                                                        <p><?= $no++; ?></p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p>
                                                            <?= $user['nama_user']; ?></p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p>
                                                            <?= $user['nama_perusahaan'] ?></p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p>
                                                            <?= $user['jenis_perusahaan'] ?></p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p><?= $user['alamat'] ?></p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p>
                                                            <?= $user['pelatihan_mulai'] ?></p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="">
                                                            <?= $user['pelatihan_selesai'] ?></p>
                                                    </td>
                                                    <td class="flex flex-col">
                                                        <a class="text-decoration-none btn mt-2 btn-primary"
                                                            href="/admin/member/<?= $user['user_id']; ?>">Detail</a>
                                                        <a class="text-decoration-none btn mt-2 btn-warning"
                                                            href="/admin/member/edit/<?= $user['user_id']; ?>">Edit</a>
                                                        <a class="text-decoration-none btn mt-2 mb-2 btn-danger"
                                                            href="/admin/member/delete/<?= $user['user_id']; ?>">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
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
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->

<?= $this->endSection('content') ?>