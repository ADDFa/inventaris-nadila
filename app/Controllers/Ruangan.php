<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Gedung;
use App\Models\Ruangan as Table;
use App\Models\Barang;

class Ruangan extends BaseController
{
    protected
        $gedung,
        $table,
        $barang,
        $limitData = 5;

    public function __construct()
    {
        $this->gedung = new Gedung();
        $this->table = new Table();
        $this->barang = new Barang();
    }

    // TODO: Fungsi untuk view ruangan
    public function view($view = '', $data = [])
    {
        return view('pages/ruangan/' . $view, $data);
    }

    public function index()
    {
        // ?: Ambil data ruangan dan pagination dari method paginate()
        $paginate = $this->paginate($this->table, $this->limitData);

        $data = [
            'title'             => 'Ruangan',
            'linkAction'        => [
                'create'        => '/ruangan/tambah',
                // 'next'          => '/ruangan?page=2',
                // 'prev'          => '/ruangan?page=2'
            ],
            'ruangan'           => $paginate->data,
            'pagination'        => $paginate->paginate,
            'startNumber'       => $paginate->startNumber,
            'jumlahPages'       => ceil(count($this->table->findAll()) / $this->limitData)
        ];

        return $this->view('index', $data);
    }

    public function create($id = null)
    {
        $data = [
            'title'         => $id ? 'Ubah' : 'Tambah',
            'path'          => $id ? 'update' : 'insert',
            'validation'    => $this->validation,
            'gedung'        => $this->gedung->findAll(),
            'script'        => 'ruangan/create',
            'ruangan'       => $id ? $this->table->find($id) : null
        ];

        return $this->view('manage', $data);
    }

    public function show($id)
    {
        $data = [
            'title'         => 'Detail Ruangan',
            'ruangan'       => $this->table->find($id),
            'barang'        => $this->barang->where('id_ruangan', $id)->findAll()
        ];

        return $this->view('detail', $data);
    }

    public function validasiRuangan($type = null)
    {
        $kapasitasValid = $this->request->getPost('kapasitas') > 0;
        if (!$kapasitasValid) $this->validation->setError('kapasitas', 'Kapasitas Tidak Boleh Kurang Dari 1');

        $namaRules = $this->rule();
        $namaPesan = $this->pesan('Nama Ruangan');
        if (!$type) {
            $namaRules .= '|is_unique[ruangan.nama_ruangan]';
            $namaPesan += ['is_unique'  => 'Ruangan sudah terdaftar.'];
        };

        $validasi = $this->validate([
            'gedung' => [
                'rules'     => 'required|integer',
                'errors'    => [
                    'integer'  => 'Gedung Tidak Ditemukan'
                ]
            ],

            'nama'  => [
                'rules'     => $namaRules,
                'errors'    => $namaPesan
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

    public function getRequestDataRuangan()
    {
        return [
            'id_user'           => $this->getUser()->id_user,
            'id_gedung'         => $this->getIdGedungValid(),
            'nama_ruangan'      => $this->request->getPost('nama'),
            'kapasitas_ruangan' => $this->request->getPost('kapasitas')
        ];
    }

    public function insert()
    {
        // ?: Cek apakah data ruangan valid, gambar ruangan valid, dan apakah gedung terdaftar
        $idGedung = $this->getIdGedungValid();
        if (!$this->validasiRuangan() || !$idGedung) return redirect()->to('/ruangan/tambah')->withInput();
        if (!$this->gambarValid('gambar', 'ruangan')) return redirect()->to('/ruangan/tambah')->withInput()->with('gambarError', $this->getMessageGambarError());

        // ?: Jika valid ambil data ruangan dari method getRequestDataRuangan() serta tambahkan data gambar dan masukkan data ruangan kedalam database
        $data = $this->getRequestDataRuangan() + ['gambar_ruangan' => $this->getNameGambar()];
        $this->table->insert($data);

        // ?: Berikan flash message dan kembalikan ke halaman ruangan pada halaman terakhir
        session()->setFlashdata('crud', [
            'status'    => 'success',
            'message'   => 'Berhasil Menambahkan Data Ruangan'
        ]);

        $page = ceil(count($this->table->findAll()) / $this->limitData);
        return redirect()->to('/ruangan?page=' . $page);
    }

    public function update()
    {
        // ?: Cek apakah ruangan valid, gambar ruangan valid
        $id = $this->request->getPost('id');
        $idGedung = $this->getIdGedungValid();
        if (!$this->validasiRuangan('update') || !$idGedung) return redirect()->to('/ruangan/ubah/' . $id)->withInput();

        // ?: Jika valid ambil data ruangan dari method getRequestDataRuangan() dan update data ruangan tapi sebelum itu cek apakah gambar diupdate atau tidak
        $data = $this->getRequestDataRuangan();

        // ?: Cek apakah gambar diupdate atau tidak, jika gambar diupdate, maka hapus gambar lama dan masukkan gambar baru
        if ($this->request->getFile('gambar')->getError() === 0) {
            if (!$this->gambarValid('gambar', 'ruangan')) return redirect()->to('/ruangan/ubah/' . $id)->withInput()->with('gambarError', $this->getMessageGambarError());

            $dataRuangan = $this->table->find($id);
            if (file_exists('images/ruangan/' . $dataRuangan->gambar_ruangan)) unlink('images/ruangan/' . $dataRuangan->gambar_ruangan);

            $data += ['gambar_ruangan' => $this->getNameGambar()];
        }
        $this->table->update($id, $data);

        // ?: Berikan flash message dan kembalikan ke halaman ubah gedung
        session()->setFlashdata('crud', [
            'status'    => 'success',
            'message'   => 'Ruangan Berhasil Diupdate'
        ]);

        return redirect()->to('/ruangan/ubah/' . $id);
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $ruangan = $this->table->find($id);

        // ?: Delete gambar gedung dan cek apakah gambar gedung terdapat didalam direktori atau tidak. Jika iya, maka hapus gambar tersebut
        $this->table->delete($id);
        if (file_exists('images/ruangan/' . $ruangan->gambar_ruangan)) unlink('images/ruangan/' . $ruangan->gambar_ruangan);

        // ?: Berikan flash message dan kembalikan ke halaman sebelumnya
        session()->setFlashdata('crud', [
            'status'    => 'success',
            'message'   => $ruangan->nama_ruangan . ' Berhasil Dihapus.'
        ]);

        return redirect()->back();
    }
}
