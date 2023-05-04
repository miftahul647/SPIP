<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\CountrySchoolController;

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

//API REGION
Route::get('provinces', [LocationController::class, 'provinces'])->name('api-provinces');
Route::get('regencies/{provinces_id}', [LocationController::class, 'regencies'])->name('api-regencies');
Route::get('schools/{regencies_id}', [LocationController::class, 'schools'])->name('api-schools');

//API COUNTRY
Route::get('countries', [CountrySchoolController::class, 'countries'])->name('api-countries');
Route::get('foreign/{countries_id}', [CountrySchoolController::class, 'foreignSchools'])->name('api-foreign-schools');

