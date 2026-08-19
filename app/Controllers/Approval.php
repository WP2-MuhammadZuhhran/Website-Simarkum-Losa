<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\KlienModel;

class Approval extends BaseController
{
    protected $arsip;
    protected $klien;

    public function __construct()
    {
        $this->arsip = new ArsipModel();
        $this->klien = new KlienModel();
    }

    public function index()
    {
        // Hanya pimpinan yang boleh mengakses
        if(session()->get('role') != 'pimpinan'){
            return redirect()->to('/dashboard');
        }

        $arsip = $this->arsip
            ->select('arsip.*, klien.nama_klien, staf.nama')
            ->join('klien','klien.id_klien = arsip.id_klien')
            ->join('staf','staf.id_staf = arsip.id_staf')
            ->where('arsip.status_penghapusan', 'pending')
            ->findAll();

        $klien = $this->klien
            ->select('klien.*, staf.nama')
            ->join('staf','staf.id_staf = klien.id_staf')
            ->where('klien.status_penghapusan','pending')
            ->findAll();

        $data = [
            'title' => 'Persetujuan Penghapusan',
            'arsip' => $arsip,
            'klien' => $klien
        ];

        return view('approval/index',$data);
    }

    // ==========================
    // APPROVAL ARSIP
    // ==========================

    public function setujuiArsip($id)
    {
        $arsip = $this->arsip->find($id);

        if(!$arsip){
            return redirect()->back();
        }

        // Hapus file
        if(!empty($arsip['file_dokumen'])){

            $path = FCPATH.'uploads/arsip/'.$arsip['file_dokumen'];

            if(file_exists($path)){
                unlink($path);
            }

        }

        $this->arsip->delete($id);

        session()->setFlashdata(
            'success',
            'Permintaan penghapusan arsip disetujui.'
        );

        return redirect()->to('/approval');
    }

    public function tolakArsip($id)
    {
        $this->arsip->update($id,[
            'status_penghapusan'=>'aktif'
        ]);

        session()->setFlashdata(
            'success',
            'Permintaan penghapusan arsip ditolak.'
        );

        return redirect()->to('/approval');
    }

    // ==========================
    // APPROVAL KLIEN
    // ==========================

    public function setujuiKlien($id)
    {
        $this->klien->delete($id);

        session()->setFlashdata(
            'success',
            'Permintaan penghapusan klien disetujui.'
        );

        return redirect()->to('/approval');
    }

    public function tolakKlien($id)
    {
        $this->klien->update($id,[
            'status_penghapusan'=>'aktif'
        ]);

        session()->setFlashdata(
            'success',
            'Permintaan penghapusan klien ditolak.'
        );

        return redirect()->to('/approval');
    }
}