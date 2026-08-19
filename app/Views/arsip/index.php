<?= $this->extend('layouts/main') ?>

<?= $this->section('breadcrumb') ?>

<ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item">
        <a href="<?= base_url('dashboard') ?>">
            Dashboard
        </a>
    </li>

    <li class="breadcrumb-item active">
        Data Arsip
    </li>

</ol>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if(session()->getFlashdata('success')): ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">

    <?= session()->getFlashdata('success') ?>

    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>

</div>

<script>
setTimeout(function(){
    $('.alert').alert('close');
},3000);
</script>

<?php endif; ?>

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-folder-open"></i>
            Data Arsip

        </h3>

        <div class="card-tools">

           <?php if(session()->get('role') == 'staf'): ?>

<a href="<?= base_url('arsip/tambah') ?>" class="btn btn-primary btn-sm">

    <i class="fas fa-plus"></i>

    Tambah Arsip

</a>

<?php endif; ?>

        </div>

    </div>

    <div class="card-body">

        <table id="tabelArsip" class="table table-bordered table-hover">

            <thead class="bg-primary text-center">

<tr>

    <th>No</th>

    <th>Nomor Perkara</th>

    <th>Judul Arsip</th>

    <th>Klien</th>

    <th>Staf</th>

    <th>Jenis Perkara</th>

    <th>Tanggal</th>

    <th>Status</th>

   <?php if(session()->get('role') == 'staf'): ?>
        <th>File</th>
    <?php endif; ?>

    <th>Aksi</th>

</tr>

</thead>
            <tbody>

<?php
$no=1;
foreach($arsip as $a):
?>

<tr>

    <td class="text-center"><?= $no++ ?></td>

    <td><?= esc($a['nomor_perkara']) ?></td>

    <td><?= esc($a['judul_arsip']) ?></td>

    <td><?= esc($a['nama_klien']) ?></td>

    <td><?= esc($a['nama_staf']) ?></td>

    <td><?= esc($a['jenis_perkara']) ?></td>

    <td><?= date('d-m-Y', strtotime($a['tanggal'])) ?></td>

    <td class="text-center">

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
    

<?php if(session()->get('role') == 'staf'): ?>

<td class="text-center">

    <?php if(!empty($a['file_dokumen'])): ?>

        <a href="<?= base_url('uploads/arsip/'.$a['file_dokumen']) ?>"
           target="_blank"
           class="btn btn-info btn-sm">

            <i class="fas fa-file-pdf"></i>
            Lihat

        </a>

    <?php else: ?>

        <span class="badge badge-secondary">
            Tidak Ada
        </span>

    <?php endif; ?>

</td>

<?php endif; ?>

   <td>

<!-- Detail selalu muncul -->

<a href="<?= base_url('arsip/detail/'.$a['id_arsip']) ?>"
class="btn btn-info btn-sm">

<i class="fas fa-eye"></i>

</a>

<?php if(session()->get('role')=='staf' && $a['status_penghapusan']=='aktif'): ?>

<a href="<?= base_url('arsip/edit/'.$a['id_arsip']) ?>"
class="btn btn-warning btn-sm">

<i class="fas fa-edit"></i>

</a>

<a href="<?= base_url('arsip/hapus/'.$a['id_arsip']) ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin menghapus data ini?')">

<i class="fas fa-trash"></i>

</a>

<?php endif; ?>

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

    $('#tabelArsip').DataTable({

        responsive:true,

        autoWidth:false,

        language:{
            url:"//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
        }

    });

});

</script>

<?= $this->endSection() ?>