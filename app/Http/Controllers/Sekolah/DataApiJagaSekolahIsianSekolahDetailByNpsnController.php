<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Components\PaginationsController;
use App\Http\Controllers\Components\GetApiController;

class DataApiJagaSekolahIsianSekolahDetailByNpsnController extends Controller
{
    public function index()
    {
        try {
            $getApiInitialization = new GetApiController;
            $paginate_component = new PaginationsController;

            return response()->json(['data' => $paginate_component->paginate($getApiInitialization->getApi('https://bima.kpk.go.id/api/v5/pak/isiansekolah/detailbynpsn/20208347')['data'])],200);   
        }catch(Exception $errors) {
            return response()->json(['error' => $errors->getMessage()], 500);
        }
    }}
