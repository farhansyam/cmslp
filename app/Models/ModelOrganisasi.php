<?php

namespace App\Models;

use CodeIgniter\Model;

Class ModelOrganisasi extends Model
{
    protected $table = 'tb_data_organisasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','organisasi_kode','id_pengguna_owner','nama_organisasi','alamat_organisasi','no_telepon','no_handphone','logo','waktu_simpan_data','status'];
}