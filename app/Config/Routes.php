<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// ===================================
// LUPA PASSWORD
// ===================================

$routes->get('lupa-password', 'ForgotPassword::index');
$routes->post('lupa-password', 'ForgotPassword::sendOTP');

$routes->get('verifikasi-otp', 'ForgotPassword::verifikasiOTP');
$routes->post('verifikasi-otp', 'ForgotPassword::cekOTP');

$routes->get('reset-password', 'ForgotPassword::resetPassword');
$routes->post('reset-password', 'ForgotPassword::updatePassword');

$routes->group('', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'Dashboard::index');

    // MASTER KLIEN
    $routes->group('klien', function($routes){

        $routes->get('/', 'Klien::index');

        $routes->get('tambah', 'Klien::tambah');

        $routes->post('simpan', 'Klien::simpan');

        $routes->get('edit/(:num)', 'Klien::edit/$1');

        $routes->post('update/(:num)', 'Klien::update/$1');

        $routes->get('hapus/(:num)', 'Klien::hapus/$1');

    });

    // MASTER STAF
$routes->group('staf', function($routes){

    $routes->get('/', 'Staf::index');

    $routes->get('tambah', 'Staf::tambah');

    $routes->post('simpan', 'Staf::simpan');

    $routes->get('edit/(:num)', 'Staf::edit/$1');

    $routes->post('update/(:num)', 'Staf::update/$1');

    $routes->get('hapus/(:num)', 'Staf::hapus/$1');

});

// MASTER ARSIP
$routes->group('arsip', function($routes){

    $routes->get('/', 'Arsip::index');

    $routes->get('tambah', 'Arsip::tambah');

    $routes->post('simpan', 'Arsip::simpan');

    $routes->get('detail/(:num)', 'Arsip::detail/$1');

    $routes->get('edit/(:num)', 'Arsip::edit/$1');

    $routes->post('update/(:num)', 'Arsip::update/$1');

    $routes->get('hapus/(:num)', 'Arsip::hapus/$1');

});

$routes->group('laporan', function($routes){

    $routes->get('/', 'Laporan::index');

    $routes->get('cetak', 'Laporan::cetak');

    $routes->get('excel', 'Laporan::excel');

});

$routes->group('profile', function($routes){

    $routes->get('/', 'Profile::index');

    $routes->post('update', 'Profile::update');

});
$routes->group('approval', function($routes){

    $routes->get('/', 'Approval::index');

    $routes->get('setujuiArsip/(:num)', 'Approval::setujuiArsip/$1');
    $routes->get('tolakArsip/(:num)', 'Approval::tolakArsip/$1');

    $routes->get('setujuiKlien/(:num)', 'Approval::setujuiKlien/$1');
    $routes->get('tolakKlien/(:num)', 'Approval::tolakKlien/$1');

});
});