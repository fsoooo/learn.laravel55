<?php
//前台路由
Route::group(['namespace' => 'FrontendControllers'], function () {
    //前台路由
    Route::get('/', 'IndexController@index');
    Route::get('login', 'LoginController@login');
    Route::get('register', 'LoginController@register');
    //测试路由
    Route::get('redisLock', 'IndexController@redisLock');
    Route::get('redisUnlock', 'IndexController@redisUnlock');
    //需要登录
    Route::group(['middleware' => 'user.login'], function () {
        Route::get('home', 'JobsController@home');
    });
});





