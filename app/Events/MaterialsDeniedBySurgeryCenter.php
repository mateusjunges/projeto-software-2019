<?php

namespace HUAC\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MaterialsDeniedBySurgeryCenter implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $surgery;

    /**
     * Create a new event instance.
     *
     * @param $surgery
     */
    public function __construct($surgery)
    {
        $this->surgery = $surgery;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('denied-surgery-center-materials');
    }

    public function broadcastAs()
    {
        return 'denied-surgery-center-materials';
    }
}
