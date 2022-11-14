<?php

namespace App\Http\Controllers\components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class PaginationsController extends Controller
{
    // public function paginate($items, $perPage = 10, $page = null)
    public function paginate($items)
    {

        $page = !empty($response['page']) ? (int) $response['page'] : 1;
        $perPage = !empty($response['per_page']) ? (int) $response['per_page'] : 10;
        
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $itemsPerpage = $items->forPage($page, $perPage)->values();
        return new LengthAwarePaginator($itemsPerpage, $items->count(), $perPage, $page);
    }
}
