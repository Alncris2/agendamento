<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendPrivateNotification implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $title;
    public $message;
    public $belogsTo;
    public $actionID;
    public $automatic;

    public function __construct($entity)
    {
        $this->title = $entity->title;
        $this->message = $entity->content;
        $this->belogsTo = $entity->user_id;
        $this->actionID = $entity->action_id;
        $this->automatic = $entity->automatic;
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
        return new PrivateChannel("App.Models.User.{$this->belogsTo}");
    }
    
    public function broadcastQueue(): string
    {
        return 'priv-notification-queue';
    }
}
