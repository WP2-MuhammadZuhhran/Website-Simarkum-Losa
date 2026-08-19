<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">
        <a href="<?= base_url('dashboard') ?>">Dashboard</a>
    </li>

    <li class="breadcrumb-item active">
        Profil Saya
    </li>

</ol>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-user-circle"></i>

                    Profil Pengguna

                </h3>

            </div>

            <form action="<?= base_url('profile/update') ?>" method="post">

                <?= csrf_field() ?>

                <div class="card-body">

                    <?php if(session()->getFlashdata('success')): ?>

                        <div class="alert alert-success">

                            <?= session()->getFlashdata('success') ?>

                        </div>

                    <?php endif; ?>

                    <div class="form-group">

                        <label>Nama</label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            value="<?= esc($user['nama']) ?>"
                            required>

                    </div>

                    <div class="form-group">

                    <label>Username</label>

                        <input type="text"
                        name="username"
                        class="form-control"
                        value="<?= old('username',$user['username']) ?>">

                    </div>
                    <div class="form-group">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="<?= esc($user['email']) ?>"
                            required>

                    </div>

                    <div class="form-group">

                        <label>No HP</label>

                        <input
                            type="text"
                            name="no_hp"
                            class="form-control"
                            value="<?= esc($user['no_hp']) ?>"
                            required>

                    </div>

                    <hr>

                    <h5>Ganti Password</h5>

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti password.
                    </small>

                    <div class="form-group mt-2">

                        <label>Password Baru</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Konfirmasi Password</label>

                        <input
                            type="password"
                            name="konfirmasi_password"
                            class="form-control">

                    </div>

                </div>

                <div class="card-footer text-right">

                    <button class="btn btn-primary">

                        <i class="fas fa-save"></i>

                        Update Profil

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>