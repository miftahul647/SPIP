<?php

namespace App\Http\Controllers\Spip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViewReportSekolah;
use Yajra\DataTables\Facades\DataTables;

class SpipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $reportSekolah = ViewReportSekolah::query();

            return DataTables::eloquent($reportSekolah)
                ->addColumn('download', function($item) {
                    return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                type="button" id="action"
                                    data-toggle="dropdown" 
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    Aksi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="action">
                                <a class="dropdown-item" href="' . route('download-doc', $item['id']) . '">
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>';
                })
                ->rawColumns(['download'])
                ->toJson();
        }
        // dd($reportSekolah);
        return view('pages.spip.index');
    }
    // Download document
    public function downloadExcel($id) {
        $document_uploads = ViewReportSekolah::where('id', $id)->first();
        return dd($document_uploads->document);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
