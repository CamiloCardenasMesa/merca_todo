<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailForQueue extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('GeneralManager@gmail.com', 'Valentina')
            ->subject($this->title)
            ->with([
                'title' => $this->title,
            ]);
    }
}
