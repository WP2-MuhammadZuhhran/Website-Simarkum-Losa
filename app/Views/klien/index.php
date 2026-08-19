<?= $this->extend('layouts/main') ?>
<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">
        <a href="<?= base_url('dashboard') ?>">
            Dashboard
        </a>
    </li>

    <li class="breadcrumb-item active">
        Data Klien
    </li>

</ol>

<?= $this->endSection() ?>
<?= $this->section('content') ?>
<script>
setTimeout(function () {
    $('.alert').fadeOut('slow');
}, 3000);
</script>
<?php if(session()->getFlashdata('success')): ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">

    <?= session()->getFlashdata('success'); ?>

    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>

</div>

<?php endif; ?>
<div class="card">

   <div class="card-header bg-">

    <h3 class="card-title">

        <i class="fas fa-users"></i>

        Data Klien

    </h3>

    <div class="card-tools">

<?php if(session()->get('role') == 'staf'): ?>

    <a href="<?= base_url('klien/tambah') ?>" class="btn btn-light btn-sm">

        <i class="fas fa-plus"></i>

        Tambah Klien

    </a>

<?php endif; ?>

</div>
    <div class="card-body">

        <table id="tabelKlien" class="table table-bordered table-hover">

            <thead class="bg-primary text-center">

                <tr>

                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Status</th>
                    <?php if(session()->get('role') == 'staf'): ?>

<th width="15%">Aksi</th>

<?php endif; ?>
                </tr>

            </thead>

            <tbody>

                <?php
                $no = 1;
                foreach($klien as $k):
                ?>

                <tr>

                    <td class="text-center"><?= $no++ ?></td>

                    <td><?= esc($k['nama_klien']) ?></td>

                    <td><?= esc($k['alamat']) ?></td>

                    <td><?= esc($k['no_hp']) ?></td>

                    <td><?= esc($k['email']) ?></td>

                    <td class="text-center">

<?php if($k['status_penghapusan']=='aktif'): ?>

<span class="badge badge-success">

Aktif

</span>

<?php else: ?>

<span class="badge badge-warning">

Menunggu Persetujuan

</span>

<?php endif; ?>

</td>

                    <?php if(session()->get('role') == 'staf'): ?>

<td class="text-center">

    <?php if($k['status_penghapusan']=='aktif'): ?>

<a href="<?= base_url('klien/edit/'.$k['id_klien']) ?>" class="btn btn-warning btn-sm">

<i class="fas fa-edit"></i>

</a>

<a href="<?= base_url('klien/hapus/'.$k['id_klien']) ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin menghapus data ini?')">

<i class="fas fa-trash"></i>

</a>

<?php endif; ?>

</td>

<?php endif; ?>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>


<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>

<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>

<script>

$(function(){

    $('#tabelKlien').DataTable({

        responsive:true,

        autoWidth:false,

        language:{

            url:"//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"

        }

    });

});

</script>

<?= $this->endSection() ?>
