<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colleges;

class CollegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'province' => 'required',
            'regency' => 'required',
            'perguruan_tinggi' => 'required',
            'nama_narahubung' => 'required',
            'jabatan_narahubung' => 'required',
            'no_narahubung' => 'required',
            'document' => 'required|mimes:xls,xlsx|max:2048'
        ], [
            'jenjang_pendidikan.required' => 'Jenjang pendidikan wajib di isi',
            'provinsi.required' => 'Provinsi tidak boleh kosong',
            'kabupaten.required' => 'Kabupaten tidak boleh kosong',
            'satuan_pendidikan.required' => 'Satuan pendidikan tidak boleh kosong',
            'nama_narahubung.required' => 'Nama PIC tidak boleh kosong',
            'jabatan_narahubung.required' => 'Jabatan PIC tidak boleh kosong',
            'no_narahubung.required' => 'No PIC tidak boleh kosong',
            'document.required' => 'Document tidak boleh kosong',
            'document.mimes' => 'Document berbentuk xls atau xlsx',
        ]);
        $path = 'public/documents/';
        // upload document
        $document = $request->file('document');
        $nama_pt = $request->perguruan_tinggi;
        $nama_document = $nama_pt.'_'.$document->getClientOriginalName();
        $document->storePubliclyAs($path, $nama_document);

        $colleges = Colleges::create([
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'province_id' => $request->province,
            'regency_id' => $request->regency,
            'perguruan_tinggi' => $request->perguruan_tinggi,
            'nama_narahubung' => $request->nama_narahubung,
            'jabatan_narahubung' => $request->jabatan_narahubung,
            'no_narahubung' => $request->no_narahubung,
            'document' => $nama_document
        ]);

        if ($colleges) {
            return redirect('/survey')->with('success', 'Data success');
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
