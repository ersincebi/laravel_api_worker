<?php

namespace App\Providers;

use App\Constants\ServiceConstants;
use App\Services\LogService;
use Illuminate\Support\ServiceProvider;

class CronLogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ServiceConstants::CRON_LOG, function() {
            return new LogService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}