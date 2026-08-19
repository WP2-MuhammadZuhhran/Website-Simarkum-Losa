<?php

namespace App\Controllers;

use App\Models\StafModel;

class Staf extends BaseController
{
    protected $staf;

    public function __construct()
    
{
    if (session()->get('role') != 'pimpinan') {

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

    }

    $this->staf = new StafModel();
}

    public function index()
    {
        $data = [
            'title' => 'Data Staf',
            'staf'  => $this->staf->findAll()
        ];

        return view('staf/index', $data);
    }
    public function tambah()
{
    return view('staf/tambah',[
        'title'=>'Tambah Staf'
    ]);
}
    public function simpan()
{
    $validasi = $this->validate([

        'nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama staf wajib diisi.'
            ]
        ],

        'username' => [
            'rules' => 'required|is_unique[staf.username]',
            'errors' => [
                'required' => 'Username wajib diisi.',
                'is_unique' => 'Username sudah digunakan.'
            ]
        ],

        'email' => [
            'rules' => 'required|valid_email|is_unique[staf.email]',
            'errors' => [
                'required' => 'Email wajib diisi.',
                'valid_email' => 'Format email tidak valid.',
                'is_unique' => 'Email sudah digunakan.'
            ]
        ],

        'no_hp' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nomor HP wajib diisi.'
            ]
        ],

        'password' => [
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required' => 'Password wajib diisi.',
                'min_length' => 'Password minimal 6 karakter.'
            ]
        ],

        'konfirmasi_password' => [
            'rules' => 'matches[password]',
            'errors' => [
                'matches' => 'Konfirmasi password tidak sama.'
            ]
        ]

    ]);

    if (!$validasi) {

        return redirect()->back()
                         ->withInput()
                         ->with('errors', $this->validator->getErrors());

    }

    $this->staf->save([

        'id_pimpinan' => session()->get('id_pimpinan'),

        'nama' => $this->request->getPost('nama'),

        'username' => $this->request->getPost('username'),

        'email' => $this->request->getPost('email'),

        'no_hp' => $this->request->getPost('no_hp'),

        'password' => password_hash(
            $this->request->getPost('password'),
            PASSWORD_DEFAULT
        )

    ]);

    session()->setFlashdata(
        'success',
        'Data staf berhasil ditambahkan.'
    );

    return redirect()->to(base_url('staf'));
}
public function edit($id)
{
    $data = [
        'title' => 'Edit Staf',
        'staf'  => $this->staf->find($id)
    ];

    return view('staf/edit', $data);
}

public function update($id)
{
    $data = [

        'nama'      => $this->request->getPost('nama'),

        'username'  => $this->request->getPost('username'),

        'email'     => $this->request->getPost('email'),

        'no_hp'     => $this->request->getPost('no_hp'),

    ];

    // Jika password diisi, update password
    if($this->request->getPost('password') != ''){

        $data['password'] = password_hash(
            $this->request->getPost('password'),
            PASSWORD_DEFAULT
        );

    }

    $this->staf->update($id, $data);

    session()->setFlashdata('success','Data staf berhasil diupdate.');

    return redirect()->to(base_url('staf'));
}

public function hapus($id)
{
    $this->staf->delete($id);

    session()->setFlashdata('success','Data staf berhasil dihapus.');

    return redirect()->to(base_url('staf'));
}
}