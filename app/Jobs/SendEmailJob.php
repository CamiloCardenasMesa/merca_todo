<?php

namespace App\Jobs;

use App\Notifications\Export;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $user;
    public $filePath;

    public function __construct($user, $filePath)
    {
        $this->user = $user;
        $this->filePath = $filePath;
    }

    public function handle()
    {
        $this->user->notify(new Export($this->filePath));
    }
}
