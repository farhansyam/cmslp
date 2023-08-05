<?php

namespace App\Models;

use CodeIgniter\Model;

Class ModelRole extends Model
{
    protected $table = 'tb_role';
      protected $primaryKey = 'id_role';
    protected $allowedFields = ['id_role','nama_role','id_admin','create_data','read_data','update_data','delete_data',
    'all_organisasi','list_organisasi','waktu_simpan_data','status'];
}