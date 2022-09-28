<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Tools\FilterArray;


class DetailSekolahController extends Controller
{
    protected $apiUrl;

    public function __construct() 
    {
        $this->apiUrl = env('API_URL');
    }
    
    public function index(Request $request, $id)
    {   
        $api = $this->apiUrl;
        $response = Http::get("{$api}?npsn={$id}");
        $data = $response->json(['data']);
        $result = $data['result'][0];
        $provinsi = $result['provinsi'];
        $sliceProv = substr($provinsi, 6);

        $responseFasilitas = Http::get("{$api}/fasilitas?npsn={$id}");
        $dataFasilitas = $responseFasilitas->json(['data']);
        $getData = $dataFasilitas['result'][0];

        $jmlPd = $getData['jml_pd'];
        $totalGuru = $getData['jml_guru'];
        $countRasio = $jmlPd / $totalGuru;
        $rasio = round($countRasio);

        $rekapProfesiGuru = $result['guru_gty'] + $result['guru_pns'] + $result['guru_gtt'] + $result['guru_honor'];

        $teachers = [
            'GTY/PTY' => $result['guru_gty'],
            'PNS' => $result['guru_pns'],
            'GTT' => $result['guru_gtt'],
            'Guru Honorer' => $result['guru_honor'],
        ];
        
        $facilities = [
            'Perpustakaan' => $result['jml_perpus'],
            'Ruang Kelas' => $result['jml_rk'],
            'Laboratorium Bahasa' => $result['lab_bahasa'],
            'Laboratorium Biologi' => $result['lab_biologi'],
            'Laboratorium Fisika' => $result['lab_fisika'],
            'Laboratorium Ipa' => $result['lab_ipa'],
            'Laboratorium Ips' => $result['lab_ips'],
            'Laboratorium Kimia' => $result['lab_kimia'],
        ];
        
        $filterArray = new FilterArray();
        $filterFacilities = $filterArray->get_filter_array($facilities);
        
        // dd($filterFacilities);
        return view('pages.detail-sekolah', [
            'result' => $result,
            'jmlPd' => $jmlPd,
            'sliceProv' => $sliceProv,
            'totalGuru' => $totalGuru,
            'rasio' => $rasio,
            'rekapProfesi' => $rekapProfesiGuru,
            'teachers' => $teachers,
            'facilities' => $filterFacilities,
        ]);
    }
}
