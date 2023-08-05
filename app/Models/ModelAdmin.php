<?php

namespace App\Models;

use CodeIgniter\Model;

Class ModelAdmin extends Model
{
    protected $table = 'tb_admin';
      protected $primaryKey = 'id_admin';
    protected $allowedFields = ['id_admin','username','password','nama_depan','nama_belakang','role','waktu_simpan_data','status'];
}