<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;
<<<<<<<< HEAD:app/Http/Controllers/DaftarController.php
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DaftarController extends Controller
========

class TutorialController extends Controller
>>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f:app/Http/Controllers/TutorialController.php
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
<<<<<<<< HEAD:app/Http/Controllers/DaftarController.php
        return view('daftar', ["judul" => "Halaman Daftar"]);
========
>>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f:app/Http/Controllers/TutorialController.php
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

          $validasi= $request->validate([
             'nama' => 'required|max:255',
             'username' => ['required', 'min:7','max:255','unique:users'],
             'email' => 'required|email:dns|unique:users',
             'password' => 'required|min:8|max:255'
         ]);

         $validasi['password'] = Hash::make($validasi['password']);

 User::create($validasi);

// $request->session()->flash('success', 'Pendaftaraan berhasil !!! Silakan login');

 return redirect('/user')->with('success', 'Pendaftaraan berhasil !!! Silakan login');

 
    }

    /**
     * Display the specified resource.
     *
<<<<<<<< HEAD:app/Http/Controllers/DaftarController.php
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show(Daftar $daftar)
========
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Tutorial $tutorial)
>>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f:app/Http/Controllers/TutorialController.php
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<<< HEAD:app/Http/Controllers/DaftarController.php
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Daftar $daftar)
========
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutorial $tutorial)
>>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f:app/Http/Controllers/TutorialController.php
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<<< HEAD:app/Http/Controllers/DaftarController.php
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daftar $daftar)
========
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutorial $tutorial)
>>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f:app/Http/Controllers/TutorialController.php
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<<< HEAD:app/Http/Controllers/DaftarController.php
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftar $daftar)
========
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutorial $tutorial)
>>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f:app/Http/Controllers/TutorialController.php
    {
        //
    }
}
