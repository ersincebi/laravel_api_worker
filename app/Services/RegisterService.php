<?php
namespace App\Services;

use App\Models\RegisteredDevicesModel;
use App\Request\Register\RegisterRequest;
use App\Request\Register\RegisterAddOrUpdateRequest;
use App\Request\Register\RegisterDeleteRequest;
use App\Result\ApiResult;
use App\Helpers\GlobalHelpers;
use Exception;

class RegisterService
{
    /**
     * @return ApiResult
     * @throws Exception
     */
    public static function registerList()
    {
        $apiResult = new ApiResult();

        $registerListResult = RegisteredDevicesModel::registerList();

        if($registerListResult) {
            $apiResult->setData($registerListResult);
            $apiResult->setSuccess(true);
        }

        return $apiResult;
    }

    /**
     * @param RegisterRequest
     * @return ApiResult
     * @throws Exception
     */
    public static function registerGet(RegisterRequest $registerRequest)
    {
        $apiResult = new ApiResult();

        $registerGetResult = RegisteredDevicesModel::registerGet($registerRequest);

        if($registerGetResult) {
            $apiResult->setData($registerGetResult);
            $apiResult->setSuccess(true);
        }

        return $apiResult;
    }

    /**
     * @param RegisterAddOrUpdateRequest $registerAddOrUpdateRequest
     * 
     * @return ApiResult
     * @throws Exception
     */
    public static function registerAdd(RegisterAddOrUpdateRequest $registerAddOrUpdateRequest)
    {
        $apiResult = new ApiResult();

        $registerAddResult = RegisteredDevicesModel::registerAddOrUpdate($registerAddOrUpdateRequest);

        if($registerAddResult) {
            $apiResult->setData([
                "register" => $registerAddResult,
                "client_token" => GlobalHelpers::makeClientToken($registerAddOrUpdateRequest)
            ]);
            $apiResult->setSuccess(true);
        }

        return $apiResult;
    }

    /**
     * @param RegisterAddOrUpdateRequest $registerAddOrUpdateRequest
     * 
     * @return ApiResult
     * @throws Exception
     */
    public static function registerUpdate(RegisterAddOrUpdateRequest $registerAddOrUpdateRequest)
    {
        $apiResult = new ApiResult();

        if($registerAddOrUpdateRequest->getUid() === null) {
            $apiResult->setErrors([
                'error' => 'Register uid cannot be empty.'
            ]);

            return $apiResult;
        }

        $registerUpdateResult = RegisteredDevicesModel::registerAddOrUpdate($registerAddOrUpdateRequest);

        // Incase of returning false
        if(!$registerUpdateResult)
            return $apiResult;
        
        $apiResult->setSuccess(true);

        return $apiResult;
    }

    /**
     * @param RegisterDeleteRequest $registerAddOrUpdateRequest
     * 
     * @return ApiResult
     * @throws Exception
     */
    public static function registerDelete(RegisterDeleteRequest $registerDeleteRequest)
    {
        $apiResult = new ApiResult();

        $registerDeleteResult = RegisteredDevicesModel::registerDelete($registerDeleteRequest);

        // Incase of returning false
        if($registerDeleteResult) {
            $apiResult->setData($registerDeleteResult);
            $apiResult->setSuccess(true);
        }

        return $apiResult;
    }
}