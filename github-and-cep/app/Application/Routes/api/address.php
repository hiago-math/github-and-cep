<?php


use Application\Http\Controllers\Address\DownloadListAddressController;
use Application\Http\Controllers\Address\ListAddressController;
use Application\Http\Controllers\Address\SearchAddressController;
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

Route::group(['prefix' => 'address'], function () {
    Route::get('', ListAddressController::class);
    Route::get('search', SearchAddressController::class);
    Route::get('download-csv', DownloadListAddressController::class);
});
