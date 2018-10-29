<?php

//use Illuminate\Http\Request;

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
Route::group(['prefix' => '/test', 'namespace' => 'FrontendControllers'], function () {
    Route::get('quote', 'WkTestController@quote');    //算费
    Route::get('buy_ins', 'WkTestController@buyIns');   //投保
    Route::get('check_ins', 'WkTestController@checkIns');   //核保
    Route::get('pay_ins', 'WkTestController@payIns');   //支付
    Route::get('issue', 'WkTestController@issue');   //出单
});

Route::group(['prefix' => 'sms', 'namespace' => 'FrontendControllers'], function () {
    Route::post('email', 'SmsController@sendEmail'); //发送邮件
});
