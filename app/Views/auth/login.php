<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>SIMARKUM Login</title>

<link rel="icon"
      type="image/png"
      href="<?= base_url('assets/dist/img/logo-lawoffice.png') ?>">

<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">

<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css')?>">

<style>

body{
    font-family:'Segoe UI',sans-serif;
    background:#eef2f7;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.login-wrapper{

    width:100%;
    max-width:950px;

    display:flex;

    background:#fff;

    border-radius:15px;

    overflow:hidden;

    box-shadow:0 15px 35px rgba(0,0,0,.2);

}

.login-left{

    flex:1;

    background:linear-gradient(135deg,#12355B,#1E5A8A);

    color:#fff;

    padding:60px 35px;

}

.login-right{

    flex:1.2;

    padding:50px;

}

.login-left h1{

    font-size:34px;

    font-weight:bold;

    margin-bottom:5px;

}

.login-left h2{

    color:#D8B36A;

    font-size:28px;

    font-weight:bold;

}

.login-left p{

    margin-top:25px;

    line-height:28px;

    text-align:justify;

}

.login-icon{

    font-size:80px;

    margin-bottom:25px;

}

.btn-login{

    background:#12355B;

    color:white;

    font-weight:bold;

}

.btn-login:hover{

    background:#0d2a48;

    color:white;

}

/* ===============================
   Responsive Tablet & HP
================================*/

@media (max-width:768px){

    .login-wrapper{

        flex-direction:column;

        max-width:450px;

    }

    .login-left{

        text-align:center;

        padding:35px 25px;

    }

    .login-right{

        padding:35px 25px;

    }

    .login-icon{

        font-size:60px;

    }

    .login-left h1{

        font-size:26px;

    }

    .login-left h2{

        font-size:22px;

    }

    .login-left p{

        font-size:14px;

        line-height:24px;

    }

}

@media (max-width:480px){

    body{

        padding:10px;

    }

    .login-right{

        padding:25px 20px;

    }

    .login-left{

        padding:25px 20px;

    }

    .login-left h1{

        font-size:22px;

    }

    .login-left h2{

        font-size:20px;

    }

}

</style>

</head>

<body class="hold-transition">

<div class="login-wrapper">

<div class="login-left">

<div class="login-icon">

<i class="fas fa-balance-scale"></i>

</div>

<h1>Law Office</h1>

<h2>Syamsul Arif & Partners</h2>

<h5><i>Advocate & Consultant At Law</i></h5>

<p>

Sistem Informasi Manajemen Arsip Hukum (SIMARKUM)
digunakan untuk mengelola data klien, arsip perkara,
dan laporan secara cepat, aman, dan terintegrasi.

</p>

</div>

<div class="login-right">

<h3 class="text-center mb-4">

<b>LOGIN SIMARKUM</b>

</h3>

<?php if(session()->getFlashdata('error')): ?>

<div class="alert alert-danger">

<?= session()->getFlashdata('error') ?>

</div>

<?php endif; ?>

<form action="<?= base_url('login') ?>" method="post">

<div class="form-group">

<label>Username</label>

<div class="input-group">

<input type="text"
name="username"
class="form-control"
required>

<div class="input-group-append">

<span class="input-group-text">

<i class="fas fa-user"></i>

</span>

</div>

</div>

</div>

<div class="form-group">

<label>Password</label>

<div class="input-group">

<input type="password"
id="password"
name="password"
class="form-control"
required>

<div class="input-group-append">

<span class="input-group-text"
      id="togglePassword"
      style="cursor:pointer;">

<i class="fas fa-eye" id="eyeIcon"></i>

</span>

</div>

</div>

</div>
<div class="form-group">

<div class="custom-control custom-checkbox">

<input
type="checkbox"
class="custom-control-input"
id="remember">

<label
class="custom-control-label"
for="remember">

Ingat Saya

</label>

</div>

</div>
<button class="btn btn-login btn-block">

<i class="fas fa-sign-in-alt"></i>

Login

</button>
<div class="text-center mt-3">

<a href="<?= base_url('lupa-password') ?>">

Lupa Password?

</a>

</div>
</form>

</div>

</div>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js')?>"></script>

<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

<script src="<?= base_url('assets/dist/js/adminlte.min.js')?>"></script>

<script>

const password = document.getElementById('password');

const toggle = document.getElementById('togglePassword');

const icon = document.getElementById('eyeIcon');

toggle.addEventListener('click', function(){

    if(password.type === 'password'){

        password.type = 'text';

        icon.classList.remove('fa-eye');

        icon.classList.add('fa-eye-slash');

    }else{

        password.type = 'password';

        icon.classList.remove('fa-eye-slash');

        icon.classList.add('fa-eye');

    }

});

</script>
</body>

</html>