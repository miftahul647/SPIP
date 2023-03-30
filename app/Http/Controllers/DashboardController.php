<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Tableau;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTableau = 'webviewer';
        $serverTableau = 'statistik.kpk.go.id';
        $viewOne = 'PAK_instansi_sekolah_tab_1/PAK_Tab1';
        $viewTwo = 'PAK_instansi_sekolah_tab_2/PAK_Tab2';
        $viewThree = 'PAK_instansi_sekolah_tab_3/PAK_Tab3';
        $viewFour = 'PAK_instansi_sekolah_tab_4/PAK_Tab4';
        $viewFive = 'PAK_instansi_sekolah_tab_5/PAK_Tab5';

        $tableau_client = new Tableau();
        // $tableau_response = $tableau_client->get_trusted_url_tableau($userTableau, $serverTableau, $view_url);
        $tableau_response = array(
            'pakOne' => $tableau_client->get_trusted_url_tableau($userTableau, $serverTableau, $viewOne),
            'pakTwo' => $tableau_client->get_trusted_url_tableau($userTableau, $serverTableau, $viewTwo),
            'pakThree' => $tableau_client->get_trusted_url_tableau($userTableau, $serverTableau, $viewThree),
            'pakFour' => $tableau_client->get_trusted_url_tableau($userTableau, $serverTableau, $viewFour),
            'pakFive' => $tableau_client->get_trusted_url_tableau($userTableau, $serverTableau, $viewFive),
        );

        return view('pages.dashboard', [
            'tableau_response' => $tableau_response
        ]);
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
