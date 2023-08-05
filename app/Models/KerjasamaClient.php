<?php

namespace App\Models;

use CodeIgniter\Model;

Class KerjasamaClient extends Model
{
    protected $table = 'tb_kerjasama_client';
    protected $primaryKey = 'id_kerjasama_client';
    protected $allowedFields = ['KerjasamaClient','id_pengguna','organisasi_kode','nama_client','logo_client','waktu_simpan_data','status'];

}