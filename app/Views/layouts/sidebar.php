<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link text-center">

        <i class="fas fa-balance-scale fa-2x"></i>

        <span class="brand-text font-weight-bold ml-2">
            SIMARKUM
        </span>

    </a>

    <div class="sidebar">

        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">

                <img src="<?= base_url('assets/dist/img/user2-160x160.jpg') ?>"
                     class="img-circle elevation-2"
                     alt="User Image">

            </div>

            <div class="info">

                <a href="#" class="d-block">

                    <?= session()->get('nama'); ?>

                </a>

                <small class="text-white">

                    <?= ucfirst(session()->get('role')); ?>

                </small>

            </div>

        </div>

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <!-- Dashboard -->

                <li class="nav-item">

                    <a href="<?= base_url('dashboard') ?>" class="nav-link">

                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p>Dashboard</p>

                    </a>

                </li>

                <!-- MASTER DATA -->

                <li class="nav-header">

                    MASTER DATA

                </li>

                <?php if(session()->get('role') == 'pimpinan'): ?>

                <li class="nav-item">

                    <a href="<?= base_url('staf') ?>" class="nav-link">

                        <i class="nav-icon fas fa-users"></i>

                        <p>Data Staf</p>

                    </a>

                </li>

                <?php endif; ?>

                <li class="nav-item">

                    <a href="<?= base_url('klien') ?>" class="nav-link">

                        <i class="nav-icon fas fa-user-tie"></i>

                        <p>Data Klien</p>

                    </a>

                </li>

                <!-- Arsip -->

                <li class="nav-header">

                    MANAJEMEN ARSIP

                </li>

                <li class="nav-item">

                    <a href="<?= base_url('arsip') ?>" class="nav-link">

                        <i class="nav-icon fas fa-folder-open"></i>

                        <p>Data Arsip</p>

                    </a>

                </li>


                <?php if(session()->get('role') == 'pimpinan'): ?>

                <li class="nav-item">

                    <a href="<?= base_url('approval') ?>" class="nav-link">

                        <i class="nav-icon fas fa-user-check"></i>

                        <p>Persetujuan Penghapusan</p>

                    </a>

                </li>

                <?php endif; ?>
                <!-- Laporan -->

             

                <li class="nav-header">

                    LAPORAN

                </li>

                <li class="nav-item">

                    <a href="<?= base_url('laporan') ?>" class="nav-link">

                        <i class="nav-icon fas fa-chart-bar"></i>

                        <p>Data Laporan</p>

                    </a>

                </li>

          

                <!-- Akun -->

                <li class="nav-header">

                    AKUN

                </li>

                <li class="nav-item">

                    <a href="<?= base_url('profile') ?>" class="nav-link">

                        <i class="nav-icon fas fa-user-circle"></i>

                        <p>Profil</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="<?= base_url('logout') ?>" class="nav-link">

                        <i class="nav-icon fas fa-sign-out-alt"></i>

                        <p>Logout</p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>