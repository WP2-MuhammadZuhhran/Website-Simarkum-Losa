<?php

namespace App\Models;

use CodeIgniter\Model;

class KlienModel extends Model
{
    protected $table = 'klien';

    protected $primaryKey = 'id_klien';

    protected $returnType = 'array';

    protected $useTimestamps = true;

    protected $allowedFields = [
        'id_staf',
        'nama_klien',
        'alamat',
        'no_hp',
        'email',
        'status_penghapusan'
    ];
}