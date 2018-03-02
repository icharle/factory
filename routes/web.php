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
});