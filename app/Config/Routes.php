<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->post('/login', 'Auth::masuk');

$routes->group('', ['filter' => 'login'], static function ($routes) {
    $routes->get('/dashboard', 'Home::index');

    $routes->get('/gedung', 'Gedung::index');
    $routes->get('/gedung/tambah', 'Gedung::create');
    $routes->post('/gedung/insert', 'Gedung::insert');

    $routes->get('/ruangan', 'Ruangan::index');
    $routes->get('/ruangan/tambah', 'Ruangan::create');
    $routes->get('/ruangan/ubah/(:num)', 'Ruangan::create/$1');
    $routes->get('/ruangan/detail/(:num)', 'Ruangan::show/$1');
    $routes->post('/ruangan/insert', 'Ruangan::insert');
    $routes->post('/ruangan/update', 'Ruangan::update');
    $routes->post('/ruangan/delete', 'Ruangan::delete');

    $routes->get('/barang', 'Barang::index');
    $routes->get('/barang/tambah', 'Barang::create');

    $routes->get('/penyimpanan', 'Penyimpanan::index');
    $routes->get('/penyimpanan/tambah', 'Penyimpanan::create');

    $routes->get('/pembelian', 'Pembelian::index');
    $routes->get('/pembelian/tambah', 'Pembelian::create');

    $routes->get('/laporan', 'Laporan::index');
    $routes->get('/laporan/print', 'Laporan::print');

    $routes->get('/barcode', 'Barcode::index');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
