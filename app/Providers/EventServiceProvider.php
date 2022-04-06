<?php

namespace App\Providers;

use App\Events\DeleteTool;
use App\Events\NewTool;
use App\Events\UpdatedTool;
use App\Listeners\SendEmailDeleteTool;
use App\Listeners\SendEmailNewTool;
use App\Listeners\SendEmailUpdatedTool;
use App\Models\Tool;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewTool::class => [
          SendEmailNewTool::class,
        ],
        UpdatedTool::class => [
            SendEmailUpdatedTool::class,
        ],
        DeleteTool::class => [
          SendEmailDeleteTool::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
