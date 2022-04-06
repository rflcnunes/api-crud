<?php

namespace App\Events;

use App\Models\Tool;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewTool
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $tool;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tool $tool)
    {
        $this->tool = $tool;
    }

    public function tool(): Tool
    {
        return $this->tool;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
