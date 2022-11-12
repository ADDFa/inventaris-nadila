<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\Services;

use App\Models\User;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];


    /**
     * Validation
     */
    protected $validation;

    protected $lengthTanggal = '|max_length[2]',
        $lengthMax = '40';

    protected function rule($rule = false)
    {
        switch ($rule) {
            case 'tanggal':
                return 'requred|' . $this->lengthBulan;

            default:
                return 'required|' . 'max_length[' . $this->lengthMax . ']';
        }
    }

    public function pesan($name = '')
    {
        return [
            'required'      => $name . ' Tidak Boleh Kosong',
            'max_length'    => $name . ' Tidak Boleh Lebih Dari ' . $this->lengthMax . ' Karakter'
        ];
    }

    /**
     * Validation Image.
     */

    private $gambarError, $gambarSize = 1000000, $namaGambar = '';

    protected function gambarValid($name, $dir)
    {
        $gambar = $this->request->getFile($name);

        if ($gambar->getError() === 4) {
            $this->gambarError = 'Gambar Tidak Boleh Kosong';
            return false;
        }

        if ($gambar->getExtension() !== 'png' && $gambar->getExtension() !== 'jpg' && $gambar->getExtension() !== 'jpeg') {
            $this->gambarError = 'Ekstensi Gambar Tidak Valid';
            return false;
        }

        if ($gambar->getSize() >= $this->gambarSize) {
            $error = 'Ukuran Gambar Terlalu Besar | Max ' . floor($this->gambarSize / 1000000) . 'MB';

            if ($this->gambarSize < 1024) {
                $error = 'Ukuran Gambar Terlalu Besar | Max ' . $this->gambarSize . 'KB';
            }

            $this->gambarError = $error;

            return false;
        }

        $this->namaGambar = $gambar->getRandomName();

        $gambar->move('images/' . $dir, $this->namaGambar);

        return true;
    }

    protected function getNameGambar()
    {
        return $this->namaGambar;
    }

    protected function setSizeGambar(int $size)
    {
        $this->gambarSize = $size;
    }

    protected function getMessageGambarError()
    {
        return $this->gambarError;
    }

    /**
     * Data Bulan.
     */

    private $bulan = [
        '1'     => 'Jan',
        '2'     => 'Feb',
        '3'     => 'Mar',
        '4'     => 'Apr',
        '5'     => 'Mei',
        '6'     => 'Jun',
        '7'     => 'Jul',
        '8'     => 'Agu',
        '9'     => 'Sep',
        '10'    => 'Okt',
        '11'    => 'Nov',
        '12'    => 'Des'
    ];

    protected function getDataBulan()
    {
        return $this->bulan;
    }

    /**
     * Pagination.
     */

    protected function paginate($table, int $limit)
    {
        $originUri = base_url() . $_SERVER['PATH_INFO'];

        $jumlahHalaman = ceil($table->countAllResults() / $limit);
        $page = $this->request->getGet('page') ?? 1;
        $prev = ($page <= 2) ? $originUri : $originUri . '?page=' . $page - 1;
        $prevDisabled = ($page <= 1) ? 'is-disabled' : '';
        $next = ($page < $jumlahHalaman) ? $originUri . '?page=' . $page + 1 : $originUri . '?page=' . $page;
        $nextDisabled = ($jumlahHalaman <= $page) ? 'is-disabled' : '';
        $offset = $limit * ($page - 1);
        $data = $this->table->findAll($limit);

        if ($page > 1) {
            $data = $this->table->findAll($limit, $offset);
        }

        $pagination =
            '<div class="footer d-flex justify-content-end px-5">' .
            '<div class="btn-group" role="group" aria-label="Basic example">' .
            '<a href="' . $prev . '" class="btn btn-default ' . $prevDisabled . '">Prev</a>' .
            '<button type="button" class="btn btn-default">' . $page . '</button>' .
            '<a href="' . $next . '" class="btn btn-default ' . $nextDisabled . '">Next</a>' .
            '</div>' .
            '</div>';

        return (object) [
            'paginate' => $pagination,
            'startNumber'   => $offset + 1,
            'data'     => $data
        ];
    }

    /**
     * User.
     */
    private $user;

    protected function getUser()
    {
        return session('user') ?? false;
    }

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        $this->validation = Services::validation();
        $this->user = new User();
    }
}
