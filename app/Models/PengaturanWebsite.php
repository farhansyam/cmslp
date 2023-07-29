<?php

namespace App\Models;

use CodeIgniter\Model;

Class PengaturanWebsite extends Model
{
    protected $table = 'tb_pengaturan_website';
    protected $primaryKey = 'id_pengaturan_website';
    protected $allowedFields = ['id_pengaturan_website','id_pengguna','organisasi_kode','judul_website',
    'deskripsi_singkat','deskripsi_lengkap','email_admin','email_cs','email_support','nomor_telepon','nomor_handphone',
    'alamat_lengkap','nama_facebook','url_facebook','nama_instagram','url_instagram','nama_twiter','url_twiter','nama_linkedin',
    'url_linkedin','nama_youtube','url_youtube','embed_google_maps','google_maps_url','nama_cs_1','nama_cs_2','nomor_cs_1','nomor_cs_2',
    'cs_1_sebagai','cs_2_sebagai','pesan_cs'];
}