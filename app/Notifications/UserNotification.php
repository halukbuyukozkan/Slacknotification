<?php

namespace App\Notifications;

use App\Models\User as Model;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    use Queueable;

    private Model $model;

    public function __construct($model)
    {
        $this->model = $model;
    }


    public function via(): array
    {
        return ['slack'];
    }


    public function toSlack(): SlackMessage
    {
        return (new SlackMessage())
            ->content('deneme mesajı: ' . $this->model->name);
    }


}
