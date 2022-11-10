<?php

namespace App\Models;

use CodeIgniter\Model;

class Ruangan extends Model
{
    protected $table            = 'ruangan';
    protected $primaryKey       = 'id_ruangan';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user', 'id_gedung', 'nama_ruangan', 'gambar_ruangan'];

    // Dates
    protected $useTimestamps = true;
}
