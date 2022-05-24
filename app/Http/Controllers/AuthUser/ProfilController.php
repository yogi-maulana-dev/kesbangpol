<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use App\Mail\MainReset;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\SendDemoMail;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    //
    public function index()
    {
        return view('user.profil', ['judul' => 'Halaman Profil']);
    }

    public function update(Request $request)
    {
        // $user = User::where('id', $request->id)->first();

        // $validasi['password'] = Hash::make($validasi['password']);

        // $user->update([
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'nohp' => $request->nohp,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // $user->save();

        $user = User::where('id', $request->profil)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'username' => $request->username,
            // 'email' => $request->email,
            // 'password' => Hash::make($request->password),
        ]);

        return redirect('/profil')->with('success', 'Data Profil Organisasi Berhasil diedit');
    }
}
