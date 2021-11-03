<?php

namespace App\Parser;

use App\Request\Register\RegisterAddOrUpdateRequest;
use App\Request\Register\RegisterDeleteRequest;
use App\Request\Register\RegisterRequest;
use App\System\Constants\Keys\RegisterKeys;
use Illuminate\Http\Request;

class RegisterParser
{
    /**
     * @return RegisterAddOrUpdateRequest
     */
    static function parseRegisterAddOrUpdate(Request $request)
    {
        $registerAddOrUpdateRequest = new RegisterAddOrUpdateRequest();

        if($request->input(RegisterKeys::ID) !== null)
            $registerAddOrUpdateRequest->setId($request->input(RegisterKeys::ID));

        if($request->input(RegisterKeys::UID) !== null)
            $registerAddOrUpdateRequest->setUid($request->input(RegisterKeys::UID));

        if($request->input(RegisterKeys::APPID) !== null)
            $registerAddOrUpdateRequest->setAppId($request->input(RegisterKeys::APPID));

        if($request->input(RegisterKeys::LANGUAGE) !== null)
            $registerAddOrUpdateRequest->setLanguage($request->input(RegisterKeys::LANGUAGE));

        if($request->header('User-Agent') !== null)
            $registerAddOrUpdateRequest->setDeviceOs($request->header('User-Agent'));

        return $registerAddOrUpdateRequest;
    }

    /**
     * @param Request $request
     * 
     * @return RegisterRequest
     */
    static function parseRegisterGet($uid)
    {
        $registerRequest = new RegisterRequest();

        $registerRequest->setUid($uid);

        return $registerRequest;
    }

    /**
     * @param Request $request
     * 
     * @return RegisterRequest
     */
    static function parseRegisterDelete($id)
    {
        $registerDeleteRequest = new RegisterDeleteRequest();

        $registerDeleteRequest->setUid($id);

        return $registerDeleteRequest;
    }
}