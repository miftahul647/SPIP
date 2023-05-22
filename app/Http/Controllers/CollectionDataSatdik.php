<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalSchool;

class CollectionDataSatdik extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.collect-data-satdik');
    }

    public function downloadTemplatePopulasiSekolah() 
    {
        
        $file = public_path("file/downloads/Template-Data-Populasi-Sekolah-2023.xlsx");
        return response()->download($file);
    }

    public function downloadTemplatePT()
    {
        $filePath = public_path("file/downloads/Template-Data-Populasi-PT-2023.xlsx");
        return response()->download($filePath);
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
    public function storeLocalSchool(Request $request)
    {
        $this->validate($request, [
            'jenjang_pendidikan' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'satuan_pendidikan' => 'required',
            'npsn' => 'required',
            'nama_pic' => 'required',
            'jabatan_pic' => 'required',
            'no_pic' => 'required',
            'document' => 'required|mimes:xls,xlsx|max:2048'
        ], [
            'jenjang_pendidikan.required' => 'Jenjang pendidikan wajib di isi',
            'provinsi.required' => 'Provinsi tidak boleh kosong',
            'kabupaten.required' => 'Kabupaten tidak boleh kosong',
            'satuan_pendidikan.required' => 'Satuan pendidikan tidak boleh kosong',
            'npsn.required' => 'NPSN tidak boleh kosong',
            'nama_pic.required' => 'Nama PIC tidak boleh kosong',
            'jabatan_pic.required' => 'Jabatan PIC tidak boleh kosong',
            'no_pic.required' => 'No PIC tidak boleh kosong',
            'document.required' => 'Document tidak boleh kosong',
            'document.mimes' => 'Document berbentuk xls atau xlsx',
        ]);

        $path = 'public/documents/';
        // upload document
        $document = $request->file('document');
        $nama_document = time().'_'.$document->getClientOriginalName();
        $document->storePubliclyAs($path, $nama_document);

        $localSchool = LocalSchool::create([
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'satuan_pendidikan' => $request->satuan_pendidikan,
            'npsn' => $request->npsn,
            'nama_pic' => $request->nama_pic,
            'jabatan_pic' => $request->jabatan_pic,
            'no_pic' => $request->no_pic,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'document' => $nama_document
        ]);

        if ($localSchool) {
            return redirect('/survey')->with('success', 'Upload document succes');
        } else {
            return redirect('/survey')->with('failed', 'Something error');
        }

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
