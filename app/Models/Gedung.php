<?php

namespace App\Models;

use CodeIgniter\Model;

class Gedung extends Model
{
    protected $table            = 'gedung';
    protected $primaryKey       = 'id_gedung';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user', 'nama_gedung', 'tgl_pencatatan', 'bulan_pencatatan', 'tahun_pencatatan', 'gambar_gedung'];

    // Dates
    protected $useTimestamps = true;

    // Validation
    protected $validationRules      = [];

    protected $validationMessages   = [];
}
