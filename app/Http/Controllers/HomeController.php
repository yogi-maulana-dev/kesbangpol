<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\HomeController;
use App\Models\Home;
use App\Models\Categori;
use App\Models\Upload;
use App\Models\Perpanjang;

class HomeController extends Controller
{
    // public function __construct()
    // {
    // $this->middleware('auth');

    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $daftar = upload::count();
        $perpanjang = perpanjang::count();

        return view('home', compact('daftar', 'perpanjang'), [
            'judul' => 'Halaman Berita',
            'beritas' => Home::all(),
            'categoris' => categori::all(),
            'beritas' => Home::latest()
                ->filter(request(['cari']))
                ->paginate(6)
                ->withQueryString(),
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
    public function show(Home $home)
    {
        //
        return view('berita_single', ['judul' => 'Berita Single', 'berita' => $home, 'categoris' => categori::all()]);
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
