<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Kriteria;
use App\Models\M_Kost;
use App\Models\M_Data_Pengujian;
use Illuminate\Support\Facades\Redis;


class C_Admin extends Controller
{
    public function dashboardPage()
    {
        $totalKost = M_Kost::count();
        $totalPengujian = M_Data_Pengujian::count();
        $dr = ['totalKost' => $totalKost, 'totalPengujian' => $totalPengujian];
        return view('app.dashboardPage', $dr);
    }
    public function dataKriteria()
    {
        $dataKriteria = M_Kriteria::all();
        $dr = ['dataKriteria' => $dataKriteria];
        return view('app.dataKriteriaPage', $dr);
    }
    public function dataKost()
    {
        $dataKost = M_Kost::all();
        $dr = ['dataKost' => $dataKost];
        return view('app.dataKostPage', $dr);
    }
    public function tambahKost()
    {
        return view('app.tambahKostPage');
    }
    public function prosesTambahKost(Request $request)
    {
        // konversi fasilitas 
        $fasilitas = $request -> fasilitas;
        switch ($fasilitas) {
            case "1":
                $fasilitasCap = "Kasur, Kamar Mandi";
                break;
            case "2":
                $fasilitasCap = "Kasur, Lemari, Kamar Mandi";
                break;
            case "3":
                $fasilitasCap = "Kasur, Kamar Mandi, Wifi";
                break;
            case "4":
                $fasilitasCap = "Kasur, Lemari, Dapur, Kamar Mandi, AC";
                break;
            case "5":
                $fasilitasCap = "Kasur, Lemari, Dapur, Kamar Mandi, AC, WIFI";
                break;
        }
        // konversi harga 
        $harga = $request -> harga;
        switch ($harga) {
            case "1":
                $hargaCap = "Rp. 500.000 - Rp. 600.000";
                break;
            case "2":
                $hargaCap = "Rp. 450.000 - Rp. 500.000";
                break;
            case "3":
                $hargaCap = "Rp. 400.000 - Rp. 450.000";
                break;
            case "4":
                $hargaCap = "Rp. 350.000 - Rp. 400.000";
                break;
            case "5":
                $hargaCap = "Rp. 400.000 - Rp. 300.000";
                break;
        }
        // konversi keamanan 
        $keamanan = $request -> keamanan;
        switch ($keamanan) {
            case "1":
                $keamananCap = "Ada pemilik kost";
                break;
            case "2":
                $keamananCap = "Ada pemilik kost dan penjaga kost";
                break;
            case "3":
                $keamananCap = "Tidak ada pemilik kost";
                break;
            case "4":
                $keamananCap = "Security";
                break;
            case "5":
                $keamananCap = "Security, Pemantauan CCTV";
                break;
        }
        // konversi kenyamanan 
        $kenyamanan = $request -> kenyamanan;
        switch ($kenyamanan) {
            case "1":
                $kenyamananCap = "Mayoritas non-muslim, tidak ada mesjid, tidak ada gereja";
                break;
            case "2":
                $kenyamananCap = "Mayoritas non-muslim, tidak ada mesjid, tidak ada gereja, interaksi sosial";
                break;
            case "3":
                $kenyamananCap = "Mayoritas muslim, lingkungan sehat";
                break;
            case "4":
                $kenyamananCap = "Mayoritas muslim, ada mesjid, ada gereja";
                break;
            case "5":
                $kenyamananCap = "Mayoritas muslim, ada mesjid";
                break;
        }
        // konversi ukuran 
        $ukuran = $request -> ukuran;
        switch ($ukuran) {
            case "1":
                $ukuranCap = "2 x 2,5 Meter";
                break;
            case "2":
                $ukuranCap = "2,5 X 3 Meter";
                break;
            case "3":
                $ukuranCap = "2,5 X 3,4 Meter";
                break;
            case "4":
                $ukuranCap = "3 X 3 Meter";
                break;
            case "5":
                $ukuranCap = "3 X 4 Meter";
                break;
        }
        // koversi jarak 
        $jarak = $request -> jarak;
        switch ($jarak) {
            case "5":
                $jarakCap = "14 - 17 Menit";
                break;
            case "4":
                $jarakCap = "12 - 14 Menit";
                break;
            case "3":
                $jarakCap = "9 - 11 Menit";
                break;
            case "2":
                $jarakCap = "6 - 8 Menit";
                break;
            case "1":
                $jarakCap = "3 - 5 Menit";
                break;
        }
        // konversi kebersihan
        $kebersihan = $request -> kebersihan;
        switch ($kebersihan) {
            case "1":
                $kebersihanCap = "Kebersihan menjadi tanggung jawab masing masing";
                break;
            case "2":
                $kebersihanCap = "Kebersihan menjadi tanggung jawab bersama";
                break;
            case "3":
                $kebersihanCap = "Pemilik kost membantu kebersihan kost";
                break;
            case "4":
                $kebersihanCap = "Ada jadwal piket";
                break;
            case "5":
                $kebersihanCap = "Ada petugas kebersihan";
                break;
        }
        // koversi tempat 
        $tempat = $request -> tempat;
        switch ($tempat) {
            case "1":
                $tempatCap = "Dekat kampus, warung makan";
                break;
            case "2":
                $tempatCap = "Dekat kampus, warung makan, toko kelontong";
                break;
            case "3":
                $tempatCap = "Warung makan, toko kelontong, foto copy";
                break;
            case "5":
                $tempatCap = "Warung makan, toko kelontong, foto copy, laundry";
                break;
            case "4":
                $tempatCap = "Warung makan, toko kelontong, foto copy, laundry, atm";
                break;
        }
        // cari ordinal 
        $totalKost = M_Kost::count();
        if($totalKost == 0){
            $ordinal = 1;
        }else{
            $ordinal = $totalKost + 1;
        }
        $kost = new M_Kost();
        $kost->nama_kost = $request -> nama;
        $kost->alamat = $request -> alamat;
        $kost->fasilitas_cap = $fasilitasCap;
        $kost->fasilitas_angka = $request -> fasilitas;
        $kost->harga_cap = $hargaCap;
        $kost->harga_angka = $request->harga;
        $kost->keamanan_cap = $keamananCap;
        $kost->keamanan_angka = $request->keamanan;
        $kost->kenyamanan_cap = $kenyamananCap;
        $kost->kenyamanan_angka = $request->kenyamanan;
        $kost->ukuran_cap = $ukuranCap;
        $kost->ukuran_angka = $request->ukuran;
        $kost->jarak_cap = $jarakCap;
        $kost->jarak_angka = $request->jarak;
        $kost->kebersihan_cap = $kebersihanCap;
        $kost->kebersihan_angka = $request->kebersihan;
        $kost->tempat_cap = $tempatCap;
        $kost->tempat_angka = $request->tempat;
        $kost -> ordinal = "0";
        $kost->save();
        $this -> resetOrdinal();
        $dr = ['status' => 'status'];
        return \Response::json($dr);
    }
    public function prosesHapusKost(Request $request)
    {
        M_Kost::where('id', $request -> kdKost) -> delete();
        $this -> resetOrdinal();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }

    public function hapusProses(Request $request)
    {
        M_Kriteria::where('id', $request -> idKriteria) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }

    public function getData(Request $request)
    {
        $dataKriteria = M_Kriteria::where('id', $request -> idKriteria) -> first(); 
        $dr = ['status' => 'sukses', 'kriteria' => $dataKriteria];
        return \Response::json($dr);
    }

    public function updateProses(Request $request)
    {
        // {'kdKriteria':kdKriteria, 'nama':nama, 'bobot':bobot, 'nilai':nilai}
        M_Kriteria::where('id', $request -> kdKriteria) -> update([
            'kriteria' => $request -> nama,
            'bobot' => $request -> bobot,
            'nilai' => $request -> nilai
        ]);
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }

    public function dataPengujian()
    {
        $dataPengujian = M_Data_Pengujian::all();
        $dr = ['dataPengujian' => $dataPengujian];
        return view('app.dataPengujian', $dr);
    }

    public function prosesHapusPengujian(Request $request)
    {
        M_Data_Pengujian::where('token', $request -> token) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }

    public function hasilPencarianAdmin(Request $request, $idPengujian)
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
        return view('home.hasilPengujianAdmin', $data);
    }

    public function tambahKriteriaProses(Request $request)
    {
        // {'nama':nama, 'bobot':bobot, 'nilai':nilai}
        $kriteria = new M_Kriteria();
        $kriteria -> kriteria = $request -> nama;
        $kriteria -> bobot = $request -> bobot;
        $kriteria -> nilai = $request -> nilai;
        $kriteria -> active = "1";
        $kriteria -> save();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }

    function resetOrdinal()
    {
        $x = 1;
        $totalKost = M_Kost::count();
        $dataKost = M_Kost::all();
        foreach($dataKost as $kost){
            $id = $kost -> id;
            M_Kost::where('id', $id) -> update([
                'ordinal' => $x
            ]);
            $x++;
        }
    }

}
