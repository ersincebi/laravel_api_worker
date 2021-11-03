<?php

namespace App\Services;

use App\Helpers\GlobalHelpers;
use App\Models\LogModel;

class LogService
{
    /**
     * @var int
     */
    protected $cronId;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $status;

    /**
     * @param $cronId
     *
     * @return $this
     */
    public function cron($cronId): LogService
    {
        $this->cronId = $cronId;

        return $this;
    }

    /**
     * @param $message
     *
     * @return $this
     */
    public function message($message): LogService
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param $status
     *
     * @return $this
     */
    public function status($status): LogService
    {
        $this->status = $status;

        return $this;
    }

    public function save(): void
    {
        LogModel::insert(
            [
                'cron_id' => $this->cronId,
                'message' => $this->message,
                'status' => $this->status,
                'add_date' => GlobalHelpers::dateNow(),
            ]
        );
    }
}