<?php

namespace App\Controllers;
use App\Models\banners;
use App\Models\Gambar;
use App\Models\Layanan;
use App\Models\Paket;

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
        
        $ModelLayanan = new Layanan();
        $datalayanan= $ModelLayanan->where('organisasi_kode',$kode)->get()->getResult();

        // Data Paket
        $ModelPaket = new Paket();
        $dataPaket= $ModelPaket->where('organisasi_kode',$kode)->get()->getResult();

        return $this->response->setJSON(['dataBanners' => $dataBanners ,'dataLayanan'=>$datalayanan,'dataPaket' => $dataPaket]);
    }


}
