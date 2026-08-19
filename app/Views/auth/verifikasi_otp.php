<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Verifikasi OTP</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">

<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css')?>">

</head>

<body class="hold-transition login-page">

<div class="login-box">

<div class="card card-outline card-primary">

<div class="card-header text-center">

<h3><b>SIMARKUM</b></h3>

<p>Verifikasi OTP</p>

</div>

<div class="card-body">

<?php if(session()->getFlashdata('error')): ?>

<div class="alert alert-danger">

<?= session()->getFlashdata('error') ?>

</div>

<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>

<div class="alert alert-success">

<?= session()->getFlashdata('success') ?>

</div>

<?php endif; ?>

<p class="text-center">

Masukkan kode OTP yang telah dikirim ke email Anda.

</p>

<form action="<?= base_url('verifikasi-otp') ?>" method="post">

<div class="input-group mb-3">

<input
type="text"
name="otp"
class="form-control text-center"
maxlength="6"
placeholder="######"
required>

<div class="input-group-append">

<div class="input-group-text">

<i class="fas fa-key"></i>

</div>

</div>

</div>

<button
class="btn btn-primary btn-block">

Verifikasi OTP

</button>

</form>

<br>

<a href="<?= base_url('/') ?>">

Kembali Login

</a>

</div>

</div>

</div>

</body>

</html>