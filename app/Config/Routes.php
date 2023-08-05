<?php

namespace Config;

$routes = Services::routes();


$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index' ,['filter' => 'BelumLogin']);
$routes->get('/login-admin', 'Login::index2' ,['filter' => 'BelumLogin']);

$routes->post('/login', 'Login::index');
$routes->post('/login-admin', 'Login::index2');


// route role user
$routes->group('user',['filter' => 'User'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('logout', 'Dashboard::logout');

    // pengaturan website
    $routes->get('pengaturan', 'PengaturanWebsiteController::index');
    $routes->post('pengaturan/simpan', 'PengaturanWebsiteController::save');
    // info kontak
    $routes->get('infokontak', 'InformasiKontakController::index');
    $routes->post('infokontak/simpan', 'InformasiKontakController::save');

    // informasi kontak
    $routes->get('informasi-kontak', 'infoKontakController::index');
    $routes->post('informasi-kontak/simpan', 'infoKontakController::save');
   
    // tentang kami
    $routes->get('tentang-kami', 'TentangKamiController::index');
    $routes->post('tentang-kami/simpan', 'TentangKamiController::save');

    // Faq
    $routes->get('faq', 'faqController::index');
    $routes->get('faq/tambah', 'faqController::tambah');
    $routes->post('faq/simpan', 'faqController::simpan');
    $routes->post('faq/update', 'faqController::update');
    $routes->get('faq/hapus/(:num)', 'faqController::hapus/$1');
    $routes->get('faq/edit/(:num)', 'faqController::edit/$1');

    // Paket
    $routes->get('paket', 'paketController::index');
    $routes->get('paket/tambah', 'paketController::tambah');
    $routes->post('paket/simpan', 'paketController::simpan');
    $routes->post('paket/update', 'paketController::update');
    $routes->get('paket/hapus/(:num)', 'paketController::hapus/$1');
    $routes->get('paket/edit/(:num)', 'paketController::edit/$1');
    
    // Kerjasama Client
    $routes->get('kerjasama-client', 'KerjasamaController::index');
    $routes->get('kerjasama-client/tambah', 'KerjasamaController::tambah');
    $routes->post('kerjasama-client/simpan', 'KerjasamaController::simpan');
    $routes->post('kerjasama-client/update', 'KerjasamaController::update');
    $routes->get('kerjasama-client/hapus/(:num)', 'KerjasamaController::hapus/$1');
    $routes->get('kerjasama-client/edit/(:num)', 'KerjasamaController::edit/$1');

    // Testimoni
    $routes->get('testimoni', 'TestimoniController::index');
    $routes->get('testimoni/tambah', 'TestimoniController::tambah');
    $routes->post('testimoni/simpan', 'TestimoniController::simpan');
    $routes->post('testimoni/update', 'TestimoniController::update');
    $routes->get('testimoni/hapus/(:num)', 'TestimoniController::hapus/$1');
    $routes->get('testimoni/edit/(:num)', 'TestimoniController::edit/$1');

    // Banner
    $routes->get('banners', 'bannersController::index');
    $routes->get('banners/tambah', 'bannersController::tambah');
    $routes->post('banners/simpan', 'bannersController::simpan');
    $routes->post('banners/update/(:num)', 'bannersController::update/$1');
    $routes->get('banners/hapus/(:num)', 'bannersController::hapus/$1');
    $routes->get('gambar/hapus/(:num)', 'bannersController::hapusgambar/$1');
    $routes->get('banners/detail/(:num)', 'bannersController::detail/$1');
    $routes->get('banners/edit/(:num)', 'bannersController::edit/$1');
   
   
    // Layanan   
    $routes->get('layanan', 'layananController::index');
    $routes->get('layanan/tambah', 'layananController::tambah');
    $routes->post('layanan/simpan', 'layananController::simpan');
    $routes->post('layanan/update/(:num)', 'layananController::update/$1');
    $routes->get('layanan/hapus/(:num)', 'layananController::hapus/$1');
    $routes->get('gambar/hapus/(:num)', 'layananController::hapusgambar/$1');
    $routes->get('layanan/detail/(:num)', 'layananController::detail/$1');
    $routes->get('layanan/edit/(:num)', 'layananController::edit/$1');
    // Layanan   
    $routes->get('portofolio', 'PortofolioController::index');
    $routes->get('portofolio/tambah', 'portofolioController::tambah');
    $routes->post('portofolio/simpan', 'portofolioController::simpan');
    $routes->post('portofolio/update/(:num)', 'portofolioController::update/$1');
    $routes->get('portofolio/hapus/(:num)', 'portofolioController::hapus/$1');
    $routes->get('gambar/hapus/(:num)', 'portofolioController::hapusgambar/$1');
    $routes->get('portofolio/detail/(:num)', 'portofolioController::detail/$1');
    $routes->get('portofolio/edit/(:num)', 'portofolioController::edit/$1');

});


// route role super admin
$routes->group('superadmin',['filter' => 'Superadmin'], static function ($routes) {
    $routes->get('/', 'Dashboard::index2');
});

// route role super admin
$routes->group('admin',['filter' => 'Admin'], static function ($routes) {
    $routes->get('/', 'Dashboard::index2');
});

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
