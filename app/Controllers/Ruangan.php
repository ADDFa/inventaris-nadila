<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Gedung;
use App\Models\Ruangan as Table;
use Exception;

class Ruangan extends BaseController
{
    private $gedung, $table;

    public function __construct()
    {
        $this->gedung = new Gedung();
        $this->table = new Table();
    }

    public function view($view = '', $data = [])
    {
        return view('pages/ruangan/' . $view, $data);
    }

    public function index()
    {
        $data = [
            'title'     => 'Ruangan',
            'linkAction' => [
                'create' => '/ruangan/tambah',
                'next'      => '/ruangan?page=2',
                'prev'      => '/ruangan?page=2'
            ]
        ];

        return $this->view('index', $data);
    }

    public function create()
    {
        $data = [
            'title'         => 'Tambah Ruangan',
            'validation'    => $this->validation,
            'gedung'        => $this->gedung->findAll(),
            'script'        => 'ruangan/create'
        ];

        return $this->view('tambah', $data);
    }

    public function validasiRuangan()
    {
        return $this->validate([
            'gedung' => [
                'rules'     => 'required|integer',
                'errors'    => [
                    'integer'  => 'Gedung Tidak Ditemukan'
                ]
            ],

            'nama'  => [
                'rules'     => $this->rule(),
                'errors'    => $this->pesan('Nama Ruangan')
            ]
        ]);
    }

    public function getIdGedungValid()
    {
        if ($x = $this->gedung->find($this->request->getPost('gedung')) ?? false) return $x->id_gedung;

        $this->validation->setError('gedung', 'Gedung Tidak Ditemukan');
        return false;
    }

    public function insert()
    {
        $idGedung = $this->getIdGedungValid();
        if (!$this->validasiRuangan() || !$idGedung) return redirect()->to('/ruangan/tambah')->withInput();
        if (!$this->gambarValid('gambar', 'ruangan')) return redirect()->to('/ruangan/tambah')->withInput()->with('gambarError', $this->getMessageGambarError());

        $data = [
            'id_user'           => $this->getUser()->id_user,
            'id_gedung'         => $idGedung,
            'nama_ruangan'      => $this->request->getPost('nama'),
            'gambar_ruangan'    => $this->getNameGambar()
        ];

        try {
            $this->table->insert($data);

            session()->setFlashdata('crud', (object) [
                'status'    => 'success',
                'message'   => 'Berhasil Menambahkan Data Ruangan'
            ]);
        } catch (Exception $e) {
            var_dump($e->getMessage());
            sleep(3);
        }

        return redirect()->to('/ruangan');
    }

    public function update()
    {
        return redirect()->to('/ruangan');
    }

    public function delete()
    {
        return redirect()->to('/ruangan');
    }
}
