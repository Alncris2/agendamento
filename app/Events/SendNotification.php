<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $title;
    private $message;

    public function __construct($title, $message)
    {
        $this->title = $title;
        $this->message = $message;
    }

    public function broadcastWith(): array
    {
        return [
            'title' => $this->title,
            'message' => $this->message
        ];
    }

    public function broadcastOn()
    {
        return new Channel('notifications');
    }
    
    public function broadcastQueue(): string
    {
        return 'public-notification-queue';
    }
 }
