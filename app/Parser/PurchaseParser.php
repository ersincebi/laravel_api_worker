<?php

namespace App\Parser;

use App\Constants\NumberConstants;
use App\Request\Purchase\PurchaseAddOrUpdateRequest;
use App\System\Constants\Keys\PurchaseKeys;
use App\Helpers\PlatformAPIMock;
use App\Helpers\GlobalHelpers;
use Illuminate\Http\Request;

class PurchaseParser
{
	/**
	 * @return PurchaseAddOrUpdateRequest
	 */
	static function parsePurchaseAddOrUpdate(Request $request)
	{
		$purchaseAddOrUpdateRequest = new PurchaseAddOrUpdateRequest();

		if($request->input(PurchaseKeys::ID) !== null)
			$purchaseAddOrUpdateRequest->setId($request->input(PurchaseKeys::ID));

		if($request->input(PurchaseKeys::CLIENT_TOKEN) !== null)
			$purchaseAddOrUpdateRequest->setClientToken($request->input(PurchaseKeys::CLIENT_TOKEN));

		if($request->input(PurchaseKeys::RECEIPT_HASH) !== null)
			$purchaseAddOrUpdateRequest->setReceiptHash($request->input(PurchaseKeys::RECEIPT_HASH));

		
		if($request->header('User-Agent') == "iOS"){
			if(PlatformAPIMock::iosAPIMock($request)) {
				$purchaseAddOrUpdateRequest->setStatus(true);
				$purchaseAddOrUpdateRequest->setExpireDate(GlobalHelpers::dayAfter(NumberConstants::TEN));
			} else {
				$purchaseAddOrUpdateRequest->setStatus(false);
				$purchaseAddOrUpdateRequest->setExpireDate(GlobalHelpers::dateNow());
			}
		} else if($request->header('User-Agent') == "google") {
			if(PlatformAPIMock::googleAPIMock($request)) {
				$purchaseAddOrUpdateRequest->setStatus(true);
				$purchaseAddOrUpdateRequest->setExpireDate(GlobalHelpers::dayAfter(NumberConstants::TEN));
			} else {
				$purchaseAddOrUpdateRequest->setStatus(false);
				$purchaseAddOrUpdateRequest->setExpireDate(GlobalHelpers::dateNow());
			}
		}

		return $purchaseAddOrUpdateRequest;
	}
}