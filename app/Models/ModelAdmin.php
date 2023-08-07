<?php

namespace App\Models;

use CodeIgniter\Model;

Class ModelAdmin extends Model
{
    protected $table = 'tb_admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['id_admin','username','password','nama_depan','nama_belakang','role','waktu_simpan_data','status'];

    public function getAdminsWithRoles()
    {
        return $this->select('tb_admin.name as role_name')
            ->join('roles', 'roles.id = admin.role_id')
            ->findAll();
    }
  }