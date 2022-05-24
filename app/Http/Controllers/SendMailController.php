<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\SendData;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class SendMailController extends Controller
{
    //
    public function send_mail(Request $request)
    {
        // 	$details = [
        // 		'subject' => 'Test Notification'
        // 	];

        //     $job = (new \App\Jobs\SendQueueEmail($details))
        //         	->delay(now()->addSeconds(2));

        //     dispatch($job);
        //     echo "Mail send successfully !!";
        // }
        $maildata = [
            'nama' => $request->nama,
            'email' => $request->email,
        ];

        Mail::to($request->email)->send(new SendData($maildata));

        return redirect('/menudata')->with('success', 'Notifikasi data lengkap sudah di kirim');
    }
}
