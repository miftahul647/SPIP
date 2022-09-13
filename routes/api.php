<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API JAGA SEKOLAH
Route::get('/jaga/sekolah/jenjang-all', [\App\Http\Controllers\sekolah\DataApiJagaSekolahJenjangAllController::class, 'index']);

Route::get('/jaga/sekolah/search', [\App\Http\Controllers\sekolah\DataApiJagaSekolahSearchController::class, 'index']);

Route::get('/jaga/sekolah/npsn', [\App\Http\Controllers\sekolah\DataApiJagaSekolahNpsnController::class, 'index']);

Route::get('/jaga/sekolah/fasilitas/npsn', [\App\Http\Controllers\sekolah\DataApiJagaSekolahFasilitasNpsnController::class, 'index']);

Route::get('/jaga/sekolah/fasilitas/npsn/pegawai', [\App\Http\Controllers\sekolah\DataApiJagaSekolahFasilitasNpsnPegawaiController::class, 'index']);

Route::get('/jaga/sekolah/bos/years', [\App\Http\Controllers\sekolah\DataApiJagaSekolahBosYearsController::class, 'index']);

Route::get('/jaga/sekolah/bos/detail', [\App\Http\Controllers\sekolah\DataApiJagaSekolahBosDetailController::class, 'index']);

Route::get('/jaga/sekolah/bos/detail/komponen/penggunaan', [\App\Http\Controllers\sekolah\DataApiJagaSekolahBosDetailKomponenPenggunaanController::class, 'index']);

Route::get('/jaga/sekolah/isian-sekolah/detail-by-npsn', [\App\Http\Controllers\sekolah\DataApiJagaSekolahIsianSekolahDetailByNpsnController::class, 'index']);