<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Export extends Notification
{
    use Queueable;

    public $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function via(): array
    {
        return ['mail'];
    }

    public function toMail(): MailMessage
    {
        return (new MailMessage())
                    ->line(trans('products.download_file'))
                    ->action(trans('buttons.download'), $this->filePath)
                    ->line(trans('products.thanks'));
    }
}
