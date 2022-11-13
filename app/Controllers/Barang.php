<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Barang as Table;
use App\Models\Ruangan;
use Exception;

class Barang extends BaseController
{
    protected
        $table,
        $ruangan,
        $dataLimit = 10;

    public function __construct()
    {
        $this->table = new Table();
        $this->ruangan = new Ruangan();
    }

    public function view($view = '', $data = [])
    {
        return view('pages/barang/' . $view, $data);
    }

    public function index()
    {
        $paginate = $this->paginate($this->table, $this->dataLimit);

        $data = [
            'title'         => 'Barang',
            'linkAction'    => [
                'create'    => '/barang/tambah',
                'next'      => '/barang?page=2',
                'prev'      => '/barang?page=2'
            ],
            'barang'        => $paginate->data,
            'pagination'    => $paginate->paginate,
            'startNumber'   => $paginate->startNumber
        ];

        return $this->view('index', $data);
    }

    public function show($id)
    {
        $data = [
            'title'     => 'Detail Ruangan',
            'barang'   => $this->table->find($id)
        ];

        return $this->view('detail', $data);
    }

    public function create($id = null)
    {
        $data = [
            'title'         => $id ? 'Ubah' : 'Tambah',
            'path'          => $id ? 'update' : 'insert',
            'id'            => $id,
            'jumlahHari'    => cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')),
            'bulan'         => $this->getDataBulan(),
            'validation'    => $this->validation,
            'ruangan'       => $this->ruangan->findAll(),
            'script'        => 'ruangan/create'
        ];

        if ($id) $data += ['barang' => $this->table->find($id)];

        return $this->view('manage', $data);
    }

    public function validasiBarang()
    {
        $jumlahNotValid = $this->request->getPost('jumlah') < 0;
        if ($jumlahNotValid) $this->validation->setError('jumlah', 'Jumlah Barang Tidah Boleh Kurang Dari 0');

        $validation = $this->validate([
            'nama'          => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'  => 'Nama Barang tidak boleh kosong.'
                ]
            ],

            'kategori'      => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'  => 'Kategori Barang tidak boleh kosong.'
                ]
            ],

            'jenis'         => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'  => 'Jenis Barang tidak boleh kosong.'
                ]
            ],

            'jumlah'        => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'  => 'Jumlah Barang tidak boleh kosong.'
                ]
            ],

            'merk'          => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'  => 'Merk Barang tidak boleh kosong.'
                ]
            ],

            'tanggal'       => [
                'rules'     => 'required|max_length[2]',
                'errors'    => [
                    'required'  => 'Tanggal tidak boleh kosong.'
                ]
            ],

            'bulan'         => [
                'rules'     => 'required|max_length[2]',
                'errors'    => [
                    'required'  => 'Bulan tidak boleh kosong.'
                ]
            ],

            'tahun'         => [
                'rules'     => 'required|max_length[4]',
                'errors'    => [
                    'required'  => 'Tahun tidak boleh kosong.'
                ]
            ],

            'ketersediaan'  => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'  => 'Ketersediaan Barang tidak boleh kosong.'
                ]
            ],

            'harga'         => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'  => 'Harga Barang tidak boleh kosong.'
                ]
            ],

            'ruangan'       => [
                'rules'     => 'required|max_length[1]'
            ]
        ]);

        return !$jumlahNotValid && $validation;
    }

    public function getRequestDataBarang()
    {
        return [
            'id_user'               => $this->getUser()->id_user,
            'id_ruangan'            => $this->request->getPost('ruangan'),
            'nama_barang'           => $this->request->getPost('nama'),
            'kategori_barang'       => $this->request->getPost('kategori'),
            'jenis_barang'          => $this->request->getPost('jenis'),
            'jumlah_barang'         => $this->request->getPost('jumlah'),
            'merk_barang'           => $this->request->getPost('merk'),
            'tgl_pencatatan'        => $this->request->getPost('tanggal'),
            'bulan_pencatatan'      => $this->request->getPost('bulan'),
            'tahun_pencatatan'      => $this->request->getPost('tahun'),
            'ketersediaan_barang'   => $this->request->getPost('ketersediaan'),
            'harga_barang'          => $this->request->getPost('harga')
        ];
    }

    public function insert()
    {
        if (!$this->validasiBarang()) return redirect()->to('/barang/tambah')->withInput();
        if (!$this->gambarValid('gambar', 'barang')) return redirect()->to('/barang/tambah')->withInput()->with('gambarError', $this->getMessageGambarError());

        $idRuangan = $this->request->getPost('ruangan');

        $data = $this->getRequestDataBarang() + ['gambar_barang' => $this->getNameGambar()];

        try {
            $dataRuangan = $this->ruangan->find($idRuangan);
            $kapasitasRuangan = $dataRuangan->terisi;
            $kapasitasRuangan += 1;

            $this->ruangan->update($idRuangan, ['terisi' => $kapasitasRuangan]);
            $this->table->insert($data);
            $page = ceil(count($this->table->findAll()) / $this->dataLimit);

            session()->setFlashdata('crud', [
                'status'    => 'success',
                'message'   => 'Berhasil Menambahkan Barang'
            ]);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        return redirect()->to('/barang?page=' . $page);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        if (!$this->validasiBarang()) return redirect()->to('/barang/ubah/' . $id)->withInput();

        $data = $this->getRequestDataBarang($this->request->getPost('ruangan'));

        if ($this->request->getFile('gambar')->getError() === 0) {
            if (!$this->gambarValid('gambar', 'barang')) return redirect()->to('/barang/ubah/' . $id)->withInput()->with('gambarError', $this->getMessageGambarError());

            $barang = $this->table->find($id);
            if (file_exists('images/barang/' . $barang->gambar_barang)) unlink('images/barang/' . $barang->gambar_barang);

            $data += ['gambar_barang' => $this->getNameGambar()];
        }

        try {
            $this->table->update($id, $data);

            session()->setFlashdata('crud', [
                'status'    => 'success',
                'message'   => 'Berhasil mengubah data barang.'
            ]);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        return redirect()->to('/barang/ubah/' . $id);
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $barang = $this->table->find($id);

        try {
            $this->table->delete($barang->id_barang);
            if (file_exists('images/barang/' . $barang->gambar_barang)) unlink('images/barang/' . $barang->gambar_barang);

            session()->setFlashdata('crud', [
                'status'    => 'success',
                'message'   => 'Berhasil menghapus data barang'
            ]);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        return redirect()->back();
    }
}
