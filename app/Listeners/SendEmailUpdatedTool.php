<?php

namespace App\Listeners;

use App\Events\UpdatedTool;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendEmailUpdatedTool
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
     * @param  \App\Events\UpdatedTool  $event
     * @return void
     */
    public function handle(UpdatedTool $event)
    {
        Log::info('Listener SendEmailUpdatedTool');
    }
}
