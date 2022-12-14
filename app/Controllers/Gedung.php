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

    // TODO: Fungsi untuk view gedung
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
            'dataGedung'    => $paginate->data,
            'jumlahPages'   => ceil(count($this->table->findAll()) / $this->limitData)
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
        // ?: Cek apakah data input dari gedung valid atau tidak
        if (!$this->validasiGedung()) return redirect()->to('/gedung/tambah')->withInput();
        if (!$this->gambarValid('gambar', 'gedung')) return redirect()->to('/gedung/tambah')->withInput()->with('gambarError', $this->getMessageGambarError());

        // ?: Jika valid masukkan data kedalam database
        $data = [
            'id_user'           => $this->getUser()->id_user,
            'nama_gedung'       => $this->request->getPost('nama'),
            'tgl_pencatatan'    => $this->request->getPost('tanggal'),
            'bulan_pencatatan'  => $this->request->getPost('bulan'),
            'tahun_pencatatan'  => $this->request->getPost('tahun'),
            'gambar_gedung'     => $this->getNameGambar()
        ];
        $this->table->insert($data);

        // ?: Berikan flash message dan kembalikan ke halaman gedung pada halaman terakhir
        session()->setFlashdata('crud', [
            'status'    => 'success',
            'message'   => 'Berhasil Menambahkan Data Gedung'
        ]);

        $page = ceil(count($this->table->findAll()) / $this->limitData);
        return redirect()->to('/gedung?page=' . $page);
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
