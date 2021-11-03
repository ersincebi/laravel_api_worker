<?php

namespace App\Http\Controllers\CRON;

use App\Constants\CronLogConstants;
use App\Http\Controllers\Controller;
use App\Helpers\GlobalHelpers;
use App\Facades\CronLog;
use App\Models\PurchaseModel;
use App\System\Constants\Keys\PurchaseKeys;

class UpdateExpiredRecordsController extends Controller
{
    public function index()
    {
        // The started log has thrown
        CronLog::cron(CronLogConstants::UPDATE_EXPIRED_RECORDS)
                ->message(__('general.started'))
                ->status(CronLogConstants::SUCCESS)
                ->save();

        // Here we find the expired records that also validated on PlatformAPIMock
        $purchases = PurchaseModel::select('id')
                                    ->where(PurchaseKeys::EXPIRE_DATE, '<', GlobalHelpers::dateNow())
                                    ->where('status', '=', true)
                                    ->get();

        if($purchases->count()){
            /**
             * here we are iterating records one by one in update process
             * Because we don't want to table to lock itself
             */
             foreach($purchases as $purchase){
                // Updating process has occurs for each record
                PurchaseModel::where(PurchaseKeys::ID, '=', $purchase->id)
                                ->update([
                                    PurchaseKeys::EXPIRE_DATE => GlobalHelpers::dateNow()
                                ]);

                // how many record has updated
                ++$this->count;
            }
            
            $this->success = true;

        } else {
            // if there is no record this log will be added to log table
            CronLog::cron(CronLogConstants::UPDATE_EXPIRED_RECORDS)
                    ->message(__('general.empty'))
                    ->status(CronLogConstants::WARNING)
                    ->save();

            $this->success = false;
            $this->error = __('general.empty');

            return response()->json([
                'success' => $this->success,
                'error' => $this->error
            ]);
        }
        // The ended log has thrown
        CronLog::cron(CronLogConstants::UPDATE_EXPIRED_RECORDS)
                ->message(__('general.ended'))
                ->status(CronLogConstants::WARNING)
                ->save();

        // information response for that corn ended successfully
        return response()->json([
            'success' => $this->success,
            'count' => $this->count,
            'error' => $this->error
        ]);
    }
}
