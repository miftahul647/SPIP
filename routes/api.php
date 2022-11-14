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
Route::prefix('/jaga/sekolah')->group(function() {
    // Route::get('/jaga/sekolah/jenjang-all', [\App\Http\Controllers\Sekolah\DataApiJagaSekolahJenjangAllController::class, 'index']);
    Route::get('/jenjang-all', [\App\Http\Controllers\Sekolah\DataApiJagaSekolahJenjangAllController::class, 'index']);

    Route::get('/search', [\App\Http\Controllers\Sekolah\DataApiJagaSekolahSearchController::class, 'index']);

    Route::get('/npsn', [\App\Http\Controllers\Sekolah\DataApiJagaSekolahNpsnController::class, 'index']);

    Route::get('/fasilitas/npsn', [\App\Http\Controllers\Sekolah\DataApiJagaSekolahFasilitasNpsnController::class, 'index']);

    Route::get('/fasilitas/npsn/pegawai', [\App\Http\Controllers\Sekolah\DataApiJagaSekolahFasilitasNpsnPegawaiController::class, 'index']);

    Route::get('/bos/years', [\App\Http\Controllers\Sekolah\DataApiJagaSekolahBosYearsController::class, 'index']);

    Route::get('/bos/detail', [\App\Http\Controllers\Sekolah\DataApiJagaSekolahBosDetailController::class, 'index']);

    Route::get('/bos/detail/komponen/penggunaan', [\App\Http\Controllers\Sekolah\DataApiJagaSekolahBosDetailKomponenPenggunaanController::class, 'index']);

    Route::get('/isian-sekolah/detail-by-npsn', [\App\Http\Controllers\Sekolah\DataApiJagaSekolahIsianSekolahDetailByNpsnController::class, 'index']);
});
