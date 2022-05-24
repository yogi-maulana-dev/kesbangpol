<?php

/**
 * Show the form for creating a new resource.
 * Whatapps 6289631031237
 * email : yogimaulana100@gmail.com
 * https://github.com/Ays1234
 * https://serbaotodidak.com/
 */

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\MainReset;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\SendDemoMail;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
    //

    public function index()
    {
        return view('user.verifikasi', ['judul' => 'Verifikasi Aplikasi Orkesmas']);
        //
    }

    public function verifikasi(Request $request)
    {
        $request->validate([
            'token_aja ' => 'token_aja',
        ]);

        $user = User::where('token_aja', $request->token_aja)->first();

        if ($user === null) {
            return redirect()
                ->back()
                ->with('loginError', 'OTP salah coba cek kembali !!!');
        } else {
            # code...
            $user->update([
                'iniVeri' => true,
                'token_aja' => null,
            ]);

            return redirect('/login')->with('success', 'Akun anda berhasil di Verifikasi !!! Silakan login');
        }

        // Mail::send('password.very',['token' => $token], function($message) use ($request) {
        //           $message->from($request->email);
        //           $message->to('kakvikunkhmer7777@gmail.com');
        //           $message->subject('Reset Password Notification');
        //       });

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */
    }

    public function reset(Request $request)
    {
        $token = Str::random(17);

        $validasi = $request->validate(
            [
                'email' => 'required|email|exists:users,email',
            ],
            ['email.exists' => 'Email tidak ditemukan, Silakan Cek Kembali'],
        );
        $user = User::where('email', $request->email)->first();

        if ($user === null) {
            return redirect()->back();
        } else {
            # code...
            $user->token_aja = $token;
            $user->save();

            $maildata = [
                'email' => $request->email,
                'token_aja' => $token,
            ];

            Mail::to($request->email)->send(new SendDemoMail($maildata));

            return redirect('/verifikasi')->with('success', 'Kode Verikasi sudah dikirim ulang Kembali');
        }

        // Mail::send('password.very',['token' => $token], function($message) use ($request) {
        //           $message->from($request->email);
        //           $message->to('kakvikunkhmer7777@gmail.com');
        //           $message->subject('Reset Password Notification');
        //       });

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */
    }
}
