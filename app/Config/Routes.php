<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Halaman Depan
// 1. Halaman Publik (Bebas Akses)
$routes->get('/', 'Home::index');
$routes->get('/katalog', 'Home::katalog');
$routes->get('/home/detail/(:num)', 'Home::detail/$1');

// 2. Login & Logout
$routes->get('/login', 'Auth::index');
$routes->post('/login/auth', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

// 3. Halaman Admin (DIPAGARI FILTER AUTH)
// Semua route di dalam group ini HANYA bisa diakses kalau sudah login
$routes->group('produk', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Produk::index');
    $routes->get('create', 'Produk::create');
    $routes->post('store', 'Produk::store');
    $routes->get('delete/(:num)', 'Produk::delete/$1');
    $routes->get('edit/(:num)', 'Produk::edit/$1');
    $routes->post('update/(:num)', 'Produk::update/$1');
});
