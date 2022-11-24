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
        $limitData = 10;

    public function __construct()
    {
        $this->table = new Table();
        $this->ruangan = new Ruangan();
    }

    // TODOL Fungsi untuk view barang
    public function view($view = '', $data = [])
    {
        return view('pages/barang/' . $view, $data);
    }

    public function index()
    {
        // ?: Ambil data barang dan pagination dari method paginate()
        $paginate = $this->paginate($this->table, $this->limitData);

        $data = [
            'title'         => 'Barang',
            'linkAction'    => [
                'create'    => '/barang/tambah',
                // 'next'      => '/barang?page=2',
                // 'prev'      => '/barang?page=2'
            ],
            'barang'        => $paginate->data,
            'pagination'    => $paginate->paginate,
            'startNumber'   => $paginate->startNumber,
            'jumlahPages'   => ceil(count($this->table->findAll()) / $this->limitData)
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
        // ?: Jumlah barang tidak boleh kurang dari 0
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
                'rules'     => 'required|max_length[11]'
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
        // ?: Cek apakah data barang dan gambar barang dari input valid atau tidak
        if (!$this->validasiBarang()) return redirect()->to('/barang/tambah')->withInput();
        if (!$this->gambarValid('gambar', 'barang')) return redirect()->to('/barang/tambah')->withInput()->with('gambarError', $this->getMessageGambarError());

        // ?: Jika valid ambil data barang dari method gerRequestDataBarang dan tambahkan data gambar barang
        $idRuangan = $this->request->getPost('ruangan');
        $data = $this->getRequestDataBarang() + ['gambar_barang' => $this->getNameGambar()];

        // ?: Tambahkan isi ruangan sebanyak jumlah barang dan update kolom terisi pada database ruangan
        $ruanganTerisi = $this->ruangan->find($idRuangan)->terisi;
        $updateRuanganTerisi = $ruanganTerisi + $data['jumlah_barang'];
        $this->ruangan->update($idRuangan, ['terisi' => $updateRuanganTerisi]);

        // ?: Inset data barang kedalam database barang
        $this->table->insert($data);

        // ?: Berikan flash message dan kembalikan ke halaman barang pada halaman terakhir
        session()->setFlashdata('crud', [
            'status'    => 'success',
            'message'   => 'Berhasil Menambahkan Barang'
        ]);

        $page = ceil(count($this->table->findAll()) / $this->limitData);
        return redirect()->to('/barang?page=' . $page);
    }

    public function update()
    {
        // ?: Cek apakah data inputan valid atau tidak. Jika valid ambil data barang dari method getRequestDataBarang()
        $id = $this->request->getPost('id');
        if (!$this->validasiBarang()) return redirect()->to('/barang/ubah/' . $id)->withInput();

        $data = $this->getRequestDataBarang($this->request->getPost('ruangan'));

        // ?: Cek apakah ada gambar yang diupload atau tidak, jika ada maka hapus gambar lama dan gantikan dengan gambar baru pada direktori serta tambahkan data gambar kedalam variable $data
        if ($this->request->getFile('gambar')->getError() === 0) {
            if (!$this->gambarValid('gambar', 'barang')) return redirect()->to('/barang/ubah/' . $id)->withInput()->with('gambarError', $this->getMessageGambarError());

            $barang = $this->table->find($id);
            if (file_exists('images/barang/' . $barang->gambar_barang)) unlink('images/barang/' . $barang->gambar_barang);
            $data += ['gambar_barang' => $this->getNameGambar()];
        }

        $dataBarang = $this->table->find($id);

        // ?: Cek apakah jumlah barang berubah atau tidak. Jika iya maka kurangi isi ruangan sebanyak jumlah sebelumnya dan tambahkan isi ruangan sebanyak jumlah terbaru
        if ($dataBarang->jumlah_barang != $data['jumlah_barang']) {
            $dataRuangan = $this->ruangan->find($dataBarang->id_ruangan);

            $jumlahBarangSebelumnya = $dataBarang->jumlah_barang;
            $ruanganTerisi = $dataRuangan->terisi;
            $updateRuanganTerisi = $ruanganTerisi - $jumlahBarangSebelumnya + $data['jumlah_barang'];
            $this->ruangan->update($dataBarang->id_ruangan, ['terisi'   => $updateRuanganTerisi]);
        };

        // ?: Cek apakah barang berpindah ruangan atau tidak. Jika iya, maka kosongkan isi ruangan lama sebanyak jumlah barang dan isi ruangan baru sebanyak jumlah barang
        if ($dataBarang->id_ruangan != $data['id_ruangan']) {
            $dataRuangan = $this->ruangan->find($dataBarang->id_ruangan);

            $isiRuanganLama = $dataRuangan->terisi;
            $updateRuanganTerisi = $isiRuanganLama - $data['jumlah_barang'];
            $this->ruangan->update($dataBarang->id_ruangan, ['terisi'   => $updateRuanganTerisi]);

            $ruanganBaru = $this->ruangan->find($data['id_ruangan']);

            $isiRuanganBaru = $ruanganBaru->terisi;
            $updateRuanganTerisi = $isiRuanganBaru + $data['jumlah_barang'];
            $this->ruangan->update($data['id_ruangan'], ['terisi'   => $updateRuanganTerisi]);
        }

        // ?: Update data barang dan berikan flash message
        $this->table->update($id, $data);
        session()->setFlashdata('crud', [
            'status'    => 'success',
            'message'   => 'Berhasil mengubah data barang.'
        ]);

        return redirect()->to('/barang/ubah/' . $id);
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $barang = $this->table->find($id);

        // ?: Hapus isi ruangan sebanyak jumlah barang
        $ruanganTerisi = $this->ruangan->find($barang->id_ruangan)->terisi;
        $ruanganTerisi -= $barang->jumlah_barang;
        $this->ruangan->update($barang->id_ruangan, ['terisi' => $ruanganTerisi]);

        // ?: Hapus data barang dan hapus gambar barang jika gambar ada
        $this->table->delete($barang->id_barang);
        if (file_exists('images/barang/' . $barang->gambar_barang)) unlink('images/barang/' . $barang->gambar_barang);

        // ?: Berikan flash message dan kembalikan ke halaman sebelumnya
        session()->setFlashdata('crud', [
            'status'    => 'success',
            'message'   => 'Berhasil menghapus data barang'
        ]);

        return redirect()->back();
    }
}
