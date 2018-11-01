<?php
//前台路由
Route::group(['namespace' => 'FrontendControllers'], function () {
    //前台路由
    Route::get('/', 'JobsController@index');
    Route::get('login', 'LoginController@login');
    Route::get('register', 'LoginController@register');
    //需要登录
    Route::group(['middleware' => 'user.login'], function () {
        Route::get('home', 'JobsController@home');
    });
});





