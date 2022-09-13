<?php

namespace App\Http\Controllers\sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class DataApiJagaSekolahJenjangAllController extends Controller
{
    public function index($items, $perPage = 10, $page = null, $options = [])
    {
        $response = Http::get('https://bima.kpk.go.id/api/v5/sekolah/jenjang-all');

        $collection = $response['data']['result'];
        $page = !empty($response['page']) ? (int) $response['page'] : 1;
        $perPage = !empty($response['per_page']) ? (int) $response['per_page'] : 10;
        $paginate = $this->paginate($collection, $perPage, $page);
        
        return response()->json($paginate);   
    }

    private function paginate($items, $perPage = 10, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $itemsPerpage = $items->forPage($page, $perPage)->values();
        return new LengthAwarePaginator($itemsPerpage, $items->count(), $perPage, $page);
    }
}
