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
            'title'             => 'Ruangan',
            'linkAction'        => [
                'create'        => '/ruangan/tambah',
                'next'          => '/ruangan?page=2',
                'prev'          => '/ruangan?page=2'
            ],
            'ruangan'           => $this->table->findAll()
        ];

        return $this->view('index', $data);
    }

    public function create($id = null)
    {
        $data = [
            'title'         => $id ? 'Ubah' : 'Tambah',
            'path'          => $id ? 'ubah' : 'tambah',
            'validation'    => $this->validation,
            'gedung'        => $this->gedung->findAll(),
            'script'        => 'ruangan/create',
            'ruangan'       => $id ? $this->table->find($id) : null
        ];

        return $this->view('manage', $data);
    }

    public function validasiRuangan()
    {
        $kapasitasValid = $this->request->getPost('kapasitas') > 0;
        if (!$kapasitasValid) $this->validation->setError('kapasitas', 'Kapasitas Tidak Boleh Kurang Dari 1');

        $validasi = $this->validate([
            'gedung' => [
                'rules'     => 'required|integer',
                'errors'    => [
                    'integer'  => 'Gedung Tidak Ditemukan'
                ]
            ],

            'nama'  => [
                'rules'     => $this->rule(),
                'errors'    => $this->pesan('Nama Ruangan')
            ],

            'kapasitas' => [
                'rules'     => 'required|integer',
                'errors'    => [
                    'required'   => 'Kapasitas Tidak Boleh Kosong'
                ]
            ]
        ]);

        return $kapasitasValid && $validasi;
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
            'kapasitas_ruangan' => $this->request->getPost('kapasitas'),
            'gambar_ruangan'    => $this->getNameGambar()
        ];

        try {
            $this->table->insert($data);

            session()->setFlashdata('crud', (object) [
                'status'    => 'success',
                'message'   => 'Berhasil Menambahkan Data Ruangan'
            ]);
        } catch (Exception $e) {
            $e->getMessage();
        }

        return redirect()->to('/ruangan');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $idGedung = $this->getIdGedungValid();
        if (!$this->validasiRuangan() || !$idGedung) return redirect()->to('/ruangan/ubah/' . $id)->withInput();

        $data = [
            'id_user'           => $this->getUser()->id_user,
            'id_gedung'         => $idGedung,
            'nama_ruangan'      => $this->request->getPost('nama'),
            'kapasitas_ruangan' => $this->request->getPost('kapasitas')
        ];

        if ($this->request->getFile('gambar')->getError() === 0) {
            if (!$this->gambarValid('gambar', 'ruangan')) return redirect()->to('/ruangan/ubah/' . $id)->withInput()->with('gambarError', $this->getMessageGambarError());
            $data += ['gambar_ruangan' => $this->getNameGambar()];
        }

        try {
            $this->table->update($id, $data);

            session()->setFlashdata('crud', (object) [
                'status'    => 'success',
                'message'   => 'Ruangan Berhasil Diupdate'
            ]);
        } catch (Exception $e) {
            $e->getMessage();
        }

        return redirect()->to('/ruangan');
    }

    public function delete()
    {
        $id = $this->request->getPost();
        $ruangan = $this->table->find($id);

        try {
            $this->table->delete($id);
            unlink('images/ruangan/' . $ruangan[0]->gambar_ruangan);

            session()->setFlashdata('crud', (object) [
                'status'    => 'success',
                'message'   => $ruangan[0]->nama_ruangan . ' Berhasil Dihapus.'
            ]);
        } catch (Exception $e) {
            $e->getMessage();
        }

        return redirect()->to('/ruangan');
    }
}
