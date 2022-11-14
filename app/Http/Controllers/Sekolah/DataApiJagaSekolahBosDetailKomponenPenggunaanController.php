<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Components\PaginationsController;
use App\Http\Controllers\Components\GetApiController;

class DataApiJagaSekolahBosDetailKomponenPenggunaanController extends Controller
{
    public function index()
    {
        try {
            $getApiInitialization = new GetApiController;
            // $response = $getApiInitialization->getApi('https://bima.kpk.go.id/api/v5/bos/detail?tahun=2020&npsn=20208347')['data']['result'];

            $collection = [];

            // $collections = $response;
            foreach($getApiInitialization->getApi('https://bima.kpk.go.id/api/v5/bos/detail?tahun=2020&npsn=20208347')['data']['result'] as $key => $item) :
                $collection += $item;
            endforeach;

            // return response()->json($collection);
            // return response()->json($collection['komponen_penggunaan']);

            $paginate_component = new PaginationsController;
            $paginate = $paginate_component->paginate($collection['komponen_penggunaan']);        

            return response()->json(['data' => $paginate], 200);   
        }catch(Exception $errors) {
            return response()->json(['error' => $errors->getMessage()], 500);
        }
    }
}
