<?php

namespace App\Listeners;

use App\Events\DeleteTool;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendEmailDeleteTool
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
     * @param  \App\Events\DeleteTool  $event
     * @return void
     */
    public function handle(DeleteTool $event)
    {
        Log::info('Listener SendEmailDeleteTool');
    }
}
