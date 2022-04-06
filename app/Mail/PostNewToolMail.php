<?php

namespace App\Mail;

use App\Models\Tool;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostNewToolMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tool;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tool $tool)
    {
        $this->tool = $tool;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('New Tool')
            ->markdown('emails.created-email');
    }
}
