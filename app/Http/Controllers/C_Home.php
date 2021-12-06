<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Kost;
use App\Models\M_Data_Pengujian;

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
        $dp = M_Data_Pengujian::where('token', $idPengujian) -> first();
        $data['nama'] = $dp -> nama_penguji;
        $data['fasilitas'] = $dp -> c1;
        $data['harga'] = $dp -> c2;
        $data['keamanan'] = $dp -> c3;
        $data['kenyamanan'] = $dp -> c4;
        $data['ukuran'] = $dp -> c5;
        $data['jarak'] = $dp -> c6;
        $data['kebersihan'] = $dp -> c7;
        $data['tempat'] = $dp -> c8;
        $data['kost'] = M_Kost::all();
        return view('home.hasilPengujian', $data);
    }
    public function pencarianKostProses(Request $request)
    {
        // {'nama':nama, 'c1':c1, 'c2':c2, 'c3':c3, 'c4':c4, 'c5':c5, 'c6':c6, 'c7':c7, 'c8':c8 }
        $token = Str::uuid();
        $pengujian = new M_Data_Pengujian();
        $pengujian -> token = $token;
        $pengujian -> nama_penguji = $request -> nama;
        $pengujian -> c1 = $request -> c1;
        $pengujian -> c2 = $request -> c2;
        $pengujian -> c3 = $request -> c3;
        $pengujian -> c4 = $request -> c4;
        $pengujian -> c5 = $request -> c5;
        $pengujian -> c6 = $request -> c6;
        $pengujian -> c7 = $request -> c7;
        $pengujian -> c8 = $request -> c8;
        $pengujian -> save();
        
        $dr = ['token' => $token];
        return \Response::json($dr);
    }
}
