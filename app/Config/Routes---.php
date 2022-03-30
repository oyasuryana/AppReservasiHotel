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

######### ROUTE UNTUK PENGGUNA #############
$routes->get('/fasilitashotel','Fasilitashotel::tampilFE');
$routes->get('/fasilitaskamar','Fasilitaskamar::tampilFE');


//membuka halaman login
$routes->get('/login', 'Admin::index');

//dijalankan saat menekan tombol login
$routes->post('/login', 'Admin::login');
// menjalankan dashboard
$routes->get('/dashboard','Dashboardpengguna::index',['filter'=>'otentifikasi']);

######### ROUTE UNTUK MENGELOLA FASILITAS HOTEL #############

// menjalankan tampilan fasilitas hotel
$routes->get('/tampil-fasilitas-hotel','Fasilitashotel::index',['filter'=>'otentifikasi']);
// menjalankan tambah
$routes->get('/tambah-fasilitas-hotel','Fasilitashotel::tambah',['filter'=>'otentifikasi']);
$routes->post('/tambah-fasilitas-hotel','Fasilitashotel::tambah',['filter'=>'otentifikasi']);
// untuk menjalankan hapus di fasilitas hotel
$routes->get('/hapus-fasilitas-hotel/(:num)','Fasilitashotel::hapus/$1',['filter'=>'otentifikasi']);
// untuk menjalankan edit di fasilitas hotel
$routes->get('/edit-fasilitas-hotel/(:num)','Fasilitashotel::edit/$1',['filter'=>'otentifikasi']);
$routes->post('/edit-fasilitas-hotel','Fasilitashotel::edit',['filter'=>'otentifikasi']);

######### ROUTE UNTUK MENGELOLA FASILITAS KAMAR #############

// menjalankan tampilan fasilitas kamar
$routes->get('/tampil-fasilitas-kamar','Fasilitaskamar::index',['filter'=>'otentifikasi']);
// menjalankan tambah
$routes->get('/tambah-fasilitas-kamar','Fasilitaskamar::tambah',['filter'=>'otentifikasi']);
$routes->post('/tambah-fasilitas-kamar','Fasilitaskamar::tambah',['filter'=>'otentifikasi']);
// Menjalankan edit difasilitas kamar
$routes->get('/edit-fasilitas-kamar/(:num)','Fasilitaskamar::edit/$1',['filter'=>'otentifikasi']);
// Menjalankan hapus di fasilitas kamar
$routes->get('/hapus-fasilitas-kamar/(:num)','Fasilitaskamar::hapus/$1',['filter'=>'otentifikasi']);
// Menajalankan edit difasilitas kamar
$routes->get('/edit-fasilitas-kamar/(:num)','Fasilitaskamar::edit/$1',['filter'=>'otentifikasi']);
$routes->post('/edit-fasilitas-kamar','Fasilitaskamar::edit',['filter'=>'otentifikasi']);

######### ROUTE UNTUK MENGELOLA KAMAR #############

$routes->get('/tampil-kamar','Kamar::index',['filter'=>'otentifikasi']);
// menjalankan tambah
$routes->get('/tambah-kamar','Kamar::tambah',['filter'=>'otentifikasi']);
$routes->post('/tambah-kamar','Kamar::tambah',['filter'=>'otentifikasi']);
// menjalankan hapus
$routes->get('/hapus-kamar/(:num)','Kamar::hapus/$1',['filter'=>'otentifikasi']);
// menjalankan edit
$routes->get('/edit-kamar/(:num)','Kamar::edit/$1',['filter'=>'otentifikasi']);
$routes->post('/edit-kamar','Kamar::edit',['filter'=>'otentifikasi']);

// menjalankan logout
$routes->get('/logout', 'Admin::index');
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
