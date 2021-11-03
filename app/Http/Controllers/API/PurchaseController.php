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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseModel  $purchaseModel
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseModel $purchaseModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseModel  $purchaseModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseModel $purchaseModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseModel  $purchaseModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseModel $purchaseModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseModel  $purchaseModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseModel $purchaseModel)
    {
        //
    }
}
