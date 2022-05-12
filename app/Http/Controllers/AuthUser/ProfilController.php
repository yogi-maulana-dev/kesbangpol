<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    //
    public function index()
    {
        return view('admin.profil', ['judul' => 'Halaman Profil']);
    }
}
