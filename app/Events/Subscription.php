<?php

namespace App\Events;

use App\Models\Vehicle;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Subscription
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    protected $user;
    protected $plan;
    public function __construct($user, $plan)
    {
        $this->user = $user;
        $this->plan = $plan;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): void
    {
        // $query = Vehicle::query();
        // if (!is_null($this->user->dealer_id)) {
        //     $query->where('dealer_id',$this->user->dealer_id);
        // }
        // $query->orWhere('user_id',$this->user->id)->update(['priority'=>$this->plan->priority,'sponsored'=>1]);
    // subscribe and send new subscription notification with validity and expiry of the subscription package
    }
}
