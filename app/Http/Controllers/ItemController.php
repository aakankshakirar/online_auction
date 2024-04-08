<?php

namespace App\Http\Controllers;

use App\Mail\AuctionWinnerNotification;
use App\Models\Bid;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        // Fetch user's bids for each item
        $userBids = [];
        foreach ($items as $item) {
            $userBid = Bid::where('user_id', auth()->id())
                ->where('item_id', $item->id)
                ->first();
            $userBids[$item->id] = $userBid;
        }

        return view('items.index', compact('items', 'userBids'));
    }

    public function fetchHighestBidsForEachItem()
    {
        $items = Item::all();

        $highestBids = [];
        foreach ($items as $item) {
            $highestBid = $item->bids->max('amount');
            $highestBids[$item->id] = $highestBid;
        }

        return response()->json($highestBids);
    }

    public function determineWinners()
    {
        // Get all items
        $items = Item::all();

        foreach ($items as $item) {
            // Get the highest bid for the item
            $highestBid = $item->bids()->orderBy('amount', 'desc')->first();

            if ($highestBid) {
                // Mark the bidder of the highest bid as the winner
                $winnerId = $highestBid->user_id;
                $item->winner_id = $winnerId;
                $item->save();

                $winner = User::find($winnerId);
                // Send email notification to the winner
                Mail::to($winner)->send(new AuctionWinnerNotification($item));
            }
        }

        return response()->json(['message' => 'Winners determined successfully'], 200);
    }
}
