<!--begin::Sidebar-->
<?php 
    // dd($user['section']);
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
                        class="nav-link <?= ($user['section'] == 'dashboard' ? 'active' : '') ?>"> <i
                            class="nav-icon bi bi-list-task"></i>
                        <p>Dashboard</p>
                    </a> </li>
                <li class="nav-item"> <a href="#"
                        class="nav-link <?= ($user['section'] == 'member-detail' ? 'active' : ($user['section'] == 'member-verifikasi' ? 'active' : '')) ?>">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>
                            Member
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="/admin/member/detail"
                                class="nav-link <?= ($user['section'] == 'member-detail' ? 'active' : '') ?>"> <i class="nav-icon bi bi-people
                                            "></i>
                                <p>Detail Member</p>
                            </a> </li>
                        <li class="nav-item"> <a href="/admin/member/verifikasi"
                                class="nav-link <?= ($user['section'] == 'member-verifikasi' ? 'active' : '') ?>"> <i
                                    class="nav-icon bi bi-check2-square"></i>
                                <p>Verifikasi Pembaruan</p>
                            </a> </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->