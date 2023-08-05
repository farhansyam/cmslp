<?php

namespace App\Models;

use CodeIgniter\Model;

Class Paket extends Model
{
    protected $table = 'tb_paket';
    protected $primaryKey = 'id_paket';
    protected $allowedFields = ['id_paket','id_pengguna','organisasi_kode','judul_paket','jenis_paket','deskripsi','harga','fasilitas','kalimat_pada_tombol','waktu_simpan_data','status'];

}