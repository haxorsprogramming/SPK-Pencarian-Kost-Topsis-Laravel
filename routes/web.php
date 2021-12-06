<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Admin;
use App\Http\Controllers\C_Auth;

Route::get('/', [C_Home::class, 'homePage']);
Route::get('/pencarianKost', [C_Home::class, 'pencarianKost']);

// Halaman admin 
Route::get('/login', [C_Admin::class, 'loginPage']);