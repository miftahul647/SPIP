<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataViewJagaSekolahNpsnController extends Controller
{
     public function index()
    {
        $response = Http::get('https://bima.kpk.go.id/api/v5/sekolah?npsn=20208347');

        $datas = $response->json();
        $data10 = collect($datas['data']['result'])->take(10);
        return view('test_sekolah.test_data_view_jaga_sekolah_npsn', ['datas' => $datas, 'data10' => $data10]);
    }
}
