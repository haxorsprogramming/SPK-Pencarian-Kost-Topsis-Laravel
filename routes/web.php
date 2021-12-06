<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Admin;
use App\Http\Controllers\C_Auth;

Route::get('/', [C_Home::class, 'homePage']);
Route::get('/pencarianKost', [C_Home::class, 'pencarianKost']);
Route::post('/pencarianKost/proses', [C_Home::class, 'pencarianKostProses']);
Route::get('/dataKost', [C_Home::class, 'dataKost']);
// Route::post('/prosesPencarian', [C_Home::class, 'prosesPencarian']);
Route::get('/hasilPencarian/{idPengujian}', [C_Home::class, 'hasilPengujian']);

// Halaman auth 
Route::get('/login', [C_Auth::class, 'loginPage']);
Route::post('/login/proses', [C_Auth::class, 'loginProses']);
Route::get('/auth/logout', [C_Auth::class, 'logout']);
// halaman admin 
Route::get('/app', [C_Admin::class, 'dashboardPage']);
Route::get('/app/data-kriteria', [C_Admin::class, 'dataKriteria']);
Route::get('/app/data-kost', [C_Admin::class, 'dataKost']);
Route::get('/app/tambah-kost', [C_Admin::class, 'tambahKost']);
Route::post('/app/tambah-kost/proses', [C_Admin::class, 'prosesTambahKost']);
Route::post('/app/kost/hapus/proses', [C_Admin::class, 'prosesHapusKost']);
