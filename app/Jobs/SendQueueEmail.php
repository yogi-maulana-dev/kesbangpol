<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = User::all();
        $input['subject'] = $this->details['subject'];

        foreach ($data as $key => $value) {
            $input['email'] = $value->email;
            $input['nama'] = $value->name;
            \Mail::send('mail.Test_mail', [], function ($message) use ($input) {
                $message->to('yogimaulana100@gmail.com', $input['nama'])->subject($input['subject']);
            });
        }
    }
}
