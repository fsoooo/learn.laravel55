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

//前台路由
include_once "web_routes/frontend.php";
//后台路由
include_once "web_routes/backend.php";
//测试路由
include_once "web_routes/test.php";