<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    protected $table = 'arsip';

    protected $primaryKey = 'id_arsip';

    protected $returnType = 'array';

    protected $useTimestamps = true;

    protected $allowedFields = [

        'id_staf',

        'id_klien',

        'nomor_perkara',

        'judul_arsip',

        'jenis_perkara',

        'tanggal',

        'file_dokumen',

        'keterangan',

        'status_penghapusan'

    ];
   public function statistikBulanan()
{
    return $this->select("
            MONTH(tanggal) as bulan,
            COUNT(id_arsip) as total
        ")
        ->groupBy("MONTH(tanggal)")
        ->orderBy("MONTH(tanggal)")
        ->findAll();
}
}