<?php

namespace App\Models;

use CodeIgniter\Model;

class Penyimpanan extends Model
{
    protected $table            = 'penyimpanan';
    protected $primaryKey       = 'id_penyimpanan';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user', 'id_ruangan', 'id_barang', 'kapasitas', 'tgl_penyimpanan', 'bulan_penyimpanan', 'tahun_penyimpanan'];

    // Dates
    protected $useTimestamps = true;
}
