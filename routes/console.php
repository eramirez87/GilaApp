<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\Models\App\Http\Controllers\NotificationController;

Artisan::command('sendNotification', function () {
    $nc = new App\Http\Controllers\NotificationController();
    $nc->send();
    return true;
})->everyFiveMinutes();
