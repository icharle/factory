<?php

use Illuminate\Http\Request;

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

/**
 * 数据主要于api形式返回
 */
Route::group(['middleware' => 'api'], function () {

    //三大中心
    Route::post('sdzx', 'Home\ApiController@sdzx');

    //组织风貌
    Route::post('zzfm', 'Home\ApiController@zzfm');

    //组织视频
    Route::post('zzsp', 'Home\ApiController@zzsp');

});

