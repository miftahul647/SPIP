<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataViewJagaSekolahSearchController extends Controller
{
    public function index()
    {
        $response = Http::get('https://bima.kpk.go.id/api/v5/sekolah/search?limit=12&offset=0&kota=tangerang selatan&jenjang=4&vnk=62087734');
        $apiJenjang = Http::get('https://bima.kpk.go.id/api/v5/sekolah/jenjang-all');

        $resultApiJenjang = $apiJenjang->json();
        $datas = $response->json();

        $listJenjang = collect($resultApiJenjang['data']['result'])->take(10);
        $data10 = collect($datas['data']['result'])->take(10);
        
        // dd($listJenjang);
        return view('pages.sekolah', [
            'datas' => $datas, 
            'data10' => $data10,
            'stages' => $listJenjang
        ]);
    }

    public function search(Request $request) 
    {
       $data = $request->all();
       $response = Http::get("https://bima.kpk.go.id/api/v5/sekolah/search?limit=12&nama={$data['nama_sekolah']}&offset=0&kota={$data['kota']}&jenjang={$data['jenjang_id']}&vnk=62087734");
       $apiJenjang = Http::get('https://bima.kpk.go.id/api/v5/sekolah/jenjang-all');

       $resultApiJenjang = $apiJenjang->json();
       $datas = $response->json();

       $listJenjang = collect($resultApiJenjang['data']['result'])->take(10);
       $data10 = collect($datas['data']['result'])->take(10);

        return view('pages.sekolah', [
            'data10' => $data10,
            'stages' => $listJenjang
        ]);
    }
}
