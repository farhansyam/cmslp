<?php

namespace App\Models;

use CodeIgniter\Model;

Class Testimoni extends Model
{
    protected $table = 'tb_testimoni';
    protected $primaryKey = 'id_testimoni';
    protected $allowedFields = ['id_testimoni','id_pengguna','organisasi_kode','nama','instansi','testimoni','rating','foto','status'];

}