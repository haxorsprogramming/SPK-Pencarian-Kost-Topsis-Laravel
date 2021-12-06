<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Kost;

class C_Home extends Controller
{
    public function homePage()
    {
        return view('home.homePage');
    }
    public function pencarianKost()
    {
        return view('home.pencarianKostPage');
    }
    public function prosesPencarian()
    {
        return view('home.homePage');
    }
    public function dataKost()
    {
        $dataKost = M_Kost::all();
        $dr = ['dataKost' => $dataKost];
        return view('home.dataKost', $dr);
    }
}
