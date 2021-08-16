<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\RegistrEquipment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RegisterEquipment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $equimpent;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($equimpent)
    {
        $this->equimpent = $equimpent;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find(auth()->user()->id);
        $user->notify(new RegistrEquipment($this->equimpent));
    }
}
