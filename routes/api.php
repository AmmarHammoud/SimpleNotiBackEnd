<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::post('notiKeys', [MyController::class, "sendNotificationWithDifferentKeys"]);


Route::post('/test', function (Request $request) {
    $request->validate([
        'payload' => 'string',
    ]);
    $payload = json_decode($request->payload, true);
    return response()->json(['data' => $payload]);
});