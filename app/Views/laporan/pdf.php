<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>

body{
    font-family:"Times New Roman", serif;
    font-size:12px;
    color:#000;
    margin:30px;
}

/* ==========================
   KOP SURAT
========================== */

.kop{
    text-align:left;
    line-height:1.2;
}
.kop .lawoffice{
    color:#8B6A2F;
    font-size:16px;
    font-weight:bold;
}

.kop .nama{
    color:#8B6A2F;
    font-size:28px;
    font-weight:bold;
}

.kop .sub{
    color:#8B6A2F;
    font-size:13px;
    font-style:italic;
    text-decoration:underline;
}

.garis1{
    border:2px solid #8B6A2F;
    margin-top:10px;
    margin-bottom:2px;
}

.garis2{
    border:1px solid #8B6A2F;
    margin-bottom:18px;
}

/* ==========================
   JUDUL
========================== */

.judul{

    text-align:center;

    font-size:18px;

    font-weight:bold;

    margin-bottom:20px;

}

.info{

    margin-bottom:15px;

}

.info table{

    border:none;

}

.info td{

    border:none;

    padding:2px;

}

/* ==========================
   TABEL
========================== */

table{

    width:100%;

    border-collapse:collapse;

}

th{

    background:#e5e5e5;

    border:1px solid #000;

    padding:8px;

    text-align:center;

}

td{

    border:1px solid #000;

    padding:6px;

}

.total{

    margin-top:10px;

    font-weight:bold;

}

/* ==========================
   TTD
========================== */

.ttd{

    margin-top:50px;

    width:100%;

}

.ttd-kanan{

    width:300px;

    float:right;

    text-align:center;

}

.nama-pimpinan{

    margin-top:70px;

    font-weight:bold;

    text-decoration:underline;

}

/* ==========================
   FOOTER
========================== */

.footer{

    margin-top:120px;

    text-align:left;

    font-size:11px;

    line-height:1.5;

}

</style>

</head>

<body>

<div class="kop">

    <div class="lawoffice">

        Law Office

    </div>

    <div class="nama">

        Syamsul Arif &

    </div>

    <div class="nama">

        Partners

    </div>

    <div class="sub">

        Advocate & Consultant At Law

    </div>

</div>

<div class="garis1"></div>

<div class="garis2"></div>

<div class="judul">

    LAPORAN DATA ARSIP PERKARA

</div>

<div class="info">

<table>

<tr>

<td width="120"><strong>Tanggal Cetak</strong></td>

<td width="10">:</td>

<td><?= date('d F Y') ?></td>

</tr>

<tr>

<td><strong>Dicetak Oleh</strong></td>

<td>:</td>

<td><?= session()->get('nama') ?></td>

</tr>

</table>

</div>

<table>

<thead>

<tr>

<th width="5%">No</th>

<th width="18%">Nomor Perkara</th>

<th width="20%">Nama Klien</th>

<th width="23%">Judul Arsip</th>

<th width="17%">Jenis Perkara</th>

<th width="17%">Tanggal</th>

</tr>

</thead>

<tbody>

<?php $no=1; ?>

<?php foreach($arsip as $a): ?>

<tr>

<td align="center"><?= $no++ ?></td>

<td><?= esc($a['nomor_perkara']) ?></td>

<td><?= esc($a['nama_klien']) ?></td>

<td><?= esc($a['judul_arsip']) ?></td>

<td><?= esc($a['jenis_perkara']) ?></td>

<td align="center"><?= date('d-m-Y',strtotime($a['tanggal'])) ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<div class="total">

Jumlah Arsip : <?= count($arsip); ?>

</div>

<div class="ttd">

<div class="ttd-kanan">

Jakarta, <?= date('d F Y') ?>

<br><br>

Mengetahui,

<div class="nama-pimpinan">

Andi Fatmawati, S.H.

</div>

Pimpinan

</div>

</div>

<div style="clear:both;"></div>

<div class="footer">

Jl. Hadiah Utama II F No.1530<br>

Jelambar, Jakarta Barat 11460<br>

Phone : +62 21 22285832<br>

Email : saplawoffice@gmail.com

</div>

</body>

</html>