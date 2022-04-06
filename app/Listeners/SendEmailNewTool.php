<?php

namespace App\Listeners;

use App\Events\NewTool;
use App\Mail\PostNewToolMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailNewTool implements ShouldQueue
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
     * @param  \App\Events\NewTool  $event
     * @return void
     */
    public function handle(NewTool $event)
    {
        Log::info('Listener SendEmailNewTool');
//        $tool = $event->tool();
//
//        Mail::to($tool)->send(new PostNewToolMail($tool));
    }
}
