<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Upload;
use App\Models\Perpanjang;

class HomeController extends Controller
{
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

        return view('user.home', compact('daftar', 'perpanjang'),['judul' => 'Halaman Home']);
    }
}
