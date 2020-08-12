<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Claim;

class ClaimMail extends Mailable
{
    use Queueable, SerializesModels;

    public $claim;
    public $item;

    /**
     * Create a new message instance.
     *
     * @param Claim $claim
     */
    public function __construct($claim, $item)
    {
        $this->claim = $claim;
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.claim', ['item' => $this->item, 'claim' => $this->claim])
            ->subject('Lost & Found - Pfadi Nünenen');
    }
}
