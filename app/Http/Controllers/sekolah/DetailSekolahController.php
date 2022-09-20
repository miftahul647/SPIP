<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetailSekolahController extends Controller
{
    public function index(Request $request, $id)
    {   
        $response = Http::get("https://bima.kpk.go.id/api/v5/sekolah?npsn={$id}");
        $data = $response->json();
        $result = $data['data']['result'];

        $responseFasilitas = Http::get("https://bima.kpk.go.id/api/v5/sekolah/fasilitas?npsn={$id}");
        $dataFasilitas = $responseFasilitas->json(['data']);
        $jmlPd = $dataFasilitas['result'][0]['jml_pd'];

        // dd($resultFasilitas);
        return view('pages.detail-sekolah', [
            'result' => $result,
            'jmlPd' => $jmlPd
        ]);
    }
}
