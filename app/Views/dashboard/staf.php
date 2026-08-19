<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>

.card-dashboard{
    min-height:130px;
}

</style>

<div class="card">

    <div class="card-body">

        <div class="row">

            <div class="col-md-8">

                <h2>

                    Selamat Datang,
                    <?= session()->get('nama') ?> 👋

                </h2>

                <p class="text-muted">

                    Sistem Manajemen Arsip Hukum (SIMARKUM)

                    <br>

                    Law Office Syamsul Arif & Partners

                </p>

            </div>

            <div class="col-md-4 text-right">

                <h5 id="hari"></h5>

                <h4 id="tanggal"></h4>

                <h2 id="jam"></h2>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <!-- Total Klien -->
    <div class="col-lg-4 col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $total_klien ?></h3>
                <p>Total Klien Saya</p>
            </div>

            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
        </div>
    </div>

    <!-- Total Arsip -->
    <div class="col-lg-4 col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $total_arsip ?></h3>
                <p>Total Arsip Saya</p>
            </div>

            <div class="icon">
                <i class="fas fa-folder-open"></i>
            </div>
        </div>
    </div>

    <!-- Menunggu Persetujuan -->
    <div class="col-lg-4 col-md-12">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $pending_arsip + $pending_klien ?></h3>

                <p>Menunggu Persetujuan</p>

                <small>
                    Arsip : <?= $pending_arsip ?>
                    &nbsp; | &nbsp;
                    Klien : <?= $pending_klien ?>
                </small>
            </div>

            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <!-- Quick Menu -->

    <div class="col-md-8">

        <div class="card card-success">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-bolt"></i>

                    Menu Cepat

                </h3>

            </div>

            <div class="card-body">

                <a href="<?= base_url('arsip/tambah') ?>"
                   class="btn btn-primary mr-2 mb-2">

                    <i class="fas fa-folder-plus"></i>

                    Tambah Arsip

                </a>

                <a href="<?= base_url('klien/tambah') ?>"
                   class="btn btn-success mr-2 mb-2">

                    <i class="fas fa-user-plus"></i>

                    Tambah Klien

                </a>

            </div>

        </div>

    </div>

    <!-- Informasi Pengguna -->

    <div class="col-md-4">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    Informasi Pengguna

                </h3>

            </div>

            <div class="card-body">

                <table class="table table-borderless">

                    <tr>

                        <th>Nama</th>

                        <td><?= session()->get('nama') ?></td>

                    </tr>

                    <tr>

                        <th>Username</th>

                        <td><?= session()->get('username') ?></td>

                    </tr>

                    <tr>

                        <th>Role</th>

                        <td>Staf</td>

                    </tr>

                    <tr>

                        <th>Status</th>

                        <td>

                            <span class="badge badge-success">

                                Online

                            </span>

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-folder"></i>

            Arsip Terbaru Saya

        </h3>

    </div>

    <div class="card-body table-responsive p-0">

        <table class="table table-hover text-nowrap">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nomor Perkara</th>
                    <th>Judul Arsip</th>
                    <th>Klien</th>
                    <th>Tanggal</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

            <?php if(empty($arsip_terbaru)): ?>

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada data arsip.

                    </td>

                </tr>

            <?php else: ?>

                <?php $no=1; foreach($arsip_terbaru as $a): ?>

                <tr>

                    <td><?= $no++ ?></td>

                    <td><?= esc($a['nomor_perkara']) ?></td>

                    <td><?= esc($a['judul_arsip']) ?></td>

                    <td><?= esc($a['nama_klien']) ?></td>

                    <td><?= date('d-m-Y', strtotime($a['tanggal'])) ?></td>

                    <td>

<?php if($a['status_penghapusan'] == 'aktif'): ?>

    <span class="badge badge-success">
        Aktif
    </span>

<?php elseif($a['status_penghapusan'] == 'pending'): ?>

    <span class="badge badge-warning">
        Menunggu Persetujuan
    </span>

<?php endif; ?>

</td>

                </tr>

                <?php endforeach; ?>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->section('scripts') ?>

<script>

function updateJam(){

const sekarang = new Date();

const hari = [
"Minggu",
"Senin",
"Selasa",
"Rabu",
"Kamis",
"Jumat",
"Sabtu"
];

const bulan = [
"Januari",
"Februari",
"Maret",
"April",
"Mei",
"Juni",
"Juli",
"Agustus",
"September",
"Oktober",
"November",
"Desember"
];

document.getElementById("hari").innerHTML =
hari[sekarang.getDay()];

document.getElementById("tanggal").innerHTML =
sekarang.getDate()+" "+
bulan[sekarang.getMonth()]+" "+
sekarang.getFullYear();

document.getElementById("jam").innerHTML =
sekarang.toLocaleTimeString('id-ID');

}

setInterval(updateJam,1000);

updateJam();

</script>

<?= $this->endSection() ?>

<?= $this->endSection() ?>