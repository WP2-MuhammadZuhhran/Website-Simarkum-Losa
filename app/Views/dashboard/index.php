<!DOCTYPE html>

<html>

<head>

<title>Dashboard</title>


</head>

<body>

<h1>

LOGIN BERHASIL

</h1>

<h3>

Selamat Datang

<?= session('nama') ?>

</h3>

<h4>

Role :

<?= session('role') ?>

</h4>

<a href="<?= base_url('logout')?>">

Logout

</a>

</body>

</html>