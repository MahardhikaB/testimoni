<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Route Produk
$routes->get('/produk', 'ProdukController::index');
$routes->get('/produk/create', 'ProdukController::create');
$routes->post('produk/store', 'ProdukController::store');
$routes->get('/produk/edit/(:num)', 'ProdukController::edit/$1');
$routes->post('/produk/update/(:num)', 'ProdukController::update/$1');


// Route Sertifikat
$routes->get('/sertifikat', 'SertifikatController::index');
$routes->get('/sertifikat/create', 'SertifikatController::create');
$routes->post('sertifikat/store', 'SertifikatController::store');
$routes->get('/sertifikat/edit/(:num)', 'SertifikatController::edit/$1');
$routes->post('/sertifikat/update/(:num)', 'SertifikatController::update/$1');

// Route Admin
$routes->get('/admin/dashboard', function () {
    $data = ['section' => 'dashboard'];
    return view('admin/dashboard', $data);
});

$routes->get('/admin/member/detail', function () {
    $data = ['section' => 'member-detail'];
    return view('admin/member/detail', $data);
});

$routes->get('/admin/member/verifikasi', function () {
    $data = ['section' => 'member-verifikasi'];
    return view('admin/member/verifikasi', $data);
});