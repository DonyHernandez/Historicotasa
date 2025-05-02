<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateLastLoginTimestamp
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event. Actualiza el timestamp del último inicio de sesión
     */
    public function handle(object $event): void
    {
        $event->user->update([
            'last_login_at' => Carbon::now(),
        ]);
    }
}
