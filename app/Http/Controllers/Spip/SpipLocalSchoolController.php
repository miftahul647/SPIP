<?php

namespace App\Http\Controllers\Spip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViewReportSekolah;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\ReportSekolahExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use File;

class SpipLocalSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $jenjang)
    {   
        $data ['jenjang'] = $jenjang;
        
        return view('pages.spip.LocalSchool.index', $data);
    }

    public function data(Request $request, $jenjang)
    {   
        $modelReportSekolah = ViewReportSekolah::query();
        return DataTables::eloquent($modelReportSekolah)
            ->filter(function ($query) {
                    if (request()->get('filterJenjang')) {
                        $query->where('jenjang', request('filterJenjang'));
                    }
                    if (request()->get('filterProvinsi')) {
                        $query->where('provinsi', 'like', "%" . request('filterProvinsi') . "%");
                    }

                    if (request()->input('search.value')) {
                        $query->where('satuan_pendidikan', 'like', "%" . request('search.value') . "%")
                        ->orWhere('provinsi', 'like', "%" . request('search.value') . "%")
                        ->orWhere('kabupaten', 'like', "%" . request('search.value') . "%")
                        ->orWhere('NPSN', 'like', "%" . request('search.value') . "%");
                    }
                })
            ->toJson();
    }
    // Download document
    public function downloadExcel($id) {
        $document_uploads = ViewReportSekolah::where('id', $id)->first();
        $filePath = public_path("storage/documents/{$document_uploads->document}");
        return response()->download($filePath); 
        // return dd($document_uploads->document);
    }

    // Export data to excel
    public function export() 
    {
        return Excel::download(new ReportSekolahExport, 'report_sekolah_terbaru.xlsx');
    }

    //export document to zip
    public function exportToZip()
    {
        $zip = new ZipArchive;
        $fileName = 'upload_excel_terbaru.zip';
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
