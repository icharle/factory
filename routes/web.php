<?php

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

/**
 * "App\Http\Controllers\Admin"后台路由
 */
Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/', 'IndexController@login');
    Route::post('logincheck', 'IndexController@logincheck');


    Route::get('index', 'IndexController@index');

    /**
     * 组织风貌模块
     */
    //Banner管理
    Route::resource('StyleBanner', 'StyleBannerController');
    Route::post('StyleBanner/isUse/{id}', 'StyleBannerController@isUse');
    //活动记录
    Route::resource('StyleAct', 'StyleActController');
    //星空人去向
    Route::resource('StyleHis', 'StyleHisController');


    /**
     * 组织视频模块
     */
    //Banner管理
    Route::resource('VideoBanner', 'VideoBannerController');
    Route::post('VideoBanner/isUse/{id}', 'VideoBannerController@isUse');
    //作品管理
    Route::resource('VideoWork', 'VideoWorkController');


    /**
     * 三大中心模块
     */
    //Banner管理
    Route::resource('CenterBanner', 'CenterBannerController');
    Route::post('CenterBanner/isUse/{id}', 'CenterBannerController@isUse');
    //活动记录
    Route::resource('CenterAct', 'CenterActController');
    //工作记录
    Route::resource('CenterWork', 'CenterWorkController');
    //微信推文
    Route::resource('CenterWechat', 'CenterWechatController');
    //作品分类
    Route::resource('CenterProduction', 'CenterProductionController');

});

Route::namespace('Home')->group(function () {

    Route::get('/', 'IndexController@index');

    Route::get('center', 'IndexController@center');
    Route::get('style', 'IndexController@style');
    Route::get('video', 'IndexController@video');

});