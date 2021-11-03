<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class PlatformAPIMock
{
	/**
	 * @param Request $request
	 * 
	 * @return bool
	 */
	public static function iosAPIMock(Request $request)
	{
		$lastChar = (int) substr($request->receipt_hash, -1);

		return ($lastChar % 2) ? false : true;
	}

	/**
	 * @param Request $request
	 * 
	 * @return bool
	 */
	public static function googleAPIMock(Request $request)
	{
		$lastChar = (int) substr($request->receipt_hash, -1);

		return ($lastChar % 2) ? true : false;
	}
}