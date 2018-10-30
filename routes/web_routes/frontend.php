<?php
//前台路由
Route::get('login', 'FrontendControllers\LoginController@login');
Route::get('register', 'FrontendControllers\LoginController@register');

//需要登录
Route::group(['middleware' => 'user.login', 'namespace' => 'FrontendControllers'], function () {
    Route::get('home', 'IndexController@index');
});

