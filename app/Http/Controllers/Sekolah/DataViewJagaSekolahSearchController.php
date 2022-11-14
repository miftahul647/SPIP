<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataViewJagaSekolahSearchController extends Controller
{
    public function index()
    {
        $response = Http::get('https://bima.kpk.go.id/api/v5/sekolah/search?limit=12&offset=0&kota=sumedang&nama=babakan&order_direction=asc&jenjang=1&vnk=62087734');

        $datas = $response->json();
        $data10 = collect($datas['data']['result'])->take(10);
        return view('test_sekolah.test_data_view_jaga_sekolah_search', ['datas' => $datas, 'data10' => $data10]);
    }
}
