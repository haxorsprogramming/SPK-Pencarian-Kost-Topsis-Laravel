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
    public function hasilPengujian(Request $request, $idPengujian)
    {
        $data['nama'] = "Diana";
        $data['fasilitas'] = 5;
        $data['harga'] = 5;
        $data['keamanan'] = 3;
        $data['kenyamanan'] = 1;
        $data['ukuran'] = 1;
        $data['jarak'] = 2;
        $data['kebersihan'] = 3;
        $data['tempat'] = 5;
        $data['kost'] = M_Kost::all();
        return view('home.hasilPengujian', $data);
    }
}
