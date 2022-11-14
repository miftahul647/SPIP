<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataViewJagaSekolahFasilitasNpsnController extends Controller
{
     public function index()
    {
        $response = Http::get('https://bima.kpk.go.id/api/v5/sekolah/fasilitas?npsn=20208347');

        $datas = $response->json();
        $data10 = collect($datas['data']['result'])->take(10);
        $pegawai = [];
        foreach($data10 as $key => $item) :
            $pegawai += $item;
        endforeach;

        // return $pegawai['pegawai'];

        return view('test_sekolah.test_data_view_jaga_sekolah_fasilitas_npsn', ['datas' => $datas, 'data10' => $data10, 'pegawai' => $pegawai['pegawai']]);
    }
}
