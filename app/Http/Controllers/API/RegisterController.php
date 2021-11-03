<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\RegisterService;
use App\Helpers\GlobalHelpers;
use App\Parser\RegisterParser;
use App\Models\RegisteredDevicesModel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$registerListResult = RegisterService::registerList();

		return response()->json(GlobalHelpers::objectToArray($registerListResult));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$registerAddRequest = RegisterParser::parseRegisterAddOrUpdate($request);
		$registerAddResult = RegisterService::registerAdd($registerAddRequest);

		return response()->json(GlobalHelpers::objectToArray($registerAddResult));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(RegisteredDevicesModel $registerAddRequest)
	{
		$registerGetRequest = RegisterParser::parseRegisterGet($registerAddRequest);
		$registerGetResult = RegisterService::registerGet($registerGetRequest);

		return response()->json(GlobalHelpers::objectToArray($registerGetResult));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\RegisteredDevicesModel $registerAddRequest
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, RegisteredDevicesModel $registerAddRequest)
	{
		$registerUpdateRequest = RegisterParser::parseRegisterAddOrUpdate($request);
		$registerUpdateResult = RegisterService::registerUpdate($registerUpdateRequest);

		return response()->json(GlobalHelpers::objectToArray($registerUpdateResult));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\RegisteredDevicesModel $registerAddRequest
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(RegisteredDevicesModel $registerAddRequest)
	{
		
		$registerDeleteRequest = RegisterParser::parseRegisterDelete($registerAddRequest);
		$registerDeleteResult = RegisterService::registerDelete($registerDeleteRequest);

		return response()->json(GlobalHelpers::objectToArray($registerDeleteResult));
	}
}
