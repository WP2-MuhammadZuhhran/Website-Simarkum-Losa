<?php

namespace App\Controllers;

use App\Models\StafModel;
use App\Models\PimpinanModel;

class Profile extends BaseController
{
    protected $staf;
    protected $pimpinan;

    public function __construct()
    {
        $this->staf = new StafModel();
        $this->pimpinan = new PimpinanModel();
    }

   public function index()
{

    if(session()->get('role') == 'pimpinan'){

        $user = $this->pimpinan
                    ->find(session()->get('id_user'));

    }else{

        $user = $this->staf
                    ->find(session()->get('id_user'));

    }

    $data=[

        'title'=>'Profil Saya',

        'user'=>$user

    ];

    return view('profile/index',$data);

}

    public function update()
    {
        $id = session()->get('id_user');

        $userLama = $this->staf->find($id);

/*
|--------------------------------------------------------------------------
| Validasi Username
|--------------------------------------------------------------------------
*/

if($userLama['username'] == $this->request->getPost('username')){

    $usernameRule = 'required|min_length[4]';

}else{

    $usernameRule = 'required|min_length[4]|is_unique[staf.username]';

}

        if(session()->get('role')=='pimpinan'){

    $model = $this->pimpinan;

    $table = 'pimpinan';

}else{

    $model = $this->staf;

    $table = 'staf';

}

        $userLama = $model->find($id);
        

        // Validasi email
        if ($userLama['email'] == $this->request->getPost('email')) {
            $emailRule = 'required|valid_email';
        } else {
           $emailRule = "required|valid_email|is_unique[$table.email]";
        }
if ($userLama['username'] == $this->request->getPost('username')) {

    $usernameRule = 'required|min_length[4]';

} else {

    $usernameRule = 'required|min_length[4]|is_unique[staf.username]';

}
        $rules = [

    'username' => [
        'rules' => $usernameRule,
        'errors' => [
            'required'   => 'Username wajib diisi.',
            'min_length' => 'Username minimal 4 karakter.',
            'is_unique'  => 'Username sudah digunakan.'
        ]
    ],

    'nama' => [
        'rules' => 'required',
        'errors' => [
            'required' => 'Nama wajib diisi.'
        ]
    ],

    'email' => [
        'rules' => $emailRule,
        'errors' => [
            'required'    => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid.',
            'is_unique'   => 'Email sudah digunakan.'
        ]
    ],

    'no_hp' => [
        'rules' => 'required',
        'errors' => [
            'required' => 'Nomor HP wajib diisi.'
        ]
    ]

];
        // Jika password diisi baru divalidasi
        if ($this->request->getPost('password') != '') {

            $rules['password'] = [
                'rules' => 'min_length[6]',
                'errors' => [
                    'min_length' => 'Password minimal 6 karakter.'
                ]
            ];

            $rules['konfirmasi_password'] = [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak sama.'
                ]
            ];
        }

        if (!$this->validate($rules)) {

            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());

        }

        $data = [
            'username' => $this->request->getPost('username'),

            'nama'  => $this->request->getPost('nama'),

            'email' => $this->request->getPost('email'),

            'no_hp' => $this->request->getPost('no_hp'),

        ];

        // Update password jika diisi
        if ($this->request->getPost('password') != '') {

            $data['password'] = password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            );

        }

        $model->update($id,$data);

        // Update session
        session()->set([
            'nama'  => $data['nama'],
            'username' => $data['username'],
            'email' => $data['email']
        ]);

        session()->setFlashdata('success', 'Profil berhasil diperbarui.');

        return redirect()->to(base_url('profile'));
    }
}