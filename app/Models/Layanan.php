<?php

namespace App\Models;

use CodeIgniter\Model;

Class Layanan extends Model
{
    protected $table = 'tb_layanan';
    protected $primaryKey = 'id_layanan';
    protected $allowedFields = ['id_layanan','id_pengguna','organisasi_kode','judul_layanan'
    ,'deskripsi_1','deskripsi_2','gambar_poster_layanan','waktu_simpan_data','status','random_code'];

}