<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ChirpCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $bug;
    public $message;
    public function __construct($bug)
    {
        $this->bug=$bug;
        $this->message="you have been assigned a new task";
        Log::info('ChirpCreated event created for bug ID: ' . $bug->id);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('notification.'.$this->bug->assigned_to),
        ];
    }
    public function broadcastAs(){
        Log::info('name of broadcast ' . $this->bug->id);
        return "notify.me";
    }

    public function broadcastWith()
    {
        $data = [
            'bug_id' => $this->bug->id,
            'bug_title' => $this->bug->title,
            'message' => $this->message
        ];
        Log::info('Broadcasting data: ' . json_encode($data));
        return $data;
    }
}
