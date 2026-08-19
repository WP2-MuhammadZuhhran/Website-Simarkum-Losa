<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\KlienModel;
use Dompdf\Dompdf;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class Laporan extends BaseController
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
    // Ambil nilai filter
    $tanggal = $this->request->getGet('tanggal');
    $jenis   = $this->request->getGet('jenis_perkara');

    // ==========================
    // Query sesuai hak akses
    // ==========================

    if(session()->get('role') == 'pimpinan'){

        $builder = $this->arsip
            ->select('arsip.*, klien.nama_klien, staf.nama')
            ->join('klien', 'klien.id_klien = arsip.id_klien')
            ->join('staf', 'staf.id_staf = arsip.id_staf');

    }else{

        $builder = $this->arsip
            ->select('arsip.*, klien.nama_klien, staf.nama')
            ->join('klien', 'klien.id_klien = arsip.id_klien')
            ->join('staf', 'staf.id_staf = arsip.id_staf')
            ->where('arsip.id_staf', session()->get('id_user'));

    }

    // ==========================
    // Filter Tanggal
    // ==========================

    if(!empty($tanggal)){
        $builder->where('arsip.tanggal', $tanggal);
    }

    // ==========================
    // Filter Jenis Perkara
    // ==========================

    if(!empty($jenis)){
        $builder->like('arsip.jenis_perkara', $jenis);
    }

    // Ambil data
    $arsip = $builder->findAll();

    // Kirim ke View
    return view('laporan/index',[
        'title' => 'Laporan Arsip',
        'arsip' => $arsip
    ]);
}
    public function cetak()
{
    $tanggal = $this->request->getGet('tanggal');
    $jenis   = $this->request->getGet('jenis_perkara');

    if(session()->get('role') == 'pimpinan'){

        $builder = $this->arsip
            ->select('arsip.*, klien.nama_klien, staf.nama')
            ->join('klien','klien.id_klien = arsip.id_klien')
            ->join('staf','staf.id_staf = arsip.id_staf');

    }else{

        $builder = $this->arsip
            ->select('arsip.*, klien.nama_klien, staf.nama')
            ->join('klien','klien.id_klien = arsip.id_klien')
            ->join('staf','staf.id_staf = arsip.id_staf')
            ->where('arsip.id_staf', session()->get('id_user'));

    }

    if(!empty($tanggal)){
        $builder->where('arsip.tanggal', $tanggal);
    }

    if(!empty($jenis)){
        $builder->like('arsip.jenis_perkara', $jenis);
    }

    $arsip = $builder->findAll();

    $html = view('laporan/pdf', [
        'arsip' => $arsip
    ]);

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4','landscape');

    $dompdf->render();

    $dompdf->stream('laporan_arsip.pdf',[
        'Attachment' => false
    ]);
}

    public function excel()
    {
        $tanggal = $this->request->getGet('tanggal');
        $jenis   = $this->request->getGet('jenis_perkara');
if(session()->get('role') == 'pimpinan'){

    $builder = $this->arsip
        ->select('arsip.*, klien.nama_klien, staf.nama')
        ->join('klien','klien.id_klien = arsip.id_klien')
        ->join('staf','staf.id_staf = arsip.id_staf');

}else{

    $builder = $this->arsip
        ->select('arsip.*, klien.nama_klien, staf.nama')
        ->join('klien','klien.id_klien = arsip.id_klien')
        ->join('staf','staf.id_staf = arsip.id_staf')
        ->where('arsip.id_staf', session()->get('id_user'));

}

if(!empty($tanggal)){
    $builder->where('arsip.tanggal', $tanggal);
}

if(!empty($jenis)){
    $builder->like('arsip.jenis_perkara', $jenis);
}

$arsip = $builder->findAll();

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $coklat = '8B6A2F';

        $sheet->mergeCells('A1:F1');
        $sheet->setCellValue('A1','Law Office');

        $sheet->mergeCells('A2:F2');
        $sheet->setCellValue('A2','Syamsul Arif & Partners');

        $sheet->mergeCells('A3:F3');
        $sheet->setCellValue('A3','Advocate & Consultant At Law');

        $sheet->mergeCells('A5:F5');
        $sheet->setCellValue('A5','LAPORAN DATA ARSIP PERKARA');

        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(24);
        $sheet->getStyle('A3')->getFont()->setItalic(true)->setUnderline(true)->setSize(12);
        $sheet->getStyle('A5')->getFont()->setBold(true)->setSize(16);

        $sheet->getStyle('A1:A5')->getFont()->getColor()->setRGB($coklat);

        $sheet->getStyle('A5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A7','Tanggal Cetak');
        $sheet->setCellValue('B7',':');
        $sheet->setCellValue('C7',date('d F Y'));

        $sheet->setCellValue('A8','Dicetak Oleh');
        $sheet->setCellValue('B8',':');
        $sheet->setCellValue('C8',session()->get('nama'));

        $sheet->setCellValue('A10','No');
        $sheet->setCellValue('B10','Nomor Perkara');
        $sheet->setCellValue('C10','Nama Klien');
        $sheet->setCellValue('D10','Judul Arsip');
        $sheet->setCellValue('E10','Jenis Perkara');
        $sheet->setCellValue('F10','Tanggal');

        $sheet->getStyle('A10:F10')->applyFromArray([

            'font'=>[
                'bold'=>true
            ],

            'fill'=>[
                'fillType'=>Fill::FILL_SOLID,
                'startColor'=>[
                    'rgb'=>'E5E5E5'
                ]
            ],

            'alignment'=>[
                'horizontal'=>Alignment::HORIZONTAL_CENTER
            ]

        ]);

        $baris = 11;
        $no = 1;

        foreach($arsip as $a){

            $sheet->setCellValue('A'.$baris,$no++);
            $sheet->setCellValue('B'.$baris,$a['nomor_perkara']);
            $sheet->setCellValue('C'.$baris,$a['nama_klien']);
            $sheet->setCellValue('D'.$baris,$a['judul_arsip']);
            $sheet->setCellValue('E'.$baris,$a['jenis_perkara']);
            $sheet->setCellValue('F'.$baris,date('d-m-Y',strtotime($a['tanggal'])));

            $baris++;
        }

        foreach(range('A','F') as $kolom){

            $sheet->getColumnDimension($kolom)->setAutoSize(true);

        }

        $sheet->getStyle('A10:F'.($baris-1))
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        $sheet->setCellValue('A'.($baris+1),'Jumlah Arsip : '.count($arsip));
        $sheet->getStyle('A'.($baris+1))->getFont()->setBold(true);

        $sheet->setCellValue('E'.($baris+4),'Jakarta, '.date('d F Y'));
        $sheet->setCellValue('E'.($baris+6),'Mengetahui,');

        $sheet->setCellValue('E'.($baris+10),'Andi Fatmawati, S.H.');
        $sheet->setCellValue('E'.($baris+11),'Pimpinan');

        $sheet->getStyle('E'.($baris+10))->getFont()->setBold(true)->setUnderline(true);

        $sheet->setCellValue('A'.($baris+15),'Jl. Hadiah Utama II F No.1530');
        $sheet->setCellValue('A'.($baris+16),'Jelambar, Jakarta Barat 11460');
        $sheet->setCellValue('A'.($baris+17),'Phone : +62 21 22285832');
        $sheet->setCellValue('A'.($baris+18),'Email : saplawoffice@gmail.com');

        $writer = new Xlsx($spreadsheet);

        $filename = 'Laporan_Arsip_'.date('dmY_His').'.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

        exit;
    }
}