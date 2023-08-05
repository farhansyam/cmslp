<?php

namespace App\Models;

use CodeIgniter\Model;

Class Banners extends Model
{
    protected $table = 'tb_banners';
    protected $primaryKey = 'id_banner';
    protected $allowedFields = ['id_banner','id_pengguna','organisasi_kode','judul'
    ,'deskripsi','link','kategori','random_code','waktu_simpan_data','status'];

}