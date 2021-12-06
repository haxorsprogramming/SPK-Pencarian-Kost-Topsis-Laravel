<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Kost extends Model
{
    protected $table = "tbl_k_kost";

    protected $fillable = [
        'nama_kost',
        'alamat',
        'fasilitas_cap',
        'fasilitas_angka',
        'harga_cap',
        'harga_angka',
        'keamanan_cap',
        'keamanan_angka',
        'kenyamanan_cap',
        'kenyamanan_angka',
        'ukuran_cap',
        'ukuran_angka',
        'jarak_cap',
        'jarak_angka',
        'kebersihan_cap',
        'kebersihan_angka',
        'tempat_cap',
        'tempat_angka',
        'ordinal'
    ];

}
