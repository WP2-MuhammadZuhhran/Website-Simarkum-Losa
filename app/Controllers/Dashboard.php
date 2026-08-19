<?php

namespace App\Controllers;

use App\Models\StafModel;
use App\Models\KlienModel;
use App\Models\ArsipModel;
use App\Models\LaporanModel;

class Dashboard extends BaseController
{
    public function index()
{
    if (!session()->get('logged_in')) {
        return redirect()->to('/');
    }

    $stafModel    = new StafModel();
    $klienModel   = new KlienModel();
    $arsipModel   = new ArsipModel();
    $laporanModel = new LaporanModel();

    if(session()->get('role') == 'pimpinan'){

        $data = [

            'title' => 'Dashboard SIMARKUM',

            'total_staf'     => $stafModel->countAll(),

            'total_klien'    => $klienModel->countAll(),

            'total_arsip'    => $arsipModel->countAll(),

            'total_laporan' => $arsipModel->countAll(), 

            'approval_arsip' => $arsipModel
                             ->where('status_penghapusan','pending')
                             ->countAllResults(),

            'approval_klien' => $klienModel
                            ->where('status_penghapusan','pending')
                            ->countAllResults(),

            'statistik'      => $arsipModel->statistikBulanan(),

            'arsip_terbaru'  => $arsipModel
                ->select('arsip.*, klien.nama_klien')
                ->join('klien','klien.id_klien=arsip.id_klien')
                ->orderBy('tanggal','DESC')
                ->findAll(5)

        ];

        return view('dashboard/pimpinan',$data);

    }

    // DASHBOARD STAF
$idStaf = session()->get('id_user');

/*
|--------------------------------------------------------------------------
| Hitung jumlah approval yang masih menunggu
|--------------------------------------------------------------------------
*/

$pendingArsip = $arsipModel
    ->where('id_staf', $idStaf)
    ->where('status_penghapusan', 'pending')
    ->countAllResults();

$pendingKlien = $klienModel
    ->where('id_staf', $idStaf)
    ->where('status_penghapusan', 'pending')
    ->countAllResults();

/*
|--------------------------------------------------------------------------
| Data Dashboard
|--------------------------------------------------------------------------
*/

$data = [

    'title' => 'Dashboard SIMARKUM',

    'total_klien' => $klienModel
        ->where('id_staf', $idStaf)
        ->countAllResults(),

    'total_arsip' => $arsipModel
        ->where('id_staf', $idStaf)
        ->countAllResults(),

    'pending_arsip' => $pendingArsip,

    'pending_klien' => $pendingKlien,

    'pending_total' => $pendingArsip + $pendingKlien,

    'arsip_terbaru' => $arsipModel
        ->select('arsip.*, klien.nama_klien')
        ->join('klien', 'klien.id_klien = arsip.id_klien')
        ->where('arsip.id_staf', $idStaf)
        ->orderBy('tanggal', 'DESC')
        ->findAll(5)

];

return view('dashboard/staf', $data);
}
}