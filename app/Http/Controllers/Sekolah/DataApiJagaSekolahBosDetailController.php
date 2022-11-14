<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;
// use Illuminate\Pagination\Paginator;
// use Illuminate\Support\Collection;
// use Illuminate\Pagination\LengthAwarePaginator;

// * my controller
use App\Http\Controllers\Components\PaginationsController; // * before 3
use App\Http\Controllers\Components\DataPaginateController; // * before 1
use App\Http\Controllers\Components\GetApiController; // * before 0

class DataApiJagaSekolahBosDetailController extends Controller
{
    // public function index($items, $perPage = 10, $page = null, $options = [])
    public function index()
    {
        try { 
            // ambil data api jaga
            // * before 0
            // $response = Http::get('https://bima.kpk.go.id/api/v5/bos/detail?tahun=2020&npsn=20208347');
            // * afther 0
            $getApiInitialization = new GetApiController;
            //  - get solution 1
            // $response = $getApiInitialization->getApi('https://bima.kpk.go.id/api/v5/bos/detail?tahun=2020&npsn=20208347');
            //  - get solution 2
            // buat format data untuk aplikasi jardik
            $collection = $getApiInitialization->getApi('https://bima.kpk.go.id/api/v5/bos/detail?tahun=2020&npsn=20208347')['data']['result'];
            // * before 1
            // $page = !empty($response['page']) ? (int) $response['page'] : 1;
            // $perPage = !empty($response['per_page']) ? (int) $response['per_page'] : 10;
            // * afther 1
            // $data_paginate = new DataPaginateController;
            // * before 2
            // $paginate = $this->paginate($collection, $perPage, $page);
            // * before 3
            // $paginate = $paginate_component->paginate($collection, $data_paginate->dataPaginatePerPage(), $data_paginate->dataPaginatePage());
            // * afther 3
            // memanggil fitur pagination
            $paginate_component = new PaginationsController;
            $paginate = $paginate_component->paginate($collection);
            // kirimkan data berbentuk json
            return response()->json(['data' => $paginate], 200);
        }catch(Exception $errors) {
            return response()->json(['error' => $errors->getMessage()], 500);
        }
    }

    // private function paginate($items, $perPage = 10, $page = null)
    // {
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $items = $items instanceof Collection ? $items : Collection::make($items);
    //     $itemsPerpage = $items->forPage($page, $perPage)->values();
    //     return new LengthAwarePaginator($itemsPerpage, $items->count(), $perPage, $page);
    // }
}
