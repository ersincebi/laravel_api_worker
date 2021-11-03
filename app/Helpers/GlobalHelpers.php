<?php

namespace App\Helpers;

use App\Constants\NumberConstants;
use App\Request\Register\RegisterAddOrUpdateRequest;
use App\Result\ApiResult;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

trait GlobalHelpers
{
	/**
	 * @param App\Request\Register\RegisterAddOrUpdateRequest $registerAddOrUpdateRequest
	 * 
	 * @return string
	 */
	public static function makeClientToken(): string
	{
		return Hash::make(self::dayAfter(NumberConstants::ONE));
	}

	/**
	 * @param string $format
	 * 
	 * @return string
	 */
	public static function dateNow(string $format = "Y-m-d H:m:i"): string
	{
		return Carbon::now()->format($format);
	}

	/**
	 * @param $day
	 * @param null $date
	 * 
	 * @return \Carbon\Carbon/false
	 */
	public static function dayAfter($day, $date = null)
	{
		$date = is_null($date) ? self::dateNow() : false;

		$date = Carbon::createFromFormat('Y-m-d H:m:i', $date);

		return $date->addDays($day);
	}

	/**
	 * @param $day
	 * @param null $date
	 * 
	 * @return \Carbon\Carbon/false
	 */
	public static function dayBefore($day, $date = null)
	{
		$date = is_null($date) ? self::dateNow() : false;

		$date = Carbon::createFromFormat('Y-m-d H:m:i', $date);

		return $date->subDays($day);
	}

	/**
	 * @param ApiResult
	 * 
	 * @return array
	 */
	public static function objectToArray(ApiResult $apiResult)
	{
		return [
			'success' => $apiResult->isSuccess(),
			'data' => $apiResult->getData(),
			'successMessage' => $apiResult->getSuccessMsg(),
			'errors' => $apiResult->getErrors()
		];
	}
}