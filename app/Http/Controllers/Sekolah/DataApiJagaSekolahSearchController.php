<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Components\PaginationsController;
use App\Http\Controllers\Components\GetApiController;

class DataApiJagaSekolahSearchController extends Controller
{
    public function index()
    {
        try {
            $getApiInitialization = new GetApiController;
            $paginate_component = new PaginationsController;

            return response()->json(['data' => $paginate_component->paginate($getApiInitialization->getApi('https://bima.kpk.go.id/api/v5/sekolah/search?limit=12&offset=0&kota=sumedang&nama=babakan&order_direction=asc&jenjang=1&vnk=62087734')['data']['result'])],200);
        }catch(Exception $errors) {
            return response()->json(['error' => $errors->getMessage()], 500);
        }
    }
}
