<?php

namespace App\Http\Controllers\AuthAdmin;

use Illuminate\Http\Request;
use App\Models\Menudata;
use App\Models\Upload;
use App\Models\User;
use File;
use ZipArchive;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    //
    public function index()
    {
        //

        return view('admin.profil', [
            'judul' => 'Halaman Profil',
            'password' => Auth::guard('admin')->user()->password,
            'datas' => Upload::join('users', 'uploads.id_user', '=', 'users.id')->get(),
            'datacuk' => Upload::all(),
        ]);
    }
}
