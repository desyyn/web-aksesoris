<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Halaman Depan
$routes->get('/', 'Home::index');

// Halaman Detail (PENTING: Ini yang bikin error 404 kalau tidak ada)
$routes->get('/home/detail/(:num)', 'Home::detail/$1');

// Halaman Admin
$routes->group('produk', function($routes) {
    $routes->get('/', 'Produk::index');
    $routes->get('create', 'Produk::create');
    $routes->post('store', 'Produk::store');
    $routes->get('delete/(:num)', 'Produk::delete/$1');
});
