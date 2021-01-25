<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', function(){
    return view('utama');
});

// Routes Provinsi
use App\Http\Controllers\ProvinsiController;
Route::resource('provinsi', ProvinsiController::class);

// Routes Kota 
use App\Http\Controllers\KotaController;
Route::resource('kota', KotaController::class);

//Routes Kecamatan
use App\Http\Controllers\KecamatanController;
Route::resource('kecamatan', KecamatanController::class);