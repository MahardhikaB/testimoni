<!--begin::Sidebar-->
<?php 
    // dd($section);
?>
<aside class="app-sidebar bg-body-primary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link--> <a href="" class="brand-link">
            <!--begin::Brand Image--> <img src="/img/logo.png" alt="Logo Fernandes Raymond.id"
                class="brand-image opacity-75 shadow">
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="/admin/dashboard"
                        class="nav-link <?= ($section == 'dashboard' ? 'active' : '') ?>"> <i
                            class="nav-icon bi bi-list-task"></i>
                        <p>Dashboard</p>
                    </a> </li>
                <li
                    class="nav-item <?= ($user['mainSection'] == 'verifikasi' ? 'menu-open' : ($user['mainSection'] == 'member' ? 'menu-open' : '')) ?>">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>
                            Member
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="/admin/member/list"
                                class="nav-link <?= ($section == 'list-member' ? 'active' : '') ?>">
                                <i class="nav-icon bi bi-people
                                            "></i>
                                <p>List Member</p>
                            </a> </li>

                        <li class="nav-item <?= ($user['mainSection'] == 'verifikasi' ? 'menu-open' : '') ?>">
                            <a href="#"
                                class="nav-link <?= ($user['mainSection'] == 'verifikasi' ? 'text-white' : '') ?>">
                                <i
                                    class="nav-icon bi bi-check2-square <?= ($user['mainSection'] == 'verifikasi' ? 'text-active' : '') ?>"></i>
                                <p>Verifikasi
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="/admin/member/verifikasi/legalitas"
                                        class="nav-link <?= ($section == 'legalitas' ? 'active' : '') ?>">
                                        <i class="nav-icon bi bi-check2-square"></i>
                                        <p>Verifikasi Legalitas</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="/admin/member/verifikasi/produk"
                                        class="nav-link <?= ($section == 'produk' ? 'active' : '') ?>">
                                        <i class="nav-icon bi bi-check2-square"></i>
                                        <p>Verifikasi Produk</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="/admin/member/verifikasi/sertifikat"
                                        class="nav-link <?= ($section == 'sertifikat' ? 'active' : '') ?>">
                                        <i class="nav-icon bi bi-check2-square"></i>
                                        <p>Verifikasi Sertifikat</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="/admin/member/verifikasi/pengalaman-pameran"
                                        class="nav-link <?= ($section == 'pengalaman-pameran' ? 'active' : '') ?>">
                                        <i class="nav-icon bi bi-check2-square"></i>
                                        <p>Verifikasi Pameran</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="/admin/member/verifikasi/pengalaman-ekspor"
                                        class="nav-link <?= ($section == 'pengalaman-ekspor' ? 'active' : '') ?>">
                                        <i class="nav-icon bi bi-check2-square"></i>
                                        <p>Verifikasi Ekspor</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="/admin/member/verifikasi/media-promosi"
                                        class="nav-link <?= ($section == 'media-promosi' ? 'active' : '') ?>">
                                        <i class="nav-icon bi bi-check2-square"></i>
                                        <p>Verifikasi Media Promosi</p>
                                    </a> </li>
                                <li class="nav-item"> <a href="/admin/member/verifikasi/program-pembinaan"
                                        class="nav-link <?= ($section == 'program-pembinaan' ? 'active' : '') ?>">
                                        <i class="nav-icon bi bi-check2-square"></i>
                                        <p>Verifikasi Pembinaan</p>
                                    </a> </li>
                            </ul>
                        </li>

                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->