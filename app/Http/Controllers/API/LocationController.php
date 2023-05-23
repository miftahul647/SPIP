<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Jenjang;
use App\Models\School;
use App\Models\MasterSchool;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function provinces(Request $request)
    {
        return Province::all();
    }
    
    public function regencies(Request $request, $provinces_id)
    {
        return Regency::where('province_id', $provinces_id)->get();
    }
    
    public function jenjang(Request $request)
    {
        return Jenjang::all();
    } 

    public function schools(Request $request, $regencies_id, $jenjang_id)
    {
        $results = DB::table('master_schools')
                        ->where('regency_id', $regencies_id)
                        ->where('id_jenjang', $jenjang_id)
                        ->get();
        return $results;
    }
}
