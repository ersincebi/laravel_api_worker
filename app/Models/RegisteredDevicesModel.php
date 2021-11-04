<?php

namespace App\Models;

use App\Request\Register\RegisterAddOrUpdateRequest;
use App\Request\Register\RegisterDeleteRequest;
use App\Request\Register\RegisterRequest;
use Datetime;
use Exception;
use Illuminate\Database\Eloquent\Model;

class RegisteredDevicesModel extends Model
{
    protected $table = 'registered_devices';

    /**
     * @param RegisterAddOrUpdateRequest $registerAddOrUpdateRequest
     * 
     * @return bool
     * @throws Exception
     */
    public static function registerAddOrUpdate(RegisterAddOrUpdateRequest $registerAddOrUpdateRequest)
    {
        $query = new self();

        if($registerAddOrUpdateRequest->getId() !== null){
            $query = self::find($registerAddOrUpdateRequest->getId());
            $query->update_at = new Datetime();
        }

        if($registerAddOrUpdateRequest->getUid() !== null){
            $query = self::find($registerAddOrUpdateRequest->getUid());
            if($query->count())
                return false;
            else
                $query->uid = $registerAddOrUpdateRequest->getUid();
        }

        if($registerAddOrUpdateRequest->getAppId() !== null)
            $query->appId = $registerAddOrUpdateRequest->getAppId();


        if($registerAddOrUpdateRequest->getLanguage() !== null)
            $query->language = $registerAddOrUpdateRequest->getLanguage();


        if($registerAddOrUpdateRequest->getDeviceOs() !== null)
            $query->device_os = $registerAddOrUpdateRequest->getDeviceOs();

        return $query->save();
    }

    /**
     * @return mixed
     */
    public static function registerList()
    {
        return self::select('appId', 'device_os', 'DAYNAME(created_ad)')
                    ->get();
    }

    /**
     * @param RegisterRequest $registerRequest
     * 
     * @return bool
     */
    public static function registerGet(RegisterRequest $registerRequest)
    {
        return self::where('uid', '=', $registerRequest->getUid())
                    ->first();
    }

    /**
     * @param RegisterRequest $registerRequest
     * 
     * @return bool
     */
    public static function registerDelete(RegisterDeleteRequest $registerDeleteRequest)
    {
        return self::where('uid', '=', $registerDeleteRequest->getUid())
                    ->delete();
    }
}
