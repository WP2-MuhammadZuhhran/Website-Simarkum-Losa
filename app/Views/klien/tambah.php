<?= $this->extend('layouts/main') ?>
<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">
        <a href="<?= base_url('dashboard') ?>">
            Dashboard
        </a>
    </li>

    <li class="breadcrumb-item">
        <a href="<?= base_url('klien') ?>">
            Data Klien
        </a>
    </li>

    <li class="breadcrumb-item active">
        Tambah Klien
    </li>

</ol>

<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-user-plus"></i>
            Tambah Data Klien

        </h3>

    </div>

    <form action="<?= base_url('klien/simpan') ?>" method="post">

        <?= csrf_field(); ?>

        <div class="card-body">

            <!-- Nama -->
            <div class="form-group">

                <label>Nama Klien</label>

                <input
                    type="text"
                    name="nama_klien"
                    class="form-control <?= session()->getFlashdata('errors')['nama_klien'] ?? false ? 'is-invalid' : '' ?>"
                    value="<?= old('nama_klien') ?>"
                    placeholder="Masukkan nama klien">

                <?php if(session()->getFlashdata('errors')['nama'] ?? false): ?>

                    <div class="invalid-feedback">

                        <?= session()->getFlashdata('errors')['nama']; ?>

                    </div>

                <?php endif; ?>

            </div>

            <!-- Alamat -->
            <div class="form-group">

                <label>Alamat</label>

                <textarea
                    name="alamat"
                    rows="4"
                    class="form-control <?= session()->getFlashdata('errors')['alamat'] ?? false ? 'is-invalid' : '' ?>"
                    placeholder="Masukkan alamat"><?= old('alamat') ?></textarea>

                <?php if(session()->getFlashdata('errors')['alamat'] ?? false): ?>

                    <div class="invalid-feedback">

                        <?= session()->getFlashdata('errors')['alamat']; ?>

                    </div>

                <?php endif; ?>

            </div>

            <!-- Nomor HP -->
            <div class="form-group">

                <label>No HP</label>

                <input
                    type="text"
                    name="no_hp"
                    class="form-control <?= session()->getFlashdata('errors')['no_hp'] ?? false ? 'is-invalid' : '' ?>"
                    value="<?= old('no_hp') ?>"
                    placeholder="08xxxxxxxxxx">

                <?php if(session()->getFlashdata('errors')['no_hp'] ?? false): ?>

                    <div class="invalid-feedback">

                        <?= session()->getFlashdata('errors')['no_hp']; ?>

                    </div>

                <?php endif; ?>

            </div>

            <!-- Email -->
            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control <?= session()->getFlashdata('errors')['email'] ?? false ? 'is-invalid' : '' ?>"
                    value="<?= old('email') ?>"
                    placeholder="email@gmail.com">

                <?php if(session()->getFlashdata('errors')['email'] ?? false): ?>

                    <div class="invalid-feedback">

                        <?= session()->getFlashdata('errors')['email']; ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit" class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan

            </button>

            <a href="<?= base_url('klien') ?>" class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

        </div>

    </form>

</div>

<?= $this->endSection() ?>