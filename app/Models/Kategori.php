<?php

namespace App\Models;

use CodeIgniter\Model;

Class Kategori extends Model
{
    protected $table = 'tb_kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['id_kategori','kategori','waktu_simpan_data','status'];

}