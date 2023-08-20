<?php

namespace App\Controllers;
use App\Models\banners;
use App\Models\Gambar;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Portofolio;
use App\Models\KerjasamaClient;
use App\Models\BlogArtikelModel;
use App\Models\Testimoni;
use App\Models\Kategori;
use App\Models\Faq;
use App\Models\TentangKami;
use App\Models\PengaturanWebsite;

class ApiController extends BaseController
{
    public function __construct()
    {

    }

    public function index($kode)
    {
        $ModelGambar = new Gambar();
        
        // Data Banner
        $ModelBanner = new banners();
        $dataBanners = $ModelBanner->where('organisasi_kode',$kode)->get()->getResult();
        foreach ($dataBanners as $banner) {
            $images = $ModelGambar->where('random_code', $banner->random_code)->get()->getResult();
            $banner->random_code = $images;
        }

        // Data Layanan
        $ModelLayanan = new Layanan();
        $datalayanan= $ModelLayanan->where('organisasi_kode',$kode)->get()->getResult();
        foreach ($datalayanan as $layanan) {
            $images = $ModelGambar->where('random_code', $layanan->random_code)->get()->getResult();
            $layanan->random_code = $images;
        }
        

        // Data Paket
        $ModelPaket = new Paket();
        $dataPaket= $ModelPaket->where('organisasi_kode',$kode)->get()->getResult();

        // Data Portofolio
        $ModelPortofolio = new Portofolio();
        $dataPortofolio= $ModelPortofolio->where('organisasi_kode',$kode)->get()->getResult();
        foreach ($dataPortofolio as $portofolio) {
            $images = $ModelGambar->where('random_code', $portofolio->random_code)->get()->getResult();
            $portofolio->random_code = $images;
        }

        // Data Client Work
        $ModelKerjasama = new KerjasamaClient();
        $dataKerjsa= $ModelKerjasama->where('organisasi_kode',$kode)->get()->getResult();

        // Data Testimoni
        $ModelTestimoni = new Testimoni();
        $dataTestimoni= $ModelTestimoni->where('organisasi_kode',$kode)->get()->getResult();

        // Data Faq
        $ModelFaq = new Faq();
        $dataFaq= $ModelFaq->where('organisasi_kode',$kode)->get()->getResult();

        // Tentang Kami
        $ModelTentangKami = new TentangKami();
        $dataTentangKami= $ModelTentangKami->where('organisasi_kode',$kode)->get()->getResult();

        // Data pengaturan dan info kontak
        $ModelPengaturan = new PengaturanWebsite();
        $dataPengaturanWebsite= $ModelPengaturan->where('organisasi_kode',$kode)->get()->getResult();
        // Data Blog
        $ModelBlog = new BlogArtikelModel();
        $dataBlog= $ModelBlog->where('organisasi_kode',$kode)->get()->getResult();

        
        return $this->response->setJSON(['dataBanners' => $dataBanners ,
        'dataLayanan'=>$datalayanan,'dataPaket' => $dataPaket,'dataPortofolio' => $dataPortofolio,'dataPengaturanWebsite'=> $dataPengaturanWebsite,
        'dataKerjasama' => $dataKerjsa,'dataTestimoni' => $dataTestimoni,'dataFaq' => $dataFaq,'dataTentangKami' => $dataTentangKami,'dataBlog'=>$dataBlog]);
    }

 public function DetaiPortofolio($id)
    {
       $model = new Portofolio();
       $data1 = $model->where('id_portofolio',$id)->first();
       $gambar = new Gambar();
       $dataGambar = $gambar->where('random_code',$data1['random_code'])->get()->getResult();
          return $this->response->setJSON(['data1' => $data1,'dataGambar' => $dataGambar]);
      
    }
 public function DetailBlog($id)
    {
       $model = new BlogArtikelModel();
       $model2 = new Kategori();
       $kategori = $model2->findAll();
       $blogs = $model->orderBy('waktu_simpan_data','desc')->limit(5)->findAll();
       $data1 = $model->where('id_blog_artikel',$id)->first();
          return $this->response->setJSON(['data1' => $data1,'blogs' => $blogs,'kategori'=>$kategori]);
      
    }
 public function kategori($id)
    {
       $model = new BlogArtikelModel();
       $model2 = new Kategori();
       $blogs = $model->where('kategori_id',$id)->orderBy('waktu_simpan_data','desc')->limit(5)->get()->getResult();
       $data1 = $model->where('id_blog_artikel',$id)->first();
          return $this->response->setJSON(['data1' => $data1,'blogs' => $blogs,'kategori'=>$kategori]);
      
    }

}
