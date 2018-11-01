<?php
//测试路由
Route::group(['prefix' => '/test', 'namespace' => 'TestControllers'], function () {
    //测试异步队列
    Route::get('/jobs', 'JobsController@index');
});





