<?php

namespace App\Models;

use App\Request\Purchase\PurchaseAddOrUpdateRequest;
use Datetime;
use Exception;
use Illuminate\Database\Eloquent\Model;

class PurchaseModel extends Model
{
	protected $table = 'purchases';

	/**
	 * @param PurchaseAddOrUpdateRequest $purchaseAddOrUpdateRequest
	 * 
	 * @return bool
	 * @throws Exception
	 */
	public static function purchaseAddOrUpdate(PurchaseAddOrUpdateRequest $purchaseAddOrUpdateRequest)
	{
		$query = new self();

		if($purchaseAddOrUpdateRequest->getId() !== null){
			$query = self::find($purchaseAddOrUpdateRequest->getId());
			$query->update_at = new Datetime();
		}

		if($purchaseAddOrUpdateRequest->getClientToken() !== null)
			$query->client_token = $purchaseAddOrUpdateRequest->getClientToken();

		if($purchaseAddOrUpdateRequest->getReceiptHash() !== null)
			$query->receipt_hash = $purchaseAddOrUpdateRequest->getReceiptHash();


		if($purchaseAddOrUpdateRequest->getStatus() !== null)
			$query->status = $purchaseAddOrUpdateRequest->getStatus();


		if($purchaseAddOrUpdateRequest->getExpireDate() !== null)
			$query->expire_date = $purchaseAddOrUpdateRequest->getExpireDate();

		return $query->save();
	}

}
