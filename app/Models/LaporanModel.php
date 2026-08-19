<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';

    protected $primaryKey = 'id_laporan';

    protected $returnType = 'array';

    protected $useTimestamps = true;

    protected $allowedFields = [

        'id_arsip',

        'periode',

        'tanggal_laporan',

        'jenis_laporan'

    ];
}