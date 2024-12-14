<?= $this->extend('/admin/templates/layout') ?>
<?= $this->section('content') ?>

<?php 
    // dd($verifikasiData);
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
                    <h3 class="mb-0">Verifikasi <?= $tipeTitle; ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item">Verifikasi</li>
                        <li class="breadcrumb-item active"><?= $tipeTitle; ?></li>
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
                    <?php
                        if ($section == 'legalitas'){
                            echo view('admin/member/verifikasi/legalitas', ['section' => $section]);
                        } elseif ($section == 'produk'){
                            echo view('admin/member/verifikasi/produk', ['section' => $section]);
                        } elseif ($section == 'sertifikat'){
                            echo view('admin/member/verifikasi/sertifikat', ['section' => $section]);
                        } elseif ($section == 'pengalaman-pameran'){
                            echo view('admin/member/verifikasi/pameran', ['section' => $section]);
                        } elseif ($section == 'pengalaman-ekspor'){
                            echo view('admin/member/verifikasi/ekspor', ['section' => $section]);
                        } elseif ($section == 'media-promosi'){
                            echo view('admin/member/verifikasi/media', ['section' => $section]);
                        } elseif ($section == 'program-pembinaan'){
                            echo view('admin/member/verifikasi/pembinaan', ['section' => $section]);
                        } elseif ($section == 'verifikasi-user'){
                            echo view('admin/member/verifikasi/akun', ['section' => $section]);
                        }
                    ?>
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