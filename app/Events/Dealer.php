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
use Illuminate\Support\Facades\Session;

class Dealer
{
    use SerializesModels;

    public $dealer;
    public $user;
    /**
     * Create a new event instance.
     */
    public function __construct($dealer, $user)
    {
        $this->dealer = $dealer;
        $this->user = $user;
        $this->handle();
    }

    public function handle() {
        $this->user->dealer_id = $this->dealer->id;
        $this->user->update();
        Vehicle::where('user_id',$this->user->id)->update(['dealer_id'=>$this->dealer->id]);
        if (Session::has('dealerinfo')) {
            Session::forget('dealerinfo');
        }
    }
}
