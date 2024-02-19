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
$routes->put("/update/pengguna/(:alphanum)", "User::update/$1");
$routes->delete("/hapus/pengguna/(:alphanum)", "User::delete/$1");
$routes->get("/supplier", "Supplier::index");
$routes->get("/supplier/(:num)", "Supplier::detail/$1");
$routes->get("/supplier/tambah", "Supplier::create");
$routes->post("/supplier/simpan", "Supplier::save");
$routes->get("/supplier/edit/(:num)", "Supplier::edit/$1");
$routes->put("/supplier/update/(:num)", "Supplier::update/$1");
$routes->delete("/supplier/delete/(:num)", "Supplier::delete/$1");
$routes->get("/barangmasuk", "BarangMasuk::index");
$routes->get("/barangmasuk/tambah", "BarangMasuk::create");
$routes->post("/barangmasuk/simpan", "BarangMasuk::save");
$routes->get("/barangmasuk/(:alphanum)", "BarangMasuk::detail/$1");
$routes->get("/barangmasuk/edit/(:alphanum)", "BarangMasuk::edit/$1");
$routes->put("/barangmasuk/ubah/(:alphanum)", "BarangMasuk::update/$1");
$routes->delete("/barangmasuk/(:alphanum)", "BarangMasuk::delete/$1");
$routes->get("/detailbarangmasuk", "DetailBarangMasuk::index");
$routes->get("/detailbarangmasuk/tambah", "DetailBarangMasuk::create");
$routes->post("/detailbarangmasuk/simpan", "DetailBarangMasuk::save");
$routes->get("/detailbarangmasuk/(:alphanum)", "DetailBarangMasuk::detail/$1");
