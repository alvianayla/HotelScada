<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->get('/hotel', 'Home::kamar');
$routes->get('/inv', 'Home::invoice');
$routes->get('/fhotel', 'Home::fasilitas');
$routes->get('/reservasi/print', 'Home::print');


 $routes->get('/cek', 'Home::cari');
// $routes->post('/cek', 'Home::cari');

$routes->get('/petugas', 'PetugasController::index');
$routes->post('/petugas/login', 'PetugasController::login');
$routes->get('/petugas', 'PetugasController::logout');
$routes->get('/petugas/dashboard', 'DashboardPetugas::index', ['filter'=>'otentifikasi']);


$routes->get('/kamar', 'PetugasController::tampilkamar');
$routes->get('/kamar/tambah', 'PetugasController::tambahkamar');
$routes->post('/kamar/simpan', 'PetugasController::simpankamar');
$routes->get('/kamar/edit/(:num)', 'PetugasController::editkamar/$1');
$routes->get('/kamar/editfoto/(:num)', 'PetugasController::editfoto/$1');
$routes->post('/kamar/updatefoto', 'PetugasController::updatefoto');
$routes->post('/kamar/update', 'PetugasController::updatekamar');
$routes->get('/kamar/hapus/(:num)', 'PetugasController::hapuskamar/$1');

$routes->get('/fasilitas-hotel', 'FasilitasHotelController::tampilfasilitashotel');
$routes->get('/fasilitas-hotel/tambah', 'FasilitasHotelController::tambahfasilitashotel');
$routes->post('/fasilitas-hotel/simpan', 'FasilitasHotelController::simpanfasilitashotel');
$routes->get('/fasilitas-hotel/edit/(:num)', 'FasilitasHotelController::editfasilitashotel/$1');
$routes->get('/fasilitas-hotel/editfoto/(:num)', 'FasilitasHotelController::editfoto/$1');
$routes->post('/fasilitas-hotel/updatefoto', 'FasilitasHotelController::updatefoto');
$routes->post('/fasilitas-hotel/update', 'FasilitasHotelController::updatefasilitashotel');
$routes->get('/fasilitas-hotel/hapus/(:num)', 'FasilitasHotelController::hapusfasilitashotel/$1');

$routes->get('/reservasi', 'ReservasiController::index');
$routes->post('/reservasi', 'Reservasi::index',['filter'=>'otentifikasi']);
$routes->get('/form-reservasi', 'Home::form_reservasi');
$routes->get('/reservasi/edit/(:num)', 'ReservasiController::edit/$1');
$routes->get('/reservasi/in/(:num)', 'ReservasiController::in/$1');
$routes->get('/reservasi/out/(:num)', 'ReservasiController::out/$1');
$routes->get('/reservasi/selesai/(:num)', 'ReservasiController::selesai/$1');
$routes->post('/reservasi/proses', 'Home::reservasi');
$routes->get('/invoice/(:num)', 'ReservasiController::invoice/$1');
$routes->get('/pesan', 'ReservasiController::simpan');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
