<?php
//需要登录
Route::group(['middleware' => 'guest', 'namespace' => 'GuestControllers'], function () {
    Route::get('home', 'UserController@index');   //用户中心首页
});

