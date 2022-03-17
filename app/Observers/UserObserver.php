<?php

namespace App\Observers;

use App\Models\User as Model;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;

class UserObserver
{
    public static function saved(Model $model): void
    {
        Notification::route('slack', config('logging.channels.slack.url'))->notify(new UserNotification($model));
    }
}
