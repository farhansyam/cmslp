<?php

namespace App\Models;

use CodeIgniter\Model;

Class Faq extends Model
{
    protected $table = 'tb_faq';
    protected $primaryKey = 'id_faq';
    protected $allowedFields = ['id_faq','id_pengguna','organisasi_kode','pertanyaan','jawaban','waktu_simpan_data','status'];

}