<?php

namespace App\Jobs;

use App\Mail\EmailForQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected $title;
    protected $email;

    public function __construct($email, $title)
    {
        $this->title = $title;
        $this->email = $email;
    }

    public function handle()
    {
        $email = new EmailForQueue($this->title);
        Mail::to($this->email)->send($email);
    }
}
