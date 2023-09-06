<?php

use Application\Http\Controllers\Address\Web\CleanListAddressFormController;
use Application\Http\Controllers\Address\Web\DownloadCsvListAddressFormController;
use Application\Http\Controllers\Users\Web\GetFormUserController;
use Application\Http\Controllers\Address\Web\ListAddressFormController;
use Application\Http\Controllers\Address\Web\SearchAddressFormController;
use Application\Http\Controllers\Users\Web\SearchUserController;
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


Route::group(['prefix' => 'user'], function () {
    Route::get('/', GetFormUserController::class)->name('form.user');
    Route::get('/user-info', SearchUserController::class)->name('info.user');
});

Route::group(['prefix' => 'address'], function () {
    Route::get('/', ListAddressFormController::class)->name('list.address');
    Route::get('/search', SearchAddressFormController::class)->name('search.address');
    Route::patch('/clean', CleanListAddressFormController::class)->name('clean.address');
    Route::get('/download', DownloadCsvListAddressFormController::class)->name('download.list.address');
});

