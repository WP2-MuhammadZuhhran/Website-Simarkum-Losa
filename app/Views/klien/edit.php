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

        Edit

    </li>

</ol>

<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="card-header bg-primary">
    <h3 class="card-title">
        <i class="fas fa-user-edit"></i>
        Form Edit Klien
    </h3>
</div>
    <div class="card-body">

        <form action="<?= base_url('klien/update/'.$klien['id_klien']) ?>" method="post">

            <div class="form-group">
                <label>Nama</label>
                <input type="text"class="form-control"name="nama_klien"placeholder="Masukkan nama klien"value="<?= $klien['nama_klien'] ?>">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"><?= $klien['alamat'] ?></textarea>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="<?= $klien['no_hp'] ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?= $klien['email'] ?>">
            </div>

           <button type="submit" class="btn btn-primary">
    <i class="fas fa-save"></i> Update
</button>

<a href="<?= base_url('klien') ?>" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Kembali
</a>
        </form>

    </div>
</div>
<div class="card mb-0">

<?= $this->endSection() ?>