<?php

namespace App\Models;

use CodeIgniter\Model;

class PimpinanModel extends Model
{
    protected $table = 'pimpinan';

    protected $primaryKey = 'id_pimpinan';

    protected $returnType = 'array';

    protected $useTimestamps = true;

    protected $allowedFields = [
        'nama',
        'username',
        'password',
        'email',
        'no_hp'
    ];
}