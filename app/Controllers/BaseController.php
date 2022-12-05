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
     * Custom
     */
    protected $maxImageSize = 2000000;

    protected function checkImageValid($name)
    {
        $image = $this->request->getFile($name);
        $type = explode('/', $image->getMimeType());

        if ($image->getError() != 0) {
            $this->validator->setError('image', 'Gambar Tidak Boleh Kosong');

            return false;
        }

        if ($image->getSize() > $this->maxImageSize) {
            $this->validator->setError('image', 'Ukuran Gambar Terlalu Besar, Max 2MB');

            return false;
        }

        if ($type[0] !== 'image') {
            $this->validator->setError('image', 'Yang Anda Upload Bukan Gambar');

            return false;
        }

        return $image->getRandomName();
    }

    protected function getPositifNumber($value)
    {
        $result = (int) $value;
        if ($result < 0) $result *= -1;

        return $result;
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
