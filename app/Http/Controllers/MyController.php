<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificationEvent;
use Pusher\Pusher;
class MyController extends Controller
{
    public function sendNotificationWithDifferentKeys(Request $request) {
        $request->validate([
            'appKey' => 'required|string',
            'appSecret' => 'required|string',
            'appId' => 'required|string',
            'cluster' => 'required|string',
            'channelName' => 'required|string',
            'roomId' => 'string',
            'title' => 'required|string',
            'message' => 'required|string',
            'payload' => 'string'
        ]);

        $APP_KEY = $request->appKey;
        $APP_SECRET = $request->appSecret;
        $APP_ID = $request->appId;
        $CLUSTER = $request->cluster;
        
        $channelName = $request->channelName;
        $roomId = $request->roomId;
        $title = $request->title;
        $messgae = $request->message;
        $roomId = $request->roomId;
        $payload = json_decode($request->payload, true);

        if($payload == null) $payload = 'there is no payload';

        $pusher = new Pusher(
            $APP_KEY,
            $APP_SECRET,
            $APP_ID,
            [
                'cluster' => $CLUSTER,
                'useTLS'  => true,
            ]
        );
        if($roomId == null)
        $pusher->trigger($channelName, 'noti.event', ['title' => $title, 'message' => $messgae, 'payload' => $payload]);
        else 
        $pusher->trigger($channelName.'.'.$roomId, 'noti.event', ['title' => $title, 'message' => $messgae, 'payload' => $payload]);

    return response()->json(['status' => 'Event has been added successfully']);
    }
}
