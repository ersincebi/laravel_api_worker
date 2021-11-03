<?php

use App\Http\Controllers\CRON\UpdateExpiredRecordsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * url: localhost:8081/update-expired-dates
 * method: GET
 * parameter: No parameter needed
 */
Route::get('update-expired-dates', [UpdateExpiredRecordsController::class, 'index']);