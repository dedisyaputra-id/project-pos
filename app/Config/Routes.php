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
$routes->get('/kategori', 'Kategori::index');
$routes->get('/tambahkategori', 'Kategori::create');
$routes->post('/tambahkategori/simpan', 'Kategori::save');
$routes->get('/kategori/(:alphanum)', 'Kategori::edit/$1');
$routes->put('/kategori/ubah/(:alphanum)', 'Kategori::update/$1');
$routes->delete('/kategori/hapus/(:alphanum)', 'Kategori::delete/$1');
$routes->get("/pengguna", "User::index");
$routes->get("/tambah/pengguna", "User::create");
$routes->post("/tambah/pengguna/simpan", "User::save");
$routes->get("/edit/pengguna/(:alphanum)", "User::edit/$1");
$routes->delete("/hapus/pengguna/(:alphanum)", "User::delete/$1");
