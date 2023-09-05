<?php

use Application\Http\Controllers\Users\Web\GetFormUserController;
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

