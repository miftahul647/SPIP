<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CollectionDataSatdik;
use App\Http\Controllers\InternationalSchoolController;
use App\Http\Controllers\CollegesController;

//SPIP
use App\Http\Controllers\Spip\SpipLocalSchoolController;

use App\Http\Controllers\Admin\DashbboardController;
use App\Http\Controllers\Admin\MonitorAnggaranController;
use App\Http\Controllers\Admin\MonitorSuratTugasController;
use App\Http\Controllers\Admin\KegiatanInternalController;
use App\Http\Controllers\Admin\ManagementJejaringController;

use App\Http\Controllers\sekolah\DataViewJagaSekolahSearchController;
use App\Http\Controllers\sekolah\DetailSekolahController;

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


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sekolah', [DataViewJagaSekolahSearchController::class, 'index'])->name('sekolah');
Route::get('/sekolah/search', [DataViewJagaSekolahSearchController::class, 'search'])->name('search-sekolah');
Route::get('/sekolah/details/{id}', [DetailSekolahController::class, 'index'])->name('detail-sekolah');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('portal-dashboard');

Route::get('/survey', [CollectionDataSatdik::class, 'index'])->name('collect-data');
Route::post('/survey/localschool', [CollectionDataSatdik::class, 'storeLocalSchool'])->name('store-school');
Route::post('/survey/internationalschool', [InternationalSchoolController::class, 'store'])->name('international-school');
Route::post('/survey/college', [CollegesController::class, 'store'])->name('college');

Route::get('/downloadsekolah', [CollectionDataSatdik::class, 'downloadTemplatePopulasiSekolah'])->name('download-template-sekolah');
Route::get('/downloadtemplatePT', [CollectionDataSatdik::class, 'downloadTemplatePT'])->name('download-template-pt');

Route::get('/data-spip', [SpipLocalSchoolController::class, 'index'])->name('spip');
Route::get('/data-spip/documentExcel/download/{id}', [SpipLocalSchoolController::class, 'downloadExcel'])->name('download-doc');
Route::get('/data-spip/export', [SpipLocalSchoolController::class, 'export'])->name('download-excel');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', [DashbboardController::class, 'index'])->name('admin');
        Route::prefix('monitoring')
        ->group(function() {
            Route::resource('anggaran', MonitorAnggaranController::class);
            Route::resource('st', MonitorSuratTugasController::class);
        });
        Route::get('/kegiatan-internal', [KegiatanInternalController::class, 'index'])->name('kegiatan');
        Route::get('/management-jejaring', [ManagementJejaringController::class, 'index'])->name('jejaring');
});

Auth::routes();

// VIEW DARI API JAGA SEKOLAH
// Route::get('/jaga/sekolah/jenjang-all', function() {
//     return 'begus ibrahim';
// });

Route::get('/jaga/sekolah/jenjang-all', [\App\Http\Controllers\sekolah\DataViewJagaSekolahJenjangAllController::class, 'index']);

// Route::get('/jaga/sekolah/search', [\App\Http\Controllers\sekolah\DataViewJagaSekolahSearchController::class, 'index']);

Route::get('/jaga/sekolah/npsn', [\App\Http\Controllers\sekolah\DataViewJagaSekolahNpsnController::class, 'index']);

Route::get('/jaga/sekolah/fasilitas/npsn', [\App\Http\Controllers\sekolah\DataViewJagaSekolahFasilitasNpsnController::class, 'index']);

Route::get('/jaga/sekolah/bos/years', [\App\Http\Controllers\sekolah\DataViewJagaSekolahBosYearsController::class, 'index']);

Route::get('/jaga/sekolah/bos/detail', [\App\Http\Controllers\sekolah\DataViewJagaSekolahBosDetailController::class, 'index']);

Route::get('/jaga/sekolah/isian-sekolah/detail-by-npsn', [\App\Http\Controllers\sekolah\DataViewJagaSekolahIsianSekolahDetailByNpsnController::class, 'index']);