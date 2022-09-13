<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataViewJagaSekolahBosDetailController extends Controller
{
     public function index()
    {
        $response = Http::get('https://bima.kpk.go.id/api/v5/bos/detail?tahun=2020&npsn=20208347');

        $datas = $response->json();
        $data10 = collect($datas['data']['result'])->take(10);
        $komponenPenggunaan = [];
        foreach($data10 as $key => $item) :
            $komponenPenggunaan += $item;
        endforeach;

        return view('test_sekolah.test_data_view_jaga_sekolah_bos_detail', ['datas' => $datas, 'data10' => $data10, 'komponenPenggunaan' => $komponenPenggunaan['komponen_penggunaan']]);
    }
}
