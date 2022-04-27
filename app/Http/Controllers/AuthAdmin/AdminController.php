<?php

namespace App\Http\Controllers\AuthAdmin;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Upload;



class AdminController extends Controller
{
 public function __construct()
 {
 $this->middleware('auth');

 }
      /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    //
    return view('admin.index', ["judul" => "Halaman Login Admin",
    'datas' => Upload::where('id_user', auth()->user()->id)->get()]);
    }
}
