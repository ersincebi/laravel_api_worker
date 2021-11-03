<?php
namespace App\Services;

use App\Models\PurchaseModel;
use App\Request\Purchase\PurchaseAddOrUpdateRequest;
use App\Result\ApiResult;
use Exception;

class PurchaseService
{
    /**
     * @param PurchaseAddOrUpdateRequest $purchaseAddOrUpdateRequest
     * 
     * @return ApiResult
     * @throws Exception
     */
    public static function purchaseAdd(PurchaseAddOrUpdateRequest $purchaseAddOrUpdateRequest)
    {
        $apiResult = new ApiResult();

        $purchaseAddResult = PurchaseModel::purchaseAddOrUpdate($purchaseAddOrUpdateRequest);

        if($purchaseAddResult) {
            $apiResult->setData([
                "status" => $purchaseAddOrUpdateRequest->getStatus(),
                "expire_date" => $purchaseAddOrUpdateRequest->getExpireDate()
            ]);
            $apiResult->setSuccess(true);
        }

        return $apiResult;
    }

    /**
     * @param PurchaseAddOrUpdateRequest $purchaseAddOrUpdateRequest
     * 
     * @return ApiResult
     * @throws Exception
     */
    public static function purchaseUpdate(PurchaseAddOrUpdateRequest $purchaseAddOrUpdateRequest)
    {
        $apiResult = new ApiResult();

        if($purchaseAddOrUpdateRequest->getId() === null) {
            $apiResult->setErrors([
                'error' => 'Purchase uid cannot be empty.'
            ]);

            return $apiResult;
        }

        $purchaseUpdateResult = PurchaseModel::purchaseAddOrUpdate($purchaseAddOrUpdateRequest);

        // Incase of returning false
        if(!$purchaseUpdateResult)
            return $apiResult;
        
        $apiResult->setSuccess(true);

        return $apiResult;
    }
}