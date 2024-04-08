<!-- resources/views/items/index.blade.php -->

@extends('layouts.app')


@section('content')
@section('header')
    <header class="bg-white dark:bg-gray-800 shadow mb-4">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Item Listing
            </h2>
        </div>
    </header>
@endsection

<div class="container">
    <div id="successMessage" class="alert alert-success" style="display: none;">Message</div>
    <div id="notifyMessage">
        <div id="notification" class="alert alert-info" style="display: none;">Message</div>
    </div>

    <div id="winningBidNotification" class="alert alert-success" style="display: none;"></div>

    <div class="text-end mb-3">
        <a href="javascript:;" class="btn btn-lg btn-dark" id="determineWinner">Determine Winners</a>
    </div>
    @foreach ($items as $item)
        <div class="row mb-4">
            <div class="col-md-4 mb-4">
                <img src="{{ $item->thumbnail }}" class="img-fluid" alt="{{ $item->title }}">
            </div>
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $item->price }}</p>
                        <p class="card-text"><strong>Rating:</strong> {{ $item->rating }}</p>
                        <p class="card-text"><strong>Brand:</strong> {{ $item->brand }}</p>
                        <p class="card-text"><strong>Category:</strong> {{ $item->category }}</p>
                    </div>
                    <div class="card-footer d-flex">
                        @if (!empty($item->winner_id))
                            <button class="btn btn-lg btn-dark m-2 ">Bid Closed</button>

                            @if ($item->winner_id == auth()->id())
                                <button class="btn btn-lg btn-success m-2 ">Hurrah !! You have won this BID</button>
                            @else
                                <button class="btn btn-lg btn-danger m-2 ">Oops !! Sorry, You have lost this
                                    bid</button>
                            @endif
                            <button class="btn btn-secondary m-2" id="placed_bids_{{ $item->id }}">Placed Bid:
                                {{ $userBids[$item->id]->amount }}</button>
                        @else
                            <button class="btn btn-secondary m-2" id="highest_bids_{{ $item->id }}">Highest Bid:
                                {{ $item->bids->max('amount') != null ? $item->bids->max('amount') : 'No bids yet' }}</button>

                            <button class="btn btn-info m-2" id="total_bids_{{ $item->id }}">Total Bids:
                                {{ $item->bids->count() }}</button>

                            @if ($userBids[$item->id])
                                <button class="btn btn-danger m-2" id="placed_bids_{{ $item->id }}">Placed Bid:
                                    {{ $userBids[$item->id]->amount }}</button>
                                <button class="btn btn-warning m-2 bid-btn" data-item-id="{{ $item->id }}">Update
                                    Bid</button>
                            @else
                                <button class="btn btn-success m-2 bid-btn" data-item-id="{{ $item->id }}">Bid
                                    Now</button>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>

{{-- Include the submit bit modal --}}
@include('items._submit_bit_modal')

<script>
    function checkWinningBids() {
        $.ajax({
            url: '/check-winning-bids', // Replace with your route
            method: 'GET',
            success: function(response) {
                // Display the result
                // Display the result if user ID matches
                if (response.user_id == {{ auth()->id() }}) {
                    $('#winningBidNotification').text(response.message).show();
                    // Hide the notification after 5 seconds
                    setTimeout(function() {
                        $('#winningBidNotification').hide();
                    }, 7000);
                }

            },
            error: function(xhr, status, error) {
                console.error('Error checking winning bids:', error);
            }
        });
    }

    // Run the method every 5 seconds
    //setInterval(checkWinningBids, 8000);
</script>
@endsection
