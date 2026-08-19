<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\KlienModel;
use App\Models\StafModel;

class Arsip extends BaseController
{
    protected $arsip;
    protected $klien;
    protected $staf;

    public function __construct()
    {
        $this->arsip = new ArsipModel();
        $this->klien = new KlienModel();
        $this->staf  = new StafModel();
    }
    private function cekAksesStaf()
{
    if (session()->get('role') != 'staf') {

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

    }
}

    public function index()
{
    $builder = $this->arsip
        ->select('arsip.*, klien.nama_klien AS nama_klien, staf.nama AS nama_staf')
        ->join('klien', 'klien.id_klien = arsip.id_klien')
        ->join('staf', 'staf.id_staf = arsip.id_staf');

    // Jika login sebagai staf, tampilkan hanya arsip miliknya
    if (session()->get('role') == 'staf') {

        $builder->where('arsip.id_staf', session()->get('id_user'));

    }

    $data = [

        'title' => 'Data Arsip',

        'arsip' => $builder->findAll()

    ];

    return view('arsip/index', $data);
}

   public function tambah()
{
    $this->cekAksesStaf();

    $data = [

        'title' => 'Tambah Arsip',

        'klien' => $this->klien
                    ->where('id_staf', session()->get('id_user'))
                    ->findAll()

    ];

    return view('arsip/tambah', $data);
}
    public function simpan()
{
    $this->cekAksesStaf();
    $validasi = $this->validate([

        'id_klien' => [
    'rules' => 'required',
    'errors' => [
        'required' => 'Klien wajib dipilih.'
    ]
],
        'nomor_perkara' => [
            'rules' => 'required',
                'errors' => [
                     'required' => 'Nomor perkara wajib diisi.'
     ]
],

        'judul_arsip' => [
            'rules' => 'required'
        ],

        'jenis_perkara' => [
            'rules' => 'required'
        ],

        'tanggal' => [
            'rules' => 'required'
        ],

        'file_dokumen' => [

            'rules' => 'uploaded[file_dokumen]|ext_in[file_dokumen,pdf,doc,docx]|max_size[file_dokumen,5120]',

            'errors' => [

                'uploaded' => 'File wajib diupload.',

                'ext_in' => 'Format file harus PDF, DOC atau DOCX.',

                'max_size' => 'Ukuran file maksimal 5 MB.'

            ]

        ]

    ]);

    if(!$validasi){

        dd($this->validator->getErrors());
    }

    // Upload File
    $file = $this->request->getFile('file_dokumen');

    $namaFile = $file->getRandomName();

    $file->move('uploads/arsip', $namaFile);

    // Simpan Database
    $this->arsip->save([

        'id_staf'        => session()->get('id_user'),

        'id_klien'       => $this->request->getPost('id_klien'),

        'nomor_perkara'   => $this->request->getPost('nomor_perkara'),

        'judul_arsip'     => $this->request->getPost('judul_arsip'),

        'jenis_perkara'  => $this->request->getPost('jenis_perkara'),

        'tanggal'        => $this->request->getPost('tanggal'),

        'file_dokumen'   => $namaFile,

        'keterangan'     => $this->request->getPost('keterangan')

    ]);

    session()->setFlashdata('success','Data arsip berhasil ditambahkan.');

    return redirect()->to(base_url('arsip'));
}
    public function edit($id)
{
    $this->cekAksesStaf();
    $arsip = $this->arsip->find($id);

    if (!$arsip) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    if ($arsip['id_staf'] != session()->get('id_user')) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = [

        'title' => 'Edit Arsip',

        'arsip' => $arsip,

        'klien' => $this->klien->findAll(),

        'staf'  => $this->staf->findAll()

    ];

    return view('arsip/edit', $data);
}

    public function update($id)
{
    $this->cekAksesStaf();
    $arsip = $this->arsip->find($id);

   if (!$arsip) {
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
}

if ($arsip['id_staf'] != session()->get('id_user')) {
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
}

    // Ambil file baru
    $file = $this->request->getFile('file_dokumen');

    // Jika upload file baru
    if ($file && $file->isValid() && !$file->hasMoved()) {

        $namaFile = $file->getRandomName();

        $file->move('uploads/arsip', $namaFile);

        // Hapus file lama
        if (!empty($arsip['file_dokumen'])) {

            $path = FCPATH . 'uploads/arsip/' . $arsip['file_dokumen'];

            if (file_exists($path)) {

                unlink($path);

            }

        }

    } else {

        // Gunakan file lama
        $namaFile = $arsip['file_dokumen'];

    }

    $this->arsip->update($id, [

        'id_staf'        => $this->request->getPost('id_staf'),

        'id_klien'       => $this->request->getPost('id_klien'),

        'nomor_perkara'  => $this->request->getPost('nomor_perkara'),

        'judul_arsip'    => $this->request->getPost('judul_arsip'),

        'jenis_perkara'  => $this->request->getPost('jenis_perkara'),

        'tanggal'        => $this->request->getPost('tanggal'),

        'file_dokumen'   => $namaFile,

        'keterangan'     => $this->request->getPost('keterangan')

    ]);

    session()->setFlashdata('success', 'Data arsip berhasil diperbarui.');

    return redirect()->to(base_url('arsip'));
}

   public function hapus($id)
{
    $this->cekAksesStaf();

    $arsip = $this->arsip->find($id);

    if (!$arsip) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    if ($arsip['id_staf'] != session()->get('id_user')) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    // Jika sudah pernah diajukan
    if ($arsip['status_penghapusan'] == 'pending') {

        session()->setFlashdata(
            'error',
            'Data arsip sudah diajukan untuk dihapus dan sedang menunggu persetujuan pimpinan.'
        );

        return redirect()->to(base_url('arsip'));
    }

    // Ubah status menjadi pending
    $this->arsip->update($id, [

        'status_penghapusan' => 'pending'

    ]);

    session()->setFlashdata(
        'success',
        'Permintaan penghapusan berhasil dikirim dan menunggu persetujuan pimpinan.'
    );

    return redirect()->to(base_url('arsip'));
}
public function detail($id)
{
    $arsip = $this->arsip
        ->select('arsip.*, klien.nama_klien, staf.nama AS nama_staf')
        ->join('klien','klien.id_klien=arsip.id_klien')
        ->join('staf','staf.id_staf=arsip.id_staf')
        ->where('arsip.id_arsip',$id)
        ->first();

    if(!$arsip){
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    if(session()->get('role') == 'staf' && $arsip['id_staf'] != session()->get('id_user')){
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = [

        'title' => 'Detail Arsip',

        'arsip' => $arsip

    ];

    return view('arsip/detail',$data);
}
}