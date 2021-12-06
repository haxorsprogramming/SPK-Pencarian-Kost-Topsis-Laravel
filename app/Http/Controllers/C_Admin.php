<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Kriteria;

class C_Admin extends Controller
{
    public function dashboardPage()
    {
        return view('app.dashboardPage');
    }
    public function dataKriteria()
    {
        $dataKriteria = M_Kriteria::all();
        $dr = ['dataKriteria' => $dataKriteria];
        return view('app.dataKriteriaPage', $dr);
    }
    public function dataKost()
    {
        return view('app.dataKostPage');
    }
}
