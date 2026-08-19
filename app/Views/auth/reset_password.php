<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Reset Password</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">

<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css')?>">

</head>

<body class="hold-transition login-page">

<div class="login-box">

<div class="card card-outline card-primary">

<div class="card-header text-center">

<h3><b>SIMARKUM</b></h3>

<p>Password Baru</p>

</div>

<div class="card-body">

<?php if(session()->getFlashdata('error')): ?>

<div class="alert alert-danger">

<?= session()->getFlashdata('error') ?>

</div>

<?php endif; ?>

<form action="<?= base_url('reset-password') ?>" method="post">

<div class="input-group mb-3">

<input
type="password"
name="password"
id="password"
class="form-control"
placeholder="Password Baru"
required>

<div class="input-group-append">

<span class="input-group-text">

<i class="fas fa-eye" id="togglePassword" style="cursor:pointer"></i>

</span>

</div>

</div>

<div class="input-group mb-3">

<input
type="password"
name="konfirmasi"
id="konfirmasi"
class="form-control"
placeholder="Konfirmasi Password"
required>

<div class="input-group-append">

<span class="input-group-text">

<i class="fas fa-eye" id="toggleKonfirmasi" style="cursor:pointer"></i>

</span>

</div>

</div>

<button
class="btn btn-primary btn-block">

Simpan Password

</button>

</form>

</div>

</div>

</div>

<script>

document.getElementById("togglePassword").onclick=function(){

let x=document.getElementById("password");

if(x.type==="password"){

x.type="text";

}else{

x.type="password";

}

}

document.getElementById("toggleKonfirmasi").onclick=function(){

let x=document.getElementById("konfirmasi");

if(x.type==="password"){

x.type="text";

}else{

x.type="password";

}

}

</script>

</body>

</html>