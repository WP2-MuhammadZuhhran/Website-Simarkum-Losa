<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">
        <a href="<?= base_url('dashboard') ?>">Dashboard</a>
    </li>

    <li class="breadcrumb-item">
        <a href="<?= base_url('arsip') ?>">Data Arsip</a>
    </li>

    <li class="breadcrumb-item active">
        Tambah Arsip
    </li>

</ol>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-folder-plus"></i>

            Tambah Arsip

        </h3>

    </div>

    <form action="<?= base_url('arsip/simpan') ?>"
          method="post"
          enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="card-body">

            <!-- Klien -->
            <div class="form-group">

                <label>Klien</label>

                <select name="id_klien" class="form-control" required>

                    <option value="">-- Pilih Klien --</option>

                    <?php foreach($klien as $k): ?>

                        <option value="<?= $k['id_klien'] ?>">

                            <?= esc($k['nama_klien']) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- Staf -->
            <div class="form-group">

    <label>Nomor Perkara</label>

    <input type="text"
           name="nomor_perkara"
           class="form-control"
           placeholder="Contoh: 123/Pdt.G/2025/PN.Mdn"
           required>

</div>
            <!-- Judul -->
            <div class="form-group">

                <label>Judul Arsip</label>

                <input type="text"
                       name="judul_arsip"
                       class="form-control"
                       required>

            </div>

            <!-- Jenis Perkara -->
            <div class="form-group">

                <label>Jenis Perkara</label>

                <input type="text"
                       name="jenis_perkara"
                       class="form-control"
                       required>

            </div>

            <!-- Tanggal -->
            <div class="form-group">

                <label>Tanggal</label>

                <input type="date"
                       name="tanggal"
                       class="form-control"
                       required>

            </div>

            <!-- Upload File -->
            <div class="form-group">

                <label>Upload Arsip</label>

                <input type="file"
                       name="file_dokumen"
                       class="form-control"
                       accept=".pdf,.doc,.docx"
                       required>

                <small class="text-muted">

                    Format: PDF, DOC, DOCX

                </small>

            </div>

            <!-- Keterangan -->
            <div class="form-group">

                <label>Keterangan</label>

                <textarea
                    name="keterangan"
                    rows="4"
                    class="form-control"></textarea>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-primary">

                <i class="fas fa-save"></i>

                Simpan

            </button>

            <a href="<?= base_url('arsip') ?>"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Kembali

            </a>

        </div>

    </form>

</div>

<?= $this->endSection() ?>