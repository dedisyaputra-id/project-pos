<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::index');
$routes->post('/login/save', 'Auth::login');
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/tambah', 'Barang::create');
$routes->post('/barang/simpan', 'Barang::save');
$routes->delete('/barang/hapus/(:num)', 'Barang::delete/$1');
$routes->get('/barang/(:num)', 'Barang::detail/$1');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->put('/barang/update/(:num)', 'Barang::update/$1');
$routes->get('/barang/kategori', 'Kategori::index');
