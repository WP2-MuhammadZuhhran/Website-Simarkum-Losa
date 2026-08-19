<?php

namespace App\Controllers;

use App\Models\PimpinanModel;
use App\Models\StafModel;
use Config\Services;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $pimpinanModel = new PimpinanModel();
        $stafModel     = new StafModel();

        /*
        ==========================
        LOGIN PIMPINAN
        ==========================
        */

        $pimpinan = $pimpinanModel
                        ->where('username', $username)
                        ->first();
                    

        if ($pimpinan) {

            if (password_verify($password, $pimpinan['password'])) {

                session()->set([

    'id_user'      => $pimpinan['id_pimpinan'],

    'id_pimpinan'  => $pimpinan['id_pimpinan'],

    'nama'         => $pimpinan['nama'],

    'username'     => $pimpinan['username'],

    'role'         => 'pimpinan',

    'logged_in'    => true

]);
                return redirect()->to('/dashboard');
            }
        }

        /*
        ==========================
        LOGIN STAF
        ==========================
        */

        $staf = $stafModel
                    ->where('username', $username)
                    ->first();

        if ($staf) {

            if (password_verify($password, $staf['password'])) {

               session()->set([

    'id_user'      => $staf['id_staf'],

    'id_pimpinan'  => $staf['id_pimpinan'],

    'nama'         => $staf['nama'],

    'username'     => $staf['username'],

    'role'         => 'staf',

    'logged_in'    => true

]);

                return redirect()->to('/dashboard');
            }
        }

        return redirect()->back()->with('error', 'Username atau Password salah.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }

}
