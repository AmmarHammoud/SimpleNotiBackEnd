<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

//Route::post('noti', [NotificationController::class, 'sendNotification']);