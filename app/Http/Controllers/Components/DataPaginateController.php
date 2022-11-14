<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPaginateController extends Controller
{
    public function dataPaginatePage() {
        return !empty($response['page']) ? (int) $response['page'] : 1;
    }

    public function dataPaginatePerPage() {
        return !empty($response['per_page']) ? (int) $response['per_page'] : 10;
    }
}
