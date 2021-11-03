<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        ini_set('max_execution_time', -1);
        set_time_limit(0);
        ini_set('memory_limit','1024M');
    }

    /**
     * @var boolean
     */
    public $success;

    /**
     * @var boolean
     */
    public $count;

    /**
     * @var boolean
     */
    public $error;
}
