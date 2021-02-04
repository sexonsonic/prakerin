<?php

use App\Models\Provinsi;
use App\Models\Kasus2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API Provinsi
Route::get('provinsi', [ProvinsiController::class, 'index']);
Route::post('provinsi', [ProvinsiController::class, 'store']);
Route::get('provinsi/{id}', [ProvinsiController::class, 'show']);
Route::post('provinsi/update/{id}', [ProvinsiController::class, 'update']);
Route::delete('/provinsi/{id}', [ProvinsiController::class, 'destroy']);

// API Controller 
// Se Indonesia
Route::get('kasus2', [ApiController::class, 'index']);
// Per Provinsi
Route::get('kasus2/provinsi', [ApiController::class, 'provinsi']);
Route::get('kasus2//provinsi/{id}', [ApiController::class, 'showprov']);
// Per Kota
Route::get('kasus2/provinsi/kota', [ApiController::class, 'kota']);
Route::get('kasus2/provinsi/kota/{id}', [ApiController::class, 'showkot']);
// Per Kecamatan
Route::get('kasus2/provinsi/kota/kecamatan', [ApiController::class, 'kecamatan']);
Route::get('kasus2/provinsi/kota/kecamatan/{id}', [ApiController::class, 'showkec']);
// Per Kelurahan
Route::get('kasus2/provinsi/kota/kecamatan/kelurahan', [ApiController::class, 'kelurahan']);
Route::get('kasus2/provinsi/kota/kecamatan/kelurahan/{id}', [ApiController::class, 'showkel']);
// Per RW
Route::get('kasus2/provinsi/kota/kecamatan/kelurahan/rw', [ApiController::class, 'rw']);
Route::get('kasus2/provinsi/kota/kecamatan/kelurahan/rw/{id}', [ApiController::class, 'showrw']);