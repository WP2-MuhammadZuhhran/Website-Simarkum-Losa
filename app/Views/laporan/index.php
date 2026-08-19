<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">
        <a href="<?= base_url('dashboard') ?>">Dashboard</a>
    </li>

    <li class="breadcrumb-item active">
        Laporan Arsip
    </li>

</ol>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-file-alt"></i>

            Laporan Arsip

        </h3>

    </div>

    <div class="card-body">

        <form method="get" action="<?= base_url('laporan') ?>">

            <div class="row">

               <div class="col-md-4">

    <label>Tanggal</label>

    <input
        type="date"
        name="tanggal"
        class="form-control"
        value="<?= service('request')->getGet('tanggal') ?>">

</div>


                <div class="col-md-4">

    <label>Jenis Perkara</label>

    <input
        type="text"
        name="jenis_perkara"
        class="form-control"
        placeholder="Jenis perkara"
        value="<?= service('request')->getGet('jenis_perkara') ?>">

</div>

            </div>

            <br>

            <button class="btn btn-primary">

                <i class="fas fa-search"></i>

                Tampilkan

            </button>

            <a href="<?= base_url('laporan') ?>" class="btn btn-secondary">

                Reset

            </a>

        </form>

        <hr>

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="bg-primary text-center">

                <tr>

                    <th>No</th>

                    <th>Nomor Perkara</th>

                    <th>Judul Arsip</th>

                    <th>Klien</th>

                    <th>Staf</th>

                    <th>Jenis Perkara</th>

                    <th>Tanggal</th>

                </tr>

                </thead>

                <tbody>

                <?php
                $no = 1;
                foreach($arsip as $a):
                ?>

                <tr>

                    <td><?= $no++ ?></td>

                    <td><?= esc($a['nomor_perkara']) ?></td>

                    <td><?= esc($a['judul_arsip']) ?></td>

                    <td><?= esc($a['nama_klien']) ?></td>

                    <td><?= esc($a['nama']) ?></td>

                    <td><?= esc($a['jenis_perkara']) ?></td>

                    <td><?= date('d-m-Y', strtotime($a['tanggal'])) ?></td>

                </tr>

                <?php endforeach; ?>

                </tbody>

            </table>
            
            <div class="mt-3">

                <a href="<?= base_url('laporan/cetak?tanggal='.service('request')->getGet('tanggal').'&jenis_perkara='.service('request')->getGet('jenis_perkara')) ?>"
                target="_blank"
                class="btn btn-danger">

                 <i class="fas fa-file-pdf"></i>
                    Cetak PDF

        </a>

                <?php if(session()->get('role') == 'pimpinan'): ?>

            <a href="<?= base_url('laporan/excel?tanggal='.service('request')->getGet('tanggal').'&jenis_perkara='.service('request')->getGet('jenis_perkara')) ?>"
                class="btn btn-success">

                <i class="fas fa-file-excel"></i>
                 Export Excel

            </a>

<?php endif; ?>

            </div>
                    
        </div>

    </div>

</div>

<?= $this->endSection() ?>