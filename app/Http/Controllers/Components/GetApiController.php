<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

// use App\Http\Controllers\Components\PaginationsController;

class GetApiController extends Controller
{
    // fungsi ini nyambung ke contoh penerapan DataApiJagaSekolahBosDetailController.php , DataApiJagaSekolahBosDetailKomponenPenggunaanController.php dan DataApiJagaSekolahBosYearsController.php
    public function getApi($endpoint) {
        // send solution 1
        return Http::get($endpoint);
        // send solution 2
        // $response = Http::get($endpoint);
        // return $response;
    }


    // public function getApi($endpoint, array $ambilJalurArray) {
        // $paginate_component = new PaginationsController;
        // print_r($ambilJalurArray);
        // dd($ambilJalurArray);
        // return 'a';
        // $jalur = [];

        // foreach ($ambilJalurArray as $key => $item) :
        //     $jalur = $item;
        // endforeach;

        // return $jalur;

        // echo $jalur;
        // $a = Http::get($endpoint)$ambilJalurArray;
        // return response()->json($paginate_component->paginate(Http::get($endpoint)));
    // }
}
