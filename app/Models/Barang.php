<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id_barang';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user', 'id_ruangan', 'nama_barang', 'kategori_barang', 'jenis_barang', 'jumlah_barang', 'merk_barang', 'tgl_pencatatan', 'bulan_pencatatan', 'tahun_pencatatan', 'ketersediaan_barang', 'harga_barang', 'gambar_barang'];

    // Dates
    protected $useTimestamps = true;
}
