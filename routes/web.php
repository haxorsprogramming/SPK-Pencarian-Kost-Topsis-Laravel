<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Admin;
use App\Http\Controllers\C_Auth;

Route::get('/', [C_Home::class, 'homePage']);
Route::get('/pencarianKost', [C_Home::class, 'pencarianKost']);

// Halaman auth 
Route::get('/login', [C_Auth::class, 'loginPage']);
Route::post('/login/proses', [C_Auth::class, 'loginProses']);

// halaman admin 
Route::get('/app', [C_Admin::class, 'dashboardPage']);
Route::get('/app/data-kriteria', [C_Admin::class, 'dataKriteria']);
Route::get('/app/data-kost', [C_Admin::class, 'dataKost']);