<?php

namespace App\Models;

use CodeIgniter\Model;

class StafModel extends Model
{
    protected $table = 'staf';

    protected $primaryKey = 'id_staf';

    protected $returnType = 'array';

    protected $useTimestamps = true;

    protected $allowedFields = [
        'id_pimpinan',
        'nama',
        'username',
        'password',
        'email',
        'no_hp'
    ];
}