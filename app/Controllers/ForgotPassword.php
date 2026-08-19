<?php

namespace App\Controllers;

use App\Models\PimpinanModel;
use App\Models\StafModel;
use Config\Services;

class ForgotPassword extends BaseController
{
    protected $pimpinan;
    protected $staf;

    public function __construct()
    {
        $this->pimpinan = new PimpinanModel();
        $this->staf     = new StafModel();
    }

    /*
    ===================================================
    HALAMAN LUPA PASSWORD
    ===================================================
    */

    public function index()
    {
        return view('auth/lupa_password');
    }

    /*
    ===================================================
    KIRIM OTP
    ===================================================
    */

    public function sendOTP()
    {
        $email = $this->request->getPost('email');

        // cek email pimpinan
        $user = $this->pimpinan
                        ->where('email',$email)
                        ->first();

        $role = "pimpinan";

        // jika bukan pimpinan cek staf
        if(!$user){

            $user = $this->staf
                            ->where('email',$email)
                            ->first();

            $role = "staf";
        }

        if(!$user){

            return redirect()->back()
                    ->with('error','Email tidak terdaftar.');

        }

        // Generate OTP

        $otp = rand(100000,999999);

        // simpan session

        session()->set([

            'reset_email' => $email,

            'reset_role'  => $role,

            'reset_otp'   => $otp,

            'otp_expired' => time()+300

        ]);

        // kirim email

        $emailService = Services::email();

        $emailService->setMailType('html');

        $emailService->setTo($email);

        $emailService->setSubject('Reset Password SIMARKUM');

       $pesan = '
<div style="font-family:Arial,sans-serif;padding:20px;background:#f5f5f5">

<div style="max-width:600px;margin:auto;background:#ffffff;border-radius:8px;padding:30px">

<h2 style="color:#0d6efd;text-align:center;">
SIMARKUM
</h2>

<p>Halo,</p>

<p>
Kami menerima permintaan untuk melakukan <b>Reset Password</b> akun SIMARKUM.
</p>

<p>
Gunakan kode OTP berikut:
</p>

<div style="
background:#0d6efd;
color:white;
font-size:32px;
font-weight:bold;
text-align:center;
padding:15px;
border-radius:8px;
letter-spacing:6px;
">

'.$otp.'

</div>

<p style="margin-top:20px;">
Kode OTP berlaku selama <b>5 menit</b>.
</p>

<p>
Apabila Anda tidak melakukan permintaan reset password, abaikan email ini.
</p>

<hr>

<p style="font-size:12px;color:#666;text-align:center;">

Law Office Syamsul Arif & Partners<br>

Jl. Hadiah Utama II F No.1530

</p>

</div>

</div>
';

        $emailService->setMessage($pesan);

        if($emailService->send()){

            return redirect()->to(base_url('verifikasi-otp'))
            ->with('success','Kode OTP berhasil dikirim.');

        }

        return redirect()->back()
        ->with('error','Gagal mengirim email.');
    }

    /*
    ===================================================
    HALAMAN VERIFIKASI OTP
    ===================================================
    */

    public function verifikasiOTP()
    {
        return view('auth/verifikasi_otp');
    }

    /*
    ===================================================
    CEK OTP
    ===================================================
    */

    public function cekOTP()
    {
        $otp = $this->request->getPost('otp');

        // cek kadaluarsa

        if(time() > session()->get('otp_expired')){

            session()->remove([
                'reset_email',
                'reset_role',
                'reset_otp',
                'otp_expired'
            ]);

            return redirect()->to(base_url('lupa-password'))
            ->with('error','OTP telah kadaluarsa.');

        }

        // cek otp

        if($otp != session()->get('reset_otp')){

            return redirect()->back()
            ->with('error','OTP tidak sesuai.');

        }

        return redirect()->to(base_url('reset-password'));
    }

    /*
    ===================================================
    HALAMAN RESET PASSWORD
    ===================================================
    */

    public function resetPassword()
    {
        if(!session()->get('reset_email')){

            return redirect()->to(base_url('lupa-password'));

        }

        return view('auth/reset_password');
    }

    /*
    ===================================================
    UPDATE PASSWORD
    ===================================================
    */

    public function updatePassword()
    {

        $password = $this->request->getPost('password');

        $konfirmasi = $this->request->getPost('konfirmasi');

        if($password != $konfirmasi){

            return redirect()->back()
            ->with('error','Konfirmasi password tidak sama.');

        }

        $hash = password_hash($password,PASSWORD_DEFAULT);

        if(session()->get('reset_role')=="pimpinan"){

            $this->pimpinan

            ->where('email',session()->get('reset_email'))

            ->set([

                'password'=>$hash

            ])

            ->update();

        }else{

            $this->staf

            ->where('email',session()->get('reset_email'))

            ->set([

                'password'=>$hash

            ])

            ->update();

        }

        session()->remove([

            'reset_email',

            'reset_role',

            'reset_otp',

            'otp_expired'

        ]);

        return redirect()->to(base_url('/'))
        ->with('success','Password berhasil diperbarui.');
    }

}