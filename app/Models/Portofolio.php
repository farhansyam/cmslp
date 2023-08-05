<?php

namespace App\Models;

use CodeIgniter\Model;

Class Portofolio extends Model
{
    protected $table = 'tb_portofolio';
    protected $primaryKey = 'id_portofolio';
    protected $allowedFields = [
    'id_portofolio','id_pengguna','organisasi_kode','judul_portofolio'
    ,'kategori_portofolio','deskripsi','spesifikasi_project','client'
    ,'url_website','lokasi','random_code','waktu_simpan_data','status'];

}