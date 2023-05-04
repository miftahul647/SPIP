<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternationalSchool;

class InternationalSchoolController extends Controller
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
        // $getRequestAll = $request->all();
        // dd($getRequestAll);
        $path = 'public/documents/';
        // upload document
        $document = $request->file('document');
        $nama_document = time().'_'.$document->getClientOriginalName();
        $document->storePubliclyAs($path, $nama_document);

        $international = InternationalSchool::create([
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'country_id' => $request->country_id,
            'satuan_pendidikan' => $request->satuan_pendidikan,
            'npsn' => $request->npsn,
            'nama_pic' => $request->nama_pic,
            'jabatan_pic' => $request->jabatan_pic,
            'no_pic' => $request->no_pic,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'document' => $nama_document
        ]);

        if ($international) {
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
