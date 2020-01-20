<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Binnacle;

class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->last_login = new \DateTime;
        
        $binnacle = Binnacle::create([
            'type' => 1,
            'action' => 'Ultimo Login',
            'user_id' => $event->user->id
        ]);

        $event->user->save();
    }
}
