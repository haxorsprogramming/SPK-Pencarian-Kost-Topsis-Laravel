<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Admin extends Controller
{
    public function loginPage()
    {
        return view('admin.loginPage');
    }
}
