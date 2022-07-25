<?php

namespace App\Http\Controllers\AuthUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use App\Mail\MainReset;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {
        return view('user.passwords.email', ['judul' => 'Reset password']);
    }

    public function postEmail(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users',
            ],
            ['email.exists' => 'Email tidak ditemukan, Silakan Cek Kembali'],
        );

        $token = Str::random(60);

        DB::table('password_resets')->insert(['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]);

        // Mail::send('password.very',['token' => $token], function($message) use ($request) {
        //           $message->from($request->email);
        //           $message->to('kakvikunkhmer7777@gmail.com');
        //           $message->subject('Reset Password Notification');
        //       });

        $details = [
            'email' => $request->email,
            'token' => $token,
        ];

        Mail::to($request->email)->send(new MainReset($details));

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
