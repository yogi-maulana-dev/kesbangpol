<?php

namespace App\Http\Controllers;

use App\Models\Menudata;
use Illuminate\Http\Request;
use App\Models\Upload;

class MenudataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

               return view('admin.menudata', ['judul' => 'Halaman Data',
               'datas' => Upload::join('users', 'uploads.id_user', "=", 'users.id')
               ->get()
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
     * @param  \App\Models\Menudata  $menudata
     * @return \Illuminate\Http\Response
     */
    public function show(Menudata $menudata)
    {
        //



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menudata  $menudata
     * @return \Illuminate\Http\Response
     */
    public function edit(Menudata $menudata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menudata  $menudata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menudata $menudata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menudata  $menudata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menudata $menudata)
    {
        //
    }
}
