<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Components\PaginationsController;
use App\Http\Controllers\Components\GetApiController;

class DataApiJagaSekolahBosYearsController extends Controller
{
    public function index()
    {
        try {
            $getApiInitialization = new GetApiController;
            $paginate_component = new PaginationsController;
            
            return response()->json(['data' => $paginate_component->paginate($getApiInitialization->getApi('https://bima.kpk.go.id/api/v5/bos/years?source=kemdikbud')['data'])], 200);   

            // return $getApiInitialization->getApi('https://bima.kpk.go.id/api/v5/bos/years?source=kemdikbud', ['data']);
        }catch(Exception $errors) {
            return response()->json(['error' => $errors->getMessage()], 500);
        }
    }
}
