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
        Detail Arsip
    </li>

</ol>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-folder-open"></i>

            Detail Arsip

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="30%">Nomor Perkara</th>
                <td><?= esc($arsip['nomor_perkara']) ?></td>
            </tr>

            <tr>
                <th>Judul Arsip</th>
                <td><?= esc($arsip['judul_arsip']) ?></td>
            </tr>

            <tr>
                <th>Nama Klien</th>
                <td><?= esc($arsip['nama_klien']) ?></td>
            </tr>

            <tr>
                <th>Nama Staf</th>
                <td><?= esc($arsip['nama_staf']) ?></td>
            </tr>

            <tr>
                <th>Jenis Perkara</th>
                <td><?= esc($arsip['jenis_perkara']) ?></td>
            </tr>

            <tr>
                <th>Tanggal Arsip</th>
                <td><?= date('d-m-Y', strtotime($arsip['tanggal'])) ?></td>
            </tr>

            <tr>
                <th>Keterangan</th>
                <td><?= nl2br(esc($arsip['keterangan'])) ?></td>
            </tr>

            <?php if(session()->get('role') == 'staf'): ?>

<tr>

    <th>Dokumen</th>

    <td>

        <a href="<?= base_url('uploads/arsip/'.$arsip['file_dokumen']) ?>"
           target="_blank"
           class="btn btn-sm btn-primary">

            <i class="fas fa-file-pdf"></i>

            <?= esc($arsip['file_dokumen']) ?>

        </a>

    </td>

</tr>

<?php endif; ?>

        </table>

        <hr>

<h5>

    <i class="fas fa-file-pdf text-danger"></i>

    Preview Dokumen

</h5>

<?php

$ext = pathinfo($arsip['file_dokumen'], PATHINFO_EXTENSION);

?>

<?php if(strtolower($ext) == 'pdf'): ?>

<iframe
    src="<?= base_url('uploads/arsip/'.$arsip['file_dokumen']) ?>#toolbar=0&navpanes=0&scrollbar=0"
    width="100%"
    height="700"
    style="border:1px solid #ccc;border-radius:5px;">
</iframe>

<?php else: ?>

<div class="alert alert-warning">

    Preview hanya tersedia untuk file PDF.

</div>

<?php endif; ?>
    </div>

    <div class="card-footer">


       <?php if(session()->get('role') == 'staf'): ?>

<a href="<?= base_url('uploads/'.$arsip['file_dokumen']) ?>"
   class="btn btn-success">

    <i class="fas fa-download"></i>

    Download Dokumen

</a>

<?php endif; ?>

        <a href="<?= base_url('arsip') ?>"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Kembali

        </a>

    </div>

</div>

<?= $this->endSection() ?>