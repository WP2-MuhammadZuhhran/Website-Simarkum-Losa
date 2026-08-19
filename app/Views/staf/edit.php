<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">
        <a href="<?= base_url('dashboard') ?>">Dashboard</a>
    </li>

    <li class="breadcrumb-item">
        <a href="<?= base_url('staf') ?>">Data Staf</a>
    </li>

    <li class="breadcrumb-item active">
        Edit Staf
    </li>

</ol>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card card-warning">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-user-edit"></i>

            Edit Data Staf

        </h3>

    </div>

    <form action="<?= base_url('staf/update/'.$staf['id_staf']) ?>" method="post">

        <?= csrf_field() ?>

        <div class="card-body">

            <div class="form-group">

                <label>Nama</label>

                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    value="<?= esc($staf['nama']) ?>"
                    required>

            </div>

            <div class="form-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    value="<?= esc($staf['username']) ?>"
                    required>

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="<?= esc($staf['email']) ?>"
                    required>

            </div>

            <div class="form-group">

                <label>No HP</label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control"
                    value="<?= esc($staf['no_hp']) ?>"
                    required>

            </div>

            <div class="form-group">

                <label>Password Baru</label>

                <input
                    type="password"
                    name="password"
                    class="form-control">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti password.
                </small>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-warning">

                <i class="fas fa-save"></i>

                Update

            </button>

            <a href="<?= base_url('staf') ?>" class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Kembali

            </a>

        </div>

    </form>

</div>

<?= $this->endSection() ?>