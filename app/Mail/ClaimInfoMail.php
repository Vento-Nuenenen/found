<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Claim;

class ClaimInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $claim;
    public $item;
    public $user;

    /**
     * Create a new message instance.
     *
     * @param $claim
     * @param $item
     * @param $user
     */
    public function __construct($claim, $item, $user)
    {
        $this->claim = $claim;
        $this->item = $item;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.claim_info', ['item' => $this->item, 'claim' => $this->claim, 'user' => $this->user])
            ->subject('Lost & Found - Pfadi Nünenen');
    }
}
