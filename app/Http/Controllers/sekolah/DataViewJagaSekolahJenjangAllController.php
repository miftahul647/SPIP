<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataViewJagaSekolahJenjangAllController extends Controller
{
    public function index()
    {
        // return 'begus ibrahim';
        $response = Http::get('https://bima.kpk.go.id/api/v5/sekolah/jenjang-all');

        $datas = $response->json();
        // return $datas;
        $data10 = collect($datas['data']['result'])->take(10);
        return view('test_sekolah.test_data_view_jaga_sekolah_jenjang_all', ['datas' => $datas, 'data10' => $data10]);
    }
}
