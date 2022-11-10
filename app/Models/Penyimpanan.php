<?php

namespace App\Models;

use CodeIgniter\Model;

class Penyimpanan extends Model
{
    protected $table            = 'penyimpanan';
    protected $primaryKey       = 'id_penyimpanan';
    protected $returnType       = 'object';

    // Dates
    protected $useTimestamps = true;
}
