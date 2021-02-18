<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PDM Pusdatin</div>
    </a>
    <?php if (in_groups('admin')) : ?>
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/index'); ?>">
                <i class="fas fa-fw fa-code"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider my-0">
        <div class="sidebar-heading">
            Data Master
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pddikti/index'); ?>">
                <i class="fas fa-fw fa-file"></i>
                <span>Data Pddikti</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('siakad/index'); ?>">
                <i class="fas fa-fw fa-file"></i>
                <span>Data Siakad</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Heading -->
        <div class="sidebar-heading">
            Users Management
        </div>
        <!-- Nav Item - Operator List -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/operator'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Operators List</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/mahasiswa'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Mahasiswa List</span></a>
        </li>

    <?php endif; ?>

    <?php if (in_groups('mahasiswa')) : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('cekdata'); ?>">
                <i class="fas fa-fw fa-user-edit"></i>
                <span>Cek Data</span></a>
        </li>
    <?php endif; ?>
    <?php if (in_groups('admin')) : ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Pengajuan
        </div>

        <!-- Nav Item - Charts -->

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pengajuan'); ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Daftar Pengajuan</span></a>
        </li>
    <?php endif; ?>


    <?php if (in_groups('mahasiswa')) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Pengajuan
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pdm'); ?>">
                <i class="fas fa-fw fa-user-edit"></i>
                <span>Ajukan Perubahan Data</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('riwayatpdm'); ?>">
                <i class="far fa-clock"></i>
                <span>Riwayat Perubahan Data</span></a>
        </li>
    <?php endif; ?>
    <?php if (in_groups('operator')) : ?>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/index'); ?>">
                <i class="fas fa-fw fa-code"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Pengajuan
        </div>

        <!-- Nav Item - Charts -->

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pengajuan'); ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Daftar Pengajuan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pdm'); ?>">
                <i class="fas fa-fw fa-user-edit"></i>
                <span>Ajukan Perubahan Data</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('riwayatpdm'); ?>">
                <i class="far fa-clock"></i>
                <span>Riwayat Perubahan Data</span></a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>