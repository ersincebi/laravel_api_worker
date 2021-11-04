<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PurchaseModel;
use App\Parser\PurchaseParser;
use App\Services\PurchaseService;
use App\Helpers\GlobalHelpers;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchaseAddRequest = PurchaseParser::parsePurchaseAddOrUpdate($request);
        $purchaseAddResult = PurchaseService::purchaseAdd($purchaseAddRequest);

        return response()->json(GlobalHelpers::objectToArray($purchaseAddResult));
    }
}
