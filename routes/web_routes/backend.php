<?php
//后台路由
Route::group(['prefix' => '/backend', 'namespace' => 'BackendControllers'], function () {
    Route::get('login', 'LoginController@login');
    //需要登录
    Route::group(['middleware' => 'admin.login'], function () {
        Route::get('home', 'IndexController@index');
    });
});