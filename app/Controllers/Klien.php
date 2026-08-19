<?php

namespace App\Controllers;

use App\Models\KlienModel;

class Klien extends BaseController
{
    protected $klien;

    public function __construct()
    {
        $this->klien = new KlienModel();
    }
    private function cekAksesStaf()
{
    if (session()->get('role') != 'staf') {

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

    }
}
    public function index()
{
    if(session()->get('role') == 'pimpinan'){

        $klien = $this->klien->findAll();

    }else{

        $klien = $this->klien
            ->where('id_staf', session()->get('id_user'))
            ->findAll();

    }

    $data = [

        'title' => 'Data Klien',

        'klien' => $klien

    ];

    return view('klien/index', $data);
}
public function tambah()
{
    return view('klien/tambah', [
        'title' => 'Tambah Klien'
    ]);
}

    public function simpan()
{
        $this->cekAksesStaf();
    $validasi = $this->validate([

        'nama_klien' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama klien wajib diisi.'
            ]
        ],

        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat wajib diisi.'
            ]
        ],

        'no_hp' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nomor HP wajib diisi.'
            ]
        ],

        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email wajib diisi.',
                'valid_email' => 'Format email tidak valid.'
            ]
        ],

    ]);

    if (!$validasi) {

        return redirect()->back()
                         ->withInput()
                         ->with('errors', $this->validator->getErrors());

    }

    $this->klien->save([
        'id_staf'       => session()->get('id_user'),
        'nama_klien'    => $this->request->getPost('nama_klien'),
        'alamat'        => $this->request->getPost('alamat'),
        'no_hp'         => $this->request->getPost('no_hp'),
        'email'         => $this->request->getPost('email'),

    ]);

    session()->setFlashdata('success', 'Data klien berhasil disimpan.');

    return redirect()->to(base_url('klien'));
}

    public function edit($id)
{
    $this->cekAksesStaf();

    $klien = $this->klien->find($id);

    if (!$klien) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    if ($klien['id_staf'] != session()->get('id_user')) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = [
        'title' => 'Edit Klien',
        'klien' => $klien
    ];

    return view('klien/edit', $data);
}
    public function update($id)
{
        $this->cekAksesStaf();
        $klien = $this->klien->find($id);

if (!$klien) {
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
}

if ($klien['id_staf'] != session()->get('id_user')) {
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
}
        $this->klien->update($id, [
        'nama_klien'   => $this->request->getPost('nama_klien'),
        'alamat' => $this->request->getPost('alamat'),
        'no_hp'  => $this->request->getPost('no_hp'),
        'email'  => $this->request->getPost('email'),
    ]);

    session()->setFlashdata('success', 'Data klien berhasil di update');

    return redirect()->to(base_url('klien'));
}

    public function hapus($id)
{
    $this->cekAksesStaf();

    $klien = $this->klien->find($id);

    if (!$klien) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    if ($klien['id_staf'] != session()->get('id_user')) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    // Jika sudah pernah diajukan
    if ($klien['status_penghapusan'] == 'pending') {

        session()->setFlashdata(
            'error',
            'Data klien sudah diajukan untuk dihapus dan sedang menunggu persetujuan pimpinan.'
        );

        return redirect()->to(base_url('klien'));
    }

    // Ubah status menjadi pending
    $this->klien->update($id, [

        'status_penghapusan' => 'pending'

    ]);

    session()->setFlashdata(
        'success',
        'Permintaan penghapusan berhasil dikirim dan menunggu persetujuan pimpinan.'
    );

    return redirect()->to(base_url('klien'));
}
}