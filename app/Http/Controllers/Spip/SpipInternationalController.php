<?php

namespace App\Http\Controllers\Spip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViewReportInternationalSchool;
use App\Exports\ReportLuarNegriExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use ZipArchive;
use File;

class SpipInternationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $reportPerguruanTinggi = ViewReportInternationalSchool::query();

            return DataTables::eloquent($reportPerguruanTinggi)
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
                                <a class="dropdown-item" href="' . route('download-doc-ln', $item->id) . '">
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>';
                })
                ->rawColumns(['download'])
                ->toJson();
        }
        return view('pages.spip.InternationalSchool.index');
    }

    // Download document
    public function downloadExcel($id) {
        $document_uploads = ViewReportInternationalSchool::where('id', $id)->first();
        $filePath = public_path("storage/documents/{$document_uploads->document}");
        return response()->download($filePath); 
    }

    // Export data to excel
    public function export() 
    {
        return Excel::download(new ReportLuarNegriExport, 'report_sekolah_luar_negri_terbaru.xlsx');
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
