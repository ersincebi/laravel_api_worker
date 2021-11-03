<?php

namespace App\Facades;

use App\Constants\ServiceConstants;
use Illuminate\Support\Facades\Facade;

class CronLog extends Facade
{
    /**
     * @return string
     * @method static cron($cronId)
     */
    protected static function getFacadeAccessor()
    {
        return ServiceConstants::CRON_LOG;
    }
}