<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

// Halaman utama
$routes->get('/', 'Home::index');

// Routes untuk Login dan Registrasi
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::authenticate');
$routes->get('logout', 'LoginController::logout');
$routes->get('registrasi', 'RegistrasiController::index');
$routes->post('registrasi', 'RegistrasiController::store');

// Routes khusus untuk admin
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('member/detail', 'AdminController::detail');
    $routes->get('member/verifikasi', 'AdminController::verifikasi');
    $routes->get('produk', 'ProdukController::index');
    $routes->get('produk/create', 'ProdukController::create');
    $routes->post('produk/store', 'ProdukController::store');
    $routes->get('produk/edit/(:num)', 'ProdukController::edit/$1');
    $routes->post('produk/update/(:num)', 'ProdukController::update/$1');
    $routes->get('sertifikat', 'SertifikatController::index');
    $routes->get('sertifikat/create', 'SertifikatController::create');
    $routes->post('sertifikat/store', 'SertifikatController::store');
    $routes->get('sertifikat/edit/(:num)', 'SertifikatController::edit/$1');
    $routes->post('sertifikat/update/(:num)', 'SertifikatController::update/$1');
});

// Routes khusus untuk user
$routes->group('user', ['filter' => 'role:user'], function ($routes) {
    $routes->get('dashboard', 'UserController::dashboard');
    $routes->get('pameran', 'PameranController::index');
    $routes->get('ekspor', 'EksporController::index');
    $routes->get('ekspor/create', 'EksporController::create');
    $routes->post('ekspor/store', 'EksporController::store');
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
 */
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}