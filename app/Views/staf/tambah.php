<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">
        <a href="<?= base_url('dashboard') ?>">
            Dashboard
        </a>
    </li>

    <li class="breadcrumb-item">
        <a href="<?= base_url('staf') ?>">
            Data Staf
        </a>
    </li>

    <li class="breadcrumb-item active">
        Tambah Staf
    </li>

</ol>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-user-plus"></i>
            Tambah Data Staf

        </h3>

    </div>

    <form action="<?= base_url('staf/simpan') ?>" method="post">

        <?= csrf_field() ?>

        <div class="card-body">

            <!-- Nama -->
            <div class="form-group">

                <label>Nama Staf</label>

                <input
                    type="text"
                    name="nama"
                    value="<?= old('nama') ?>"
                    class="form-control <?= session('errors.nama') ? 'is-invalid' : '' ?>"
                    placeholder="Masukkan nama staf">

                <?php if(session('errors.nama')) : ?>

                    <div class="invalid-feedback">

                        <?= session('errors.nama') ?>

                    </div>

                <?php endif; ?>

            </div>

            <!-- Username -->
            <div class="form-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    value="<?= old('username') ?>"
                    class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>"
                    placeholder="Masukkan username">

                <?php if(session('errors.username')) : ?>

                    <div class="invalid-feedback">

                        <?= session('errors.username') ?>

                    </div>

                <?php endif; ?>

            </div>

            <!-- Email -->
            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="<?= old('email') ?>"
                    class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
                    placeholder="contoh@email.com">

                <?php if(session('errors.email')) : ?>

                    <div class="invalid-feedback">

                        <?= session('errors.email') ?>

                    </div>

                <?php endif; ?>

            </div>

            <!-- Nomor HP -->
            <div class="form-group">

                <label>No HP</label>

                <input
                    type="text"
                    name="no_hp"
                    value="<?= old('no_hp') ?>"
                    class="form-control <?= session('errors.no_hp') ? 'is-invalid' : '' ?>"
                    placeholder="08xxxxxxxxxx">

                <?php if(session('errors.no_hp')) : ?>

                    <div class="invalid-feedback">

                        <?= session('errors.no_hp') ?>

                    </div>

                <?php endif; ?>

            </div>

            <!-- Password -->
            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>"
                    placeholder="Masukkan password">

                <?php if(session('errors.password')) : ?>

                    <div class="invalid-feedback">

                        <?= session('errors.password') ?>

                    </div>

                <?php endif; ?>

            </div>

            <!-- Konfirmasi Password -->
            <div class="form-group">

                <label>Konfirmasi Password</label>

                <input
                    type="password"
                    name="konfirmasi_password"
                    class="form-control <?= session('errors.konfirmasi_password') ? 'is-invalid' : '' ?>"
                    placeholder="Ulangi password">

                <?php if(session('errors.konfirmasi_password')) : ?>

                    <div class="invalid-feedback">

                        <?= session('errors.konfirmasi_password') ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit" class="btn btn-primary">

                <i class="fas fa-save"></i>

                Simpan

            </button>

            <a href="<?= base_url('staf') ?>" class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Kembali

            </a>

        </div>

    </form>

</div>

<?= $this->endSection() ?>