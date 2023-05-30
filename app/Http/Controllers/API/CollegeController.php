<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MasterCollege;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CollegeController extends Controller
{
    public function colleges(Request $request, $regencies_id)
    {
        $results = MasterCollege::where('regency_id', $regencies_id)->get();
        return $results;
    }
}
