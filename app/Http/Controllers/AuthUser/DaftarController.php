<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.daftar', ['judul' => 'Halaman Daftar']);
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

        $validasi = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kodehp' => 'required',
            'nohp' => 'required',
            'username' => ['required', 'min:7', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
        ]);

        $validasi['password'] = Hash::make($validasi['password']);
        $validasi['token_aja'] = Str::random(8);
        $validasi['iniVeri'] = false;

        User::create($validasi);

        // $request->session()->flash('success', 'Pendaftaraan berhasil !!! Silakan login');

        return redirect('/login')->with('success', 'Pendaftaraan berhasil !!! Silakan login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show(Daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daftar $daftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftar $daftar)
    {
        //
    }
}
