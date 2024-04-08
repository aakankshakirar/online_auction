<?php

namespace App\Mail;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AuctionWinnerNotification extends Mailable {
    use Queueable, SerializesModels;
    
    /**
    * The item instance.
    *
    * @var \App\Models\Item
    */
    public $item;

    /**
    * Create a new message instance.
    *
    * @param  \App\Models\Item  $item
    * @return void
    */

    public function __construct( Item $item ) {
        $this->item = $item;
    }

    /**
    * Get the message envelope.
    */

    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Auction Winner Notification',
        );
    }

    /**
    * Get the message content definition.
    */

    public function content(): Content {
        return new Content(
            markdown: 'emails.auction_winner_notification',
        );
    }

    /**
    * Get the attachments for the message.
    *
    * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    */

    public function attachments(): array {
        return [];
    }
}
