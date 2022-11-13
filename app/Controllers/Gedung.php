<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Gedung as Table;
use Exception;

class Gedung extends BaseController
{
    protected
        $table,
        $tbUser,
        $limitData = 3;

    public function __construct()
    {
        $this->table = new Table();
    }

    public function view($view = '', $data = [])
    {
        return view('pages/gedung/' . $view, $data);
    }

    public function index()
    {
        $paginate = $this->paginate($this->table, $this->limitData);

        $data = [
            'title'         => 'Gedung',
            'style'         => 'gedung',
            'linkAction'    => [
                'create'    => '/gedung/tambah'
            ],
            'pagination'    => $paginate->paginate,
            'dataGedung'    => $paginate->data
        ];

        return $this->view('index', $data);
    }

    public function create()
    {
        $data = [
            'title'         => 'Tambah Gedung',
            'validation'    => $this->validation,
            'script'        => 'gedung/create',
            'jumlahHari'    => cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')),
            'bulan'         => $this->getDataBulan()
        ];

        return $this->view('manage', $data);
    }

    private function validasiGedung()
    {
        $pesan = $this->pesan('Nama Gedung');
        $pesan += ['is_unique'  => 'Gedung sudah ada terdaftar.'];

        return $this->validate([
            'nama' => [
                'rules'     => $this->rule() . '|is_unique[gedung.nama_gedung]',
                'errors'    => $pesan
            ],

            'tanggal' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Tanggal Tidak Boleh Kosong'
                ]
            ],

            'bulan' => [
                'rules'    => 'required',
                'errors'    => [
                    'required'  => 'Bulan Tidak Boleh Kosong'
                ]
            ],

            'tahun' => [
                'rules'    => 'required',
                'errors'    => [
                    'required'  => 'Tahun Tidak Boleh Kosong'
                ]
            ]
        ]);
    }

    public function insert()
    {
        if (!$this->validasiGedung()) return redirect()->to('/gedung/tambah')->withInput();
        if (!$this->gambarValid('gambar', 'gedung')) return redirect()->to('/gedung/tambah')->withInput()->with('gambarError', $this->getMessageGambarError());

        $data = [
            'id_user'           => $this->getUser()->id_user,
            'nama_gedung'       => $this->request->getPost('nama'),
            'tgl_pencatatan'    => $this->request->getPost('tanggal'),
            'bulan_pencatatan'  => $this->request->getPost('bulan'),
            'tahun_pencatatan'  => $this->request->getPost('tahun'),
            'gambar_gedung'     => $this->getNameGambar()
        ];

        try {
            $this->table->insert($data);

            session()->setFlashdata('crud', [
                'status'    => 'success',
                'message'   => 'Berhasil Menambahkan Data Gedung'
            ]);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $to = '/gedung?page=' . ceil(count($this->table->findAll()) / $this->limitData);
        return redirect()->to($to);
    }

    public function update()
    {
        return redirect()->to('/gedung');
    }

    public function delete()
    {
        return redirect()->to('/gedung');
    }
}
