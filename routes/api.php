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
Route::get('kasus2', [ApiController::class, 'index']);
Route::get('kasus2/{id}', [ApiController::class, 'show']);