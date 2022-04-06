<?php

namespace App\Providers;

use App\Models\Tool;
use App\Observers\ToolObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Tool::observe(ToolObserver::class);
    }
}
