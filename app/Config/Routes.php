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

/**
 * @var RouteCollection $routes
 */


// Halaman utama
$routes->get('/', 'AuthController::loginForm');

// Routes untuk Login dan Registrasi
$routes->get('login', 'AuthController::loginForm');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');
$routes->get('registrasi', 'AuthController::registerForm');
$routes->post('signUp', 'AuthController::register');



// Routes khusus untuk admin
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('member/verifikasi/(:segment)', 'AdminController::verifikasi/$1');
    $routes->post('member/verifikasi/', 'AdminController::updateVerifikasi');
    $routes->post('dashboard/verifikasi', 'AdminController::verifikasi');
    $routes->get('dashboard/verifikasi/update/(:num)/(:alpha)', 'AdminController::updateVerifikasi/$1/$2');
    $routes->post('dashboard/verifikasi/update/(:num)/(:alpha)', 'AdminController::updateVerifikasi/$1/$2');

    $routes->get('member/list', 'AdminController::memberList');

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
    $routes->get('profile', 'UserController::profile');
    $routes->get('pameran', 'PameranController::index');

    // Route Legalitas
    $routes->get('legalitas', 'LegalitasController::index');
    $routes->get('legalitas/create', 'LegalitasController::create');
    $routes->post('legalitas/store', 'LegalitasController::store');
    $routes->get('legalitas/edit/(:num)', 'LegalitasController::edit/$1');
    $routes->post('legalitas/update/(:num)', 'LegalitasController::update/$1');

    // Route Ekspor
    $routes->get('ekspor', 'EksporController::index');
    $routes->get('ekspor/create', 'EksporController::create');
    $routes->post('ekspor/store', 'EksporController::store');

    // Route Sertifikat
    $routes->get('sertifikat', 'SertifikatController::index');
    $routes->get('sertifikat/create', 'SertifikatController::create');
    $routes->post('sertifikat/store', 'SertifikatController::store');
    $routes->get('sertifikat/edit/(:num)', 'SertifikatController::edit/$1');
    $routes->post('sertifikat/update/(:num)', 'SertifikatController::update/$1');

    // Route Progress
    $routes->get('progress', 'ProgressController::index');
    $routes->get('progress/tambah', 'ProgressController::add');
    $routes->get('progress/edit/(:num)', 'ProgressController::edit/$1');
    $routes->post('progress/update/(:num)', 'ProgressController::update/$1');
    $routes->get('progress/detail/(:num)', 'ProgressController::detail/$1');
    $routes->post('progress/save', 'ProgressController::save');

    // Route Produk
    $routes->get('produk', 'ProdukController::index');
    $routes->get('produk/create', 'ProdukController::create');
    $routes->post('produk/store', 'ProdukController::store');
    $routes->get('produk/edit/(:num)', 'ProdukController::edit/$1');
    $routes->post('produk/update/(:num)', 'ProdukController::update/$1');

    // Route Pameran
    $routes->get('pameran', 'PameranController::index');
    $routes->get('pameran/create', 'PameranController::create');
    $routes->post('pameran/store', 'PameranController::store');
    $routes->get('pameran/edit/(:num)', 'PameranController::edit/$1');
    $routes->post('pameran/update/(:num)', 'PameranController::update/$1');

    // Route Ekspor
    $routes->get('ekspor', 'EksporController::index');
    $routes->get('ekspor/create', 'EksporController::create');
    $routes->post('ekspor/store', 'EksporController::store');
    $routes->get('ekspor/edit/(:num)', 'EksporController::edit/$1');
    $routes->post('ekspor/update/(:num)', 'EksporController::update/$1');

    // Route Program Pembinaan
    $routes->get('program', 'ProgramController::index');
    $routes->get('program/create', 'ProgramController::create');
    $routes->post('program/store', 'ProgramController::store');
    $routes->get('program/edit/(:num)', 'ProgramController::edit/$1');
    $routes->post('program/update/(:num)', 'ProgramController::update/$1');
});