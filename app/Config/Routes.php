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

// Route Pameran
$routes->get('/pameran', 'PameranController::index');
$routes->get('/pameran/create', 'PameranController::create');
$routes->post('pameran/store', 'PameranController::store');
$routes->get('/pameran/edit/(:num)', 'PameranController::edit/$1');
$routes->post('/pameran/update/(:num)', 'PameranController::update/$1');

// Route Ekspor
$routes->get('/ekspor', 'EksporController::index');
$routes->get('/ekspor/create', 'EksporController::create');
$routes->post('ekspor/store', 'EksporController::store');
$routes->get('/ekspor/edit/(:num)', 'EksporController::edit/$1');
$routes->post('/ekspor/update/(:num)', 'EksporController::update/$1');

// Route Media
$routes->get('/media', 'MediaController::index');
$routes->get('/media/create', 'MediaController::create');
$routes->post('media/store', 'MediaController::store');
$routes->get('/media/edit/(:num)', 'MediaController::edit/$1');
$routes->post('/media/update/(:num)', 'MediaController::update/$1');

