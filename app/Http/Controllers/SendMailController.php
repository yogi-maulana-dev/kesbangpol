<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;

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
$details = [
'nama' => $request->nama
];

User::to($request->email)->send(new MailSend($details));

return "Email telah dikirim!";
}
}
