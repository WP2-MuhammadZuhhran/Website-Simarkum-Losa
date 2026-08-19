<?= $this->extend('layouts/main') ?>
<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">
        <a href="<?= base_url('dashboard') ?>">
            Dashboard
        </a>
    </li>

    <li class="breadcrumb-item active">
        Data Staf
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

        Data Staf

    </h3>

    <div class="card-tools">

        <div class="card-tools">

           <a href="<?= base_url('staf/tambah') ?>" class="btn btn-light btn-sm">

    <i class="fas fa-plus-circle"></i>

    Tambah Staf

</a>

        </div>

    </div>

    <div class="card-body">

        <table id="tabelKlien" class="table table-bordered table-hover">

           <thead class="bg-primary text-center">

<tr>

    <th width="5%">No</th>

    <th>Nama</th>

    <th>Username</th>

    <th>Email</th>

    <th>No HP</th>

    <th width="15%">Aksi</th>

</tr>

</thead>

           <tbody>

<?php
$no = 1;
foreach($staf as $s):
?>

<tr>

    <td class="text-center"><?= $no++ ?></td>

    <td><?= esc($s['nama']) ?></td>

    <td><?= esc($s['username']) ?></td>

    <td><?= esc($s['email']) ?></td>

    <td><?= esc($s['no_hp']) ?></td>

    <td class="text-center">

        <a href="<?= base_url('staf/edit/'.$s['id_staf']) ?>"
           class="btn btn-warning btn-sm">

            <i class="fas fa-edit"></i>

        </a>

        <a href="<?= base_url('staf/hapus/'.$s['id_staf']) ?>"
           class="btn btn-danger btn-sm">

            <i class="fas fa-trash"></i>

        </a>

    </td>

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
