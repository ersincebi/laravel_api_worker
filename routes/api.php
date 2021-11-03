<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\PurchaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Routes:
 * url: localhost:8081/api/register
 * method: post
 * exp: adds new register to table and returns client_token
 * 
 */
Route::resource('register', RegisterController::class);

/**
 * Routes:
 * url: localhost:8081/api/purchase
 * method: post
 * exp: adds new purchase to table and status and expire_date
 * 
 */
Route::resource('purchase', PurchaseController::class);