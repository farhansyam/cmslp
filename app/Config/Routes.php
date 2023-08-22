<?php

namespace Config;

$routes = Services::routes();


$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index' ,['filter' => 'BelumLogin']);
$routes->get('/login-admin', 'Login::index2' ,['filter' => 'BelumLogin']);
$routes->get('/getdata/(:num)', 'ApiController::index/$1');
$routes->get('/detailportofolio/(:num)', 'ApiController::DetaiPortofolio/$1');
$routes->get('/detailblog/(:num)', 'ApiController::DetailBlog/$1');
$routes->get('/kategori/(:num)', 'ApiController::DetailBlog/$1');

$routes->post('/login', 'Login::index');
$routes->post('/login-admin', 'Login::index2');


// route role user
$routes->group('user',['filter' => 'User'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('set/(:num)', 'Dashboard::setorganisasi/$1');
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

    // Kategori
    $routes->get('kategori', 'kategoriController::index');
    $routes->get('kategori/tambah', 'kategoriController::tambah');
    $routes->post('kategori/simpan', 'kategoriController::simpan');
    $routes->post('kategori/update', 'kategoriController::update');
    $routes->get('kategori/hapus/(:num)', 'kategoriController::hapus/$1');
    $routes->get('kategori/edit/(:num)', 'kategoriController::edit/$1');

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

    // Blog
    $routes->get('blog', 'BlogController::index');
    $routes->get('blog/tambah', 'BlogController::tambah');
    $routes->post('blog/simpan', 'BlogController::simpan');
    $routes->post('blog/update', 'BlogController::update');
    $routes->get('blog/hapus/(:num)', 'BlogController::hapus/$1');
    $routes->get('blog/edit/(:num)', 'BlogController::edit/$1');

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
    // Portofolio   
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
    $routes->get('logout', 'Dashboard::logoutA');

        // Admin
    $routes->get('admin', 'adminController::index');
    $routes->get('admin/tambah', 'adminController::tambah');
    $routes->post('admin/simpan', 'adminController::simpan');
    $routes->post('admin/update', 'adminController::update');
    $routes->get('admin/hapus/(:num)', 'adminController::hapus/$1');
    $routes->get('admin/edit/(:num)', 'adminController::edit/$1');

    // Role
    $routes->get('role', 'roleController::index');
    $routes->get('role/tambah', 'roleController::tambah');
    $routes->post('role/simpan', 'roleController::simpan');
    $routes->post('role/update', 'roleController::update');
    $routes->get('role/hapus/(:num)', 'roleController::hapus/$1');
    $routes->get('role/edit/(:num)', 'roleController::edit/$1');

    // Organisasi
    $routes->get('organisasi', 'OrganisasiController::index');
    $routes->get('organisasi/tambah', 'OrganisasiController::tambah');
    $routes->post('organisasi/simpan', 'OrganisasiController::simpan');
    $routes->post('organisasi/update', 'OrganisasiController::update');
    $routes->get('organisasi/hapus/(:num)', 'OrganisasiController::hapus/$1');
    $routes->get('organisasi/edit/(:num)', 'OrganisasiController::edit/$1');

    // Pengguna
    $routes->get('pengguna', 'PenggunaController::index');
    $routes->get('pengguna/tambah', 'PenggunaController::tambah');
    $routes->post('pengguna/simpan', 'PenggunaController::simpan');
    $routes->post('pengguna/update', 'PenggunaController::update');
    $routes->get('pengguna/hapus/(:num)', 'PenggunaController::hapus/$1');
    $routes->get('pengguna/edit/(:num)', 'PenggunaController::edit/$1');


    // banner
    $routes->post('banners/simpan', 'bannersController::simpan');
    $routes->get('banners', 'bannersController::index');
    $routes->get('banners/tambah', 'bannersController::tambah');
    $routes->post('banners/update/(:num)', 'bannersController::update/$1');
    $routes->get('banners/hapus/(:num)', 'bannersController::hapus/$1');
    $routes->get('gambar/hapus/(:num)', 'bannersController::hapusgambar/$1');
    $routes->get('banners/detail/(:num)', 'bannersController::detail/$1');
    $routes->get('banners/edit/(:num)', 'bannersController::edit/$1');
   
    // Seting webs
    $routes->get('pengaturan/edit/(:num)', 'PengaturanWebsiteController::SAedit/$1');
    $routes->get('pengaturan', 'PengaturanWebsiteController::SAindex');
    $routes->post('pengaturan/simpan', 'PengaturanWebsiteController::SAsave');
    // info kontak

    // informasi kontak
    $routes->get('infokontak/edit/(:num)', 'informasiKontakController::SAedit/$1');
    $routes->get('infokontak', 'informasiKontakController::SAindex');
    $routes->post('infokontak/simpan', 'informasiKontakController::SAsave');
   
    // tentang kami
    $routes->get('tentang-kami', 'TentangKamiController::SAindex');
    $routes->post('tentang-kami/simpan', 'TentangKamiController::SAsave');
    $routes->get('tentang-kami/edit/(:num)', 'TentangKamiController::SAedit/$1');


    // Faq
    $routes->get('faq', 'faqController::SAindex');
    $routes->get('faq/tambah', 'faqController::SAtambah');
    $routes->post('faq/simpan', 'faqController::SAsimpan');
    $routes->post('faq/update', 'faqController::SAupdate');
    $routes->get('faq/hapus/(:num)', 'faqController::SAhapus/$1');
    $routes->get('faq/edit/(:num)', 'faqController::SAedit/$1');

    // Kategori
    $routes->get('kategori', 'kategoriController::SAindex');
    $routes->get('kategori/tambah', 'kategoriController::SAtambah');
    $routes->post('kategori/simpan', 'kategoriController::SAsimpan');
    $routes->post('kategori/update', 'kategoriController::SAupdate');
    $routes->get('kategori/hapus/(:num)', 'kategoriController::SAhapus/$1');
    $routes->get('kategori/edit/(:num)', 'kategoriController::SAedit/$1');

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

    // Blog
    $routes->get('blog', 'BlogController::SAindex');
    $routes->get('blog/tambah', 'BlogController::SAtambah');
    $routes->post('blog/simpan', 'BlogController::SAsimpan');
    $routes->post('blog/update', 'BlogController::SAupdate');
    $routes->get('blog/hapus/(:num)', 'BlogController::SAhapus/$1');
    $routes->get('blog/edit/(:num)', 'BlogController::SAedit/$1');

    // Testimoni
    $routes->get('testimoni', 'TestimoniController::index');
    $routes->get('testimoni/tambah', 'TestimoniController::tambah');
    $routes->post('testimoni/simpan', 'TestimoniController::simpan');
    $routes->post('testimoni/update', 'TestimoniController::update');
    $routes->get('testimoni/hapus/(:num)', 'TestimoniController::hapus/$1');
    $routes->get('testimoni/edit/(:num)', 'TestimoniController::edit/$1');

    // Banner
   
   
    // Layanan   
    $routes->get('layanan', 'layananController::index');
    $routes->get('layanan/tambah', 'layananController::tambah');
    $routes->post('layanan/simpan', 'layananController::simpan');
    $routes->post('layanan/update/(:num)', 'layananController::update/$1');
    $routes->get('layanan/hapus/(:num)', 'layananController::hapus/$1');
    $routes->get('gambar/hapus/(:num)', 'layananController::hapusgambar/$1');
    $routes->get('layanan/detail/(:num)', 'layananController::detail/$1');
    $routes->get('layanan/edit/(:num)', 'layananController::edit/$1');
    // Portofolio   
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
$routes->group('admins',['filter' => 'Admin'], static function ($routes) {
    $routes->get('/', 'Dashboard::index3');
    $routes->get('logout', 'Dashboard::logoutA');
    $routes->get('set/(:num)', 'Dashboard::setorganisasi/$1');

     // Organisasi
    $routes->get('organisasi', 'OrganisasiController::index');
    $routes->get('organisasi/tambah', 'OrganisasiController::tambah');
    $routes->post('organisasi/simpan', 'OrganisasiController::simpan');
    $routes->post('organisasi/update', 'OrganisasiController::update');
    $routes->get('organisasi/hapus/(:num)', 'OrganisasiController::hapus/$1');
    $routes->get('organisasi/edit/(:num)', 'OrganisasiController::edit/$1');

    // Pengguna
    $routes->get('pengguna', 'PenggunaController::index');
    $routes->get('pengguna/tambah', 'PenggunaController::tambah');
    $routes->post('pengguna/simpan', 'PenggunaController::simpan');
    $routes->post('pengguna/update', 'PenggunaController::update');
    $routes->get('pengguna/hapus/(:num)', 'PenggunaController::hapus/$1');
    $routes->get('pengguna/edit/(:num)', 'PenggunaController::edit/$1');
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

    // Kategori
    $routes->get('kategori', 'kategoriController::index');
    $routes->get('kategori/tambah', 'kategoriController::tambah');
    $routes->post('kategori/simpan', 'kategoriController::simpan');
    $routes->post('kategori/update', 'kategoriController::update');
    $routes->get('kategori/hapus/(:num)', 'kategoriController::hapus/$1');
    $routes->get('kategori/edit/(:num)', 'kategoriController::edit/$1');

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

    // Blog
    $routes->get('blog', 'BlogController::index');
    $routes->get('blog/tambah', 'BlogController::tambah');
    $routes->post('blog/simpan', 'BlogController::simpan');
    $routes->post('blog/update', 'BlogController::update');
    $routes->get('blog/hapus/(:num)', 'BlogController::hapus/$1');
    $routes->get('blog/edit/(:num)', 'BlogController::edit/$1');

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
    // Portofolio   
    $routes->get('portofolio', 'PortofolioController::index');
    $routes->get('portofolio/tambah', 'portofolioController::tambah');
    $routes->post('portofolio/simpan', 'portofolioController::simpan');
    $routes->post('portofolio/update/(:num)', 'portofolioController::update/$1');
    $routes->get('portofolio/hapus/(:num)', 'portofolioController::hapus/$1');
    $routes->get('gambar/hapus/(:num)', 'portofolioController::hapusgambar/$1');
    $routes->get('portofolio/detail/(:num)', 'portofolioController::detail/$1');
    $routes->get('portofolio/edit/(:num)', 'portofolioController::edit/$1');


});

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
