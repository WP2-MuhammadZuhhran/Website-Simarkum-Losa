<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
.card-grafik{
    min-height:390px;
}

#chartArsip{
    height:300px !important;
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

                    Law Office Syamsul Arif and Partners

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
<div class="container-fluid">
   

    <div class="row">

        <!-- Total Staf -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $total_staf ?></h3>
                    <p>Total Staf</p>
                </div>

                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>

                <a href="<?= base_url('staf') ?>" class="small-box-footer">
                    Lihat Data <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Klien -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $total_klien ?></h3>
                    <p>Total Klien</p>
                </div>

                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <a href="<?= base_url('klien') ?>" class="small-box-footer">
                    Lihat Data <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Arsip -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $total_arsip ?></h3>
                    <p>Total Arsip</p>
                </div>

                <div class="icon">
                    <i class="fas fa-folder-open"></i>
                </div>

                <a href="<?= base_url('arsip') ?>" class="small-box-footer">
                    Lihat Data <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Laporan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $total_laporan ?></h3>
                    <p>Total Laporan</p>
                </div>

                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>

                <a href="<?= base_url('laporan') ?>" class="small-box-footer">
                    Lihat Data <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>

</div>

<!-- Permintaan Penghapusan -->
<div class="col-lg-3 col-6">

    <div class="small-box bg-maroon">

        <div class="inner">

            <h3><?= $approval_arsip + $approval_klien ?></h3>

            <p>Permintaan Penghapusan</p>

        </div>

        <div class="icon">

            <i class="fas fa-user-check"></i>

        </div>

        <a href="<?= base_url('approval') ?>" class="small-box-footer">

            Lihat Persetujuan
            <i class="fas fa-arrow-circle-right"></i>

        </a>

    </div>

</div>

<div class="row">

    <!-- Grafik -->
    <div class="col-md-8">

         <div class="card flex-fill card-grafik">

            <div class="card-header bg-info">

                <h3 class="card-title">

                    Statistik Arsip per Bulan

                </h3>

            </div>

            <div class="card-body">

                <canvas id="chartArsip"></canvas>

            </div>

        </div>

    </div>

    <!-- Informasi User -->
    <div class="col-md-4 d-flex">

        <div class="card card-primary flex-fill">

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
                        <td><?= ucfirst(session()->get('role')) ?></td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge badge-success">
                                Online
                            </span>
                        </td>
                    </tr>

                    <tr>

                    <th>Approval Arsip</th>

                    <td>

                            <span class="badge badge-warning">

                            <?= $approval_arsip ?>

                            </span>

                        </td>

                    </tr>

                    <tr>

                    <th>Approval Klien</th>

                        <td>

                            <span class="badge badge-danger">

                            <?= $approval_klien ?>

                            </span>

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>
<div class="row">

    <div class="col-md-12">

        <div class="card">

            <div class="card-header bg-primary">

                <h3 class="card-title">

                    Arsip Terbaru

                </h3>

            </div>
            
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Judul Arsip</th>
                            <th>Klien</th>
                            <th>Jenis Perkara</th>
                            <th>Tanggal</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    $no = 1;
                    foreach($arsip_terbaru as $arsip):
                    ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td><?= esc($arsip['judul_arsip']) ?></td>

                            <td><?= esc($arsip['nama_klien']) ?></td>

                            <td><?= esc($arsip['jenis_perkara']) ?></td>

                            <td><?= date('d-m-Y', strtotime($arsip['tanggal'])) ?></td>

                        </tr>

                    <?php endforeach; ?>

                    <?php if(empty($arsip_terbaru)): ?>

                        <tr>

                            <td colspan="5" class="text-center">

                                Belum ada data arsip

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<script>

document.addEventListener("DOMContentLoaded", function(){

    const canvas = document.getElementById('chartArsip');

    if(canvas){

        const ctx = canvas.getContext('2d');

        new Chart(ctx,{

            type:'bar',

            data:{

                labels:[
                    <?php foreach($statistik as $row): ?>
                        "<?= date('F', mktime(0,0,0,$row['bulan'],1)) ?>",
                    <?php endforeach; ?>
                ],

                datasets:[{

                    label:'Jumlah Arsip',

                    data:[
                        <?php foreach($statistik as $row): ?>
                            <?= $row['total'] ?>,
                        <?php endforeach; ?>
                    ],

                    backgroundColor:'#007bff'

                }]

            },

            options:{

                responsive:true,
                maintainAspectRatio:false

            }

        });

    }

});

</script>
<script>

function updateJam(){

const sekarang=new Date();

const hari=[
"Minggu",
"Senin",
"Selasa",
"Rabu",
"Kamis",
"Jumat",
"Sabtu"
];

const bulan=[
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

document.getElementById("hari").innerHTML=hari[sekarang.getDay()];

document.getElementById("tanggal").innerHTML=
sekarang.getDate()+" "+
bulan[sekarang.getMonth()]+" "+
sekarang.getFullYear();

document.getElementById("jam").innerHTML=
sekarang.toLocaleTimeString('id-ID');

}

setInterval(updateJam,1000);

updateJam();

</script>

<?= $this->endSection() ?>