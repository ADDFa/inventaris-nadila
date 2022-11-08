<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;

use App\Models\Gedung as tbGedung;
use App\Models\User;
use DateTime;
use Exception;

class Gedung extends BaseController
{
    protected $table, $tbUser;

    public function __construct()
    {
        $this->table = new tbGedung();
        $this->tbUser = new User();
    }

    public function view($view = '', $data = [])
    {
        return view('pages/gedung/' . $view, $data);
    }

    public function index()
    {
        $paginate = $this->paginate($this->table, 2);

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
            'validation'    => Services::validation(),
            'script'        => 'gedung/create',
            'jumlahHari'    => cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')),
            'bulan'         => $this->getDataBulan()
        ];

        return $this->view('tambah', $data);
    }

    private function validasiGedung()
    {
        return $this->validate([
            'nama' => [
                'rules'     => $this->rule(),
                'errors'    => $this->pesan('Nama Gedung')
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

        if (!$this->gambarValid('gambar')) return redirect()->to('/gedung/tambah')->withInput()->with('gambarError', $this->getMessageGambarError());

        $user = $this->tbUser->where('username', session('username'))->find()[0];

        $data = [
            'id_user'           => $user->id_user,
            'nama_gedung'       => $this->request->getPost('nama'),
            'tgl_pencatatan'    => $this->request->getPost('tanggal'),
            'bulan_pencatatan'  => $this->request->getPost('bulan'),
            'tahun_pencatatan'  => $this->request->getPost('tahun'),
            'gambar_gedung'     => $this->getNameGambar()
        ];

        try {
            $this->table->insert($data);

            session()->setFlashdata('crud', (object) [
                'status'    => 'success',
                'message'   => 'Berhasil Menambahkan Data Gedung'
            ]);
        } catch (Exception $e) {
            var_dump($e->getMessage());
            sleep(3);
        }

        return redirect()->to('/gedung');
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
