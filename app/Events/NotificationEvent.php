<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $message;
    public $title;
    public $roomId;
    public $channelName;
    public function __construct($channelName, $roomId = null, $title, $message)
    {
        $this->channelName = $channelName;
        $this->roomId = $roomId;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        if($this->roomId == null)
        return [
            new Channel($this->channelName),
        ];
        return [new Channel($this->channelName.'.'.$this->roomId)];
    }
    public function broadcastAs(): string
    {
        return 'noti.sent';
    }
    public function broadcastWith(): array
    {
        return [
            'title' => $this->title,
            'message' => $this->message
        ];
    }
}
