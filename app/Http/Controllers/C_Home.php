<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
