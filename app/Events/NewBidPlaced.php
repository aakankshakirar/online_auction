<?php

namespace App\Events;

use App\Models\Bid;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewBidPlaced implements ShouldBroadcast {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct( Bid $bid ) {
        $this->message = "Exciting news! {$bid->user->name} has just joined the bidding frenzy, placing an impressive bid of {$bid->amount} on the {$bid->item->title}";
    }

    public function broadcastOn() {
        return new Channel( 'bids' );
    }
}
