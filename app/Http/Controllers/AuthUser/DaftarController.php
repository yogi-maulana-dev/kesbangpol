<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use App\Events\Auth\UserActivationEmail;
use Mail;
use Session;
use App\Mail\SendDemoMail;

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

        $token = Str::random(17);

        $validasi = $request->validate(
            [
                'nama' => 'required|max:255',
                'alamat' => 'required|max:255',
                'kodehp' => 'required',
                'nohp' => 'required',
                'username' => 'required|min:7|max:255|unique:users,username',
                'email' => 'required|email:dns|unique:users,email',
                'password' => 'required|min:8,password|max:255',
            ],
            [
                'username.unique' => 'Username sudah terdaftar, silakan coba yang lain',
                'email.unique' => 'Email sudah terdaftar, silakan coba yang lain',
                'password.min' => 'Password Minimal 8 digit',
            ],
        );

        $validasi['password'] = Hash::make($validasi['password']);
        $validasi['token_aja'] = $token;
        $validasi['iniVeri'] = false;

        User::create($validasi);

        $maildata = [
            'email' => $request->email,
            'token_aja' => $token,
        ];

        Mail::to($request->email)->send(new SendDemoMail($maildata));

        // $request->session()->flash('success', 'Pendaftaraan berhasil !!! Silakan login');

        return redirect('/login')->with('success', 'Silakan cek email yang sudah didaftarkan untuk verifikasi akun!!!');
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
