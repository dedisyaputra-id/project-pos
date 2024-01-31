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
$routes->get('/barang/kategori', 'Barang::category');
