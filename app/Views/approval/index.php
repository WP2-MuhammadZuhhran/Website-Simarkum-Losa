<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">
        <a href="<?= base_url('dashboard') ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
        Persetujuan Penghapusan
    </li>
</ol>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if(session()->getFlashdata('success')): ?>

<div class="alert alert-success">

    <?= session()->getFlashdata('success') ?>

</div>

<?php endif; ?>

<!-- ========================= -->
<!-- PERSETUJUAN ARSIP -->
<!-- ========================= -->

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-folder-open"></i>

            Permintaan Penghapusan Arsip

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="bg-primary text-center">

                <tr>

                    <th>No</th>

                    <th>Nomor Perkara</th>

                    <th>Judul Arsip</th>

                    <th>Klien</th>

                    <th>Staf</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php $no=1; ?>

            <?php foreach($arsip as $a): ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= esc($a['nomor_perkara']) ?></td>

                <td><?= esc($a['judul_arsip']) ?></td>

                <td><?= esc($a['nama_klien']) ?></td>

                <td><?= esc($a['nama']) ?></td>

                <td class="text-center">

                    <a href="<?= base_url('approval/setujuiArsip/'.$a['id_arsip']) ?>"
                       class="btn btn-success btn-sm"
                       onclick="return confirm('Setujui penghapusan arsip ini?')">

                        <i class="fas fa-check"></i>

                    </a>

                    <a href="<?= base_url('approval/tolakArsip/'.$a['id_arsip']) ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Tolak penghapusan arsip ini?')">

                        <i class="fas fa-times"></i>

                    </a>

                </td>

            </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<br>

<!-- ========================= -->
<!-- PERSETUJUAN KLIEN -->
<!-- ========================= -->

<div class="card card-info">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-user-tie"></i>

            Permintaan Penghapusan Klien

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="bg-info text-center">

                <tr>

                    <th>No</th>

                    <th>Nama Klien</th>

                    <th>Email</th>

                    <th>Staf</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php $no=1; ?>

            <?php foreach($klien as $k): ?>

            <tr>

                <td><?= $no++ ?></td>

                <td><?= esc($k['nama_klien']) ?></td>

                <td><?= esc($k['email']) ?></td>

                <td><?= esc($k['nama']) ?></td>

                <td class="text-center">

                    <a href="<?= base_url('approval/setujuiKlien/'.$k['id_klien']) ?>"
                       class="btn btn-success btn-sm"
                       onclick="return confirm('Setujui penghapusan klien ini?')">

                        <i class="fas fa-check"></i>

                    </a>

                    <a href="<?= base_url('approval/tolakKlien/'.$k['id_klien']) ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Tolak penghapusan klien ini?')">

                        <i class="fas fa-times"></i>

                    </a>

                </td>

            </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->endSection() ?>