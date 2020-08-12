<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ClaimMail;
use Mail;

class SendClaimMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $claim;
    public $item;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($claim, $item)
    {
        $this->claim = $claim;
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new ClaimMail($this->claim, $this->item);
        Mail::to($this->claim->customer_mail)->queue($email);
    }
}
