<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataViewJagaSekolahBosYearsController extends Controller
{
     public function index()
    {
        $response = Http::get('https://bima.kpk.go.id/api/v5/bos/years?source=kemdikbud');

        $datas = $response->json();
        $data10 = collect($datas['data'])->take(10);
        return view('test_sekolah.test_data_view_jaga_sekolah_bos_years', ['datas' => $datas, 'data10' => $data10]);
    }
}
