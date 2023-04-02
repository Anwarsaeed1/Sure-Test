<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'system', 'namespace' => 'Item'], function () {
    Route::apiResource('item', 'ItemController');
    Route::patch('item_status/{id}', 'ItemController@itemChangeStatus');

});

