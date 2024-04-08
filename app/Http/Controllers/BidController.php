<?php

namespace App\Http\Controllers;

use App\Events\NewBidPlaced;
use App\Models\Bid;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BidController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        // Update or create the bid for the current user and item
        $bid = Bid::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'item_id' => $request->item_id,
            ],
            [
                'amount' => $request->amount,
            ]
        );

        $item = $bid->item;
        $data = [
            'highest_bids' => $item->bids->max('amount'),
            'total_bids' => $item->bids->count(),
            'placed_bids' => $item->bids->where('user_id', auth()->id())->max('amount')
        ];

        // Inside the method where the bid is placed
        broadcast(new NewBidPlaced($bid));

        // Return the JSON response with the data
        return Response::json($data);
    }

    public function checkWinningBids(Request $request)
    {
        $userId = auth()->id();

        // Query to check if the user has won any bids
        $wonBids = Item::whereNotNull('winner_id')
            ->get();

        if ($wonBids->count() > 0) {
            // User has won bids
            $message = 'Hurrah! You have won the bid for the following items: ';
            foreach ($wonBids as $item) {
                if ($item->winner_id == $userId) {
                    $message .= $item->title . ', ';
                }
            }
            $message = rtrim($message, ', ');
        } else {
            // User has not won any bids
            $message = 'Sorry, you have not won any bids yet.';
        }

        return response()->json(['message' => $message, 'user_id' => $userId]);
    }
}
