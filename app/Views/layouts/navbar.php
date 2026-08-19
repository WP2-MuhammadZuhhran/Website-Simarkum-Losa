<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Menu Kiri -->
    <ul class="navbar-nav">

        <li class="nav-item">

            <a class="nav-link"
               data-widget="pushmenu"
               href="#"
               role="button">

                <i class="fas fa-bars"></i>

            </a>

        </li>

        <li class="nav-item d-none d-sm-inline-block">

            <span class="nav-link font-weight-bold">

                <?= esc($title ?? 'SIMARKUM') ?>

            </span>

        </li>

    </ul>

    <!-- Menu Kanan -->
    <ul class="navbar-nav ml-auto">

        <!-- Fullscreen -->
        <li class="nav-item">

            <a class="nav-link"
               data-widget="fullscreen"
               href="#"
               role="button">

                <i class="fas fa-expand-arrows-alt"></i>

            </a>

        </li>

        <!-- Dropdown User -->
        <li class="nav-item dropdown">

            <a class="nav-link"
               data-toggle="dropdown"
               href="#">

                <i class="fas fa-user-circle"></i>

                <span class="ml-1">

                    <?= session()->get('nama'); ?>

                </span>

            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <div class="dropdown-header">

                    <strong>

                        <?= session()->get('nama'); ?>

                    </strong>

                    <br>

                    <small>

                        <?= ucfirst(session()->get('role')); ?>

                    </small>

                </div>

                <div class="dropdown-divider"></div>

               <a href="<?= base_url('profile') ?>" class="dropdown-item">

                    <i class="fas fa-user mr-2"></i>

                    Profil

                </a>

                <div class="dropdown-divider"></div>

                <a href="<?= base_url('logout') ?>" class="dropdown-item">

                    <i class="fas fa-sign-out-alt mr-2"></i>

                    Logout

                </a>

            </div>

        </li>

    </ul>

</nav>