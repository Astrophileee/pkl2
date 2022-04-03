<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\BayarController;
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
    return view('home');
});

Route::get('/pasien', [PasienController::class, 'index']);
Route::get('pasien/create', [PasienController::class, 'create']);
Route::post('pasien/store', [PasienController::class,'store']);
Route::get('pasien/{pasien}/edit', [PasienController::class, 'edit']);
Route::patch('pasien/update', [PasienController::class,'update']);
Route::delete('pasien/delete', [PasienController::class,'destroy']);

Route::get('/dokter', [DokterController::class, 'index']);
Route::get('dokter/create', [DokterController::class, 'create']);
Route::post('dokter/store', [DokterController::class,'store']);
Route::get('dokter/{dokter}/edit', [DokterController::class, 'edit']);
Route::patch('dokter/update', [DokterController::class,'update']);
Route::delete('dokter/delete', [DokterController::class,'destroy']);

Route::get('/pemeriksaan', [PemeriksaanController::class, 'index']);
Route::get('/pemeriksaan/create', [PemeriksaanController::class, 'create']);
Route::post('/pemeriksaan/store', [PemeriksaanController::class,'store']);
Route::get('pemeriksaan/{pemeriksaan}/edit', [PemeriksaanController::class, 'edit']);
Route::patch('pemeriksaan/update', [PemeriksaanController::class,'update']);
Route::delete('pemeriksaan/delete', [PemeriksaanController::class,'destroy']);

Route::get('/bayar', [BayarController::class, 'index']);
Route::get('/bayar/create', [BayarController::class, 'create']);
Route::post('/bayar/store', [BayarController::class,'store']);
Route::get('bayar/{bayar}/edit', [BayarController::class, 'edit']);
Route::patch('bayar/update', [BayarController::class,'update']);
Route::delete('bayar/delete', [BayarController::class,'destroy']);
