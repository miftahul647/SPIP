<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataViewJagaSekolahSearchController extends Controller
{
    protected $apiUrl;

    public function __construct() 
    {
        $this->apiUrl = env('API_URL');
    }

    public function index()
    {
        $api = $this->apiUrl;
        // dd($api);
        $response = Http::get("{$api}/search?limit=12&offset=0&kota=tangerang selatan&jenjang=4&vnk=62087734");
        $apiJenjang = Http::get("{$api}/jenjang-all");

        $resultApiJenjang = $apiJenjang->json();
        $datas = $response->json();

        $listJenjang = collect($resultApiJenjang['data']['result'])->take(10);
        $data10 = collect($datas['data']['result'])->take(10);
        
        // dd($data10);
        return view('pages.sekolah', [
            'datas' => $datas, 
            'data10' => $data10,
            'stages' => $listJenjang
        ]);
    }

    public function search(Request $request) 
    {
       $data = $request->all();
       $api = $this->apiUrl;

       $response = Http::get("{$api}/search?limit=12&nama={$data['nama_sekolah']}&order_direction=desc&offset=0&kota={$data['kota']}&jenjang={$data['jenjang_id']}&vnk=62087734");
       $apiJenjang = Http::get("{$api}/jenjang-all");

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
