<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Data_Pengujian extends Model
{
    protected $table = "tbl_k_data_pengujian";

    protected $fillable = [
        'token',
        'nama_penguji',
        'c1',
        'c2',
        'c3',
        'c4',
        'c5',
        'c6',
        'c7',
        'c8',
    ];
}
