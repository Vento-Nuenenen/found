<?php

namespace App\Jobs;

use App\Mail\ClaimInfoMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ClaimMail;
use Mail;

class SendClaimInfoMail implements ShouldQueue
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
        $users = User::all();

        foreach($users as $user){
            $email = new ClaimInfoMail($this->claim, $this->item, $user);
            Mail::to($user->email)->queue($email);
        }
    }
}
