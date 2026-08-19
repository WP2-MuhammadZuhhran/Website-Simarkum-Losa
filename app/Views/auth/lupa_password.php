<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Lupa Password</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">

<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css')?>">

</head>

<body class="hold-transition login-page">

<div class="login-box">

<div class="card card-outline card-primary">

<div class="card-header text-center">

<h2><b>SIMARKUM</b></h2>

<p>Lupa Password</p>

</div>

<div class="card-body">

<?php if(session()->getFlashdata('error')): ?>

<div class="alert alert-danger">

<?= session()->getFlashdata('error') ?>

</div>

<?php endif; ?>

<p class="text-center">

Masukkan email yang terdaftar pada sistem.

</p>

<form action="<?= base_url('lupa-password') ?>" method="post">

<div class="input-group mb-3">

<input
type="email"
name="email"
class="form-control"
placeholder="Email"
required>

<div class="input-group-append">

<div class="input-group-text">

<i class="fas fa-envelope"></i>

</div>

</div>

</div>

<button
class="btn btn-primary btn-block">

Kirim OTP

</button>

</form>

<hr>

<div class="text-center">

<a href="<?= base_url('/') ?>">

Kembali Login

</a>

</div>

</div>

</div>

</div>

</body>

</html>