<?php

namespace App\Http\Controllers\Spip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViewReportPerguruanTinggi;
use App\Exports\ReportPerguruanTinggiExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use ZipArchive;
use File;

class SpipPerguruanTinggiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        if (request()->ajax()) {
            $reportPerguruanTinggi = ViewReportPerguruanTinggi::query();

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
                                <a class="dropdown-item" href="' . route('download-doc-pt', $item->id) . '">
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>';
                })
                ->rawColumns(['download'])
                ->toJson();
        }
        return view("pages.spip.PerguruanTinggi.index");
    }

    // Download document
    public function downloadExcel($id) {
        $document_uploads = ViewReportPerguruanTinggi::where('id', $id)->first();
        $filePath = public_path("storage/documents/{$document_uploads->document}");
        return response()->download($filePath); 
        // return dd($document_uploads->document);
    }

    // Export data to excel
    public function export() 
    {
        return Excel::download(new ReportPerguruanTinggiExport, 'report_perguruan_tinggi_terbaru.xlsx');
    }

    //export document to zip
    public function exportToZip()
    {
        $zip = new ZipArchive;
        $fileName = 'data-excel-pt-terbaru.zip';
        if($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('storage/documents'));
            foreach($files as $key => $value)
            {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        } 
        return response()->download(public_path($fileName));
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
