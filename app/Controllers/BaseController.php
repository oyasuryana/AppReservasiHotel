<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

// meregister model
use App\Models\Madmin;
use App\Models\Mfasilitashotel;
use App\Models\Mfasilitaskamar;
use App\Models\Mkamar;
use App\Models\Mdetailkamar;
use App\Models\Mreservasi;
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
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    // membuat properti $admin
    protected $admin;
    // membuat properti $fasilitashotel
    protected $fasilitashotel;
    // membuat properti $fasilitaskamar
    protected $fasilitaskamar;
    // membuat properti $kamar
    protected $kamar;
    // membuat properti $detailkamar
    protected $detailkamar;

    // membuat properti $reservasi
    protected $reservasi;
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    // me-load file fasilitaskamar_helper.php di folder app\Helpers
     protected $helpers = ['fasilitaskamar']; 


    /**
     * Constructor.
     */
    
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        
        $this->admin = NEW Madmin;
        // membuat instance  fasilitashotel
        $this->fasilitashotel = NEW Mfasilitashotel;

        // membuat instance  fasilitaskamar
        $this->fasilitaskamar = NEW Mfasilitaskamar;

        // membuat instance  kamar
        $this->kamar = NEW Mkamar;
        
        // membuat instance detail kamar
        $this->detailkamar = NEW Mdetailkamar;

        // membuat instance reservasi
        $this->reservasi = NEW Mreservasi;
    }
}
