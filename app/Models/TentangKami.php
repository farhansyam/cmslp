<?php

namespace App\Models;

use CodeIgniter\Model;

Class TentangKami extends Model
{
    protected $table = 'tb_tentang_kami';
    protected $primaryKey = 'id_tentang_kami';
    protected $allowedFields = ['id_tentang_kami','id_pengguna','organisasi_kode','visi','misi','motto','deskripsi_1',
    'deskripsi_2','deskripsi_portofolio','waktu_simpan_data','status'];

}