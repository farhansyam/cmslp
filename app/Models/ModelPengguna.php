<?php

namespace App\Models;

use CodeIgniter\Model;

Class ModelPengguna extends Model
{
    protected $table = 'tb_data_pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = ['id_pengguna','username','password','organisasi_kode','nama_depan','nama_belakang','jenis_kelamin','tempat_lahir','tanggal_lahir','nomor_telepon','email','alamat','kecamatan','kota','provinsi','sebagai','waktu_simpan_data','status'];
}