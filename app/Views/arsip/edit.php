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
        Edit Arsip
    </li>

</ol>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card card-warning">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-edit"></i>

            Edit Arsip

        </h3>

    </div>

    <form action="<?= base_url('arsip/update/'.$arsip['id_arsip']) ?>"
          method="post"
          enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="card-body">

            <!-- Klien -->
            <div class="form-group">

                <label>Klien</label>

                <select name="id_klien" class="form-control" required>

                    <?php foreach($klien as $k): ?>

                        <option value="<?= $k['id_klien'] ?>"
                            <?= ($k['id_klien']==$arsip['id_klien']) ? 'selected' : '' ?>>

                            <?= esc($k['nama_klien']) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- Staf -->
            <div class="form-group">

                <label>Staf</label>

                <select name="id_staf" class="form-control" required>

                    <?php foreach($staf as $s): ?>

                        <option value="<?= $s['id_staf'] ?>"
                            <?= ($s['id_staf']==$arsip['id_staf']) ? 'selected' : '' ?>>

                            <?= esc($s['nama']) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- Nomor Perkara -->
            <div class="form-group">

                <label>Nomor Perkara</label>

                <input type="text"
                       name="nomor_perkara"
                       class="form-control"
                       value="<?= esc($arsip['nomor_perkara']) ?>"
                       required>

            </div>

            <!-- Judul Arsip -->
            <div class="form-group">

                <label>Judul Arsip</label>

                <input type="text"
                       name="judul_arsip"
                       class="form-control"
                       value="<?= esc($arsip['judul_arsip']) ?>"
                       required>

            </div>

            <!-- Jenis Perkara -->
            <div class="form-group">

                <label>Jenis Perkara</label>

                <input type="text"
                       name="jenis_perkara"
                       class="form-control"
                       value="<?= esc($arsip['jenis_perkara']) ?>"
                       required>

            </div>

            <!-- Tanggal -->
            <div class="form-group">

                <label>Tanggal</label>

                <input type="date"
                       name="tanggal"
                       class="form-control"
                       value="<?= $arsip['tanggal'] ?>"
                       required>

            </div>

            <!-- Dokumen Lama -->
            <div class="form-group">

                <label>Dokumen Saat Ini</label>
                <br>

                <?php if(!empty($arsip['file_dokumen'])): ?>

                    <a href="<?= base_url('uploads/arsip/'.$arsip['file_dokumen']) ?>"
                       target="_blank"
                       class="btn btn-info btn-sm">

                        <i class="fas fa-file-alt"></i>

                        Lihat Dokumen

                    </a>

                <?php else: ?>

                    <span class="badge badge-secondary">

                        Tidak ada dokumen

                    </span>

                <?php endif; ?>

            </div>

            <!-- Upload Dokumen Baru -->
            <div class="form-group">

                <label>Upload Dokumen Baru</label>

                <input type="file"
                       name="file_dokumen"
                       class="form-control"
                       accept=".pdf,.doc,.docx">

                <small class="text-muted">

                    Kosongkan jika tidak ingin mengganti dokumen.

                </small>

            </div>

            <!-- Keterangan -->
            <div class="form-group">

                <label>Keterangan</label>

                <textarea
                    name="keterangan"
                    rows="4"
                    class="form-control"><?= esc($arsip['keterangan']) ?></textarea>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit" class="btn btn-warning">

                <i class="fas fa-save"></i>

                Simpan Perubahan

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