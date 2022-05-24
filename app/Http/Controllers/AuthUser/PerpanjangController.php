<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Perpanjang;

class PerpanjangController extends Controller
{
    //

    public function index()
    {
        //
        return view('user.perpanjangan', ['judul' => 'Halaman Pepanjang', 'perpanjangans' => Perpanjang::where('id_user', auth()->user()->id)->get()]);
    }
}
