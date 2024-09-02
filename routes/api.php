<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::post('notiKeys', [MyController::class, "sendNotificationWithDifferentKeys"]);


Route::get('/hello', function () {
    return response()->json(['message' => 'HELLO']);
});