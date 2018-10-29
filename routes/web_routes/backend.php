<?php
//后台路由
Route::group(['prefix' => '/backend', 'namespace' => 'BackendControllers'], function () {

    //需要登录
    Route::group(['middleware' => 'admin.login:admin'], function () {
        Route::get('/', 'IndexController@index');

        //所属者路由组
        Route::group(['prefix' => 'boss', 'middleware' => ['owner.role:admin']], function () {
            //产品统计
            Route::group(['prefix' => 'product'], function () {
                Route::get('index/{type}', 'BossProductController@index');//产品统计,获取所有的产品
                Route::get('detail/{product_id}', 'BossProductController@getDetail');//获取产品的详情

            });
            //销售统计
            Route::group(['prefix' => 'sale'], function () {
                Route::get('index/{period}', 'BossSaleController@index');//销售统计
                Route::get('details/{name}', 'BossSaleController@details');//销售详情
            });
            //客户统计
            Route::group(['prefix' => 'cust'], function () {
                Route::get('index/{type}', 'BossCustController@index');//添加客户统计列表
                Route::get('register', 'BossCustController@register');//注册客户统计列表

            });
        });

        //admin权限路由组
        Route::group(['prefix' => 'role', 'middleware' => ['admin.role:admin']], function () {
            //权限管理
            Route::get("roles", "RoleController@roles"); //角色列表
            Route::get("permissions", "RoleController@permissions"); //权限列表
            Route::post("post_add_role", "RoleController@addRolePost"); //添加角色
            Route::get("omitRole", "RoleController@omitRole"); //删除角色
            Route::post("modify", "RoleController@modify"); //修改角色
            Route::post("post_add_permission", "RoleController@addPermissionPost"); //添加权限
            Route::get("omitpower", "RoleController@omitpower"); //删除权限
            Route::post("modifypower", "RoleController@modifypower"); //修改权限
            //角色与权限
            Route::get('role_bind_permission', "RoleController@roleBindPermission"); //角色权限查看
            Route::post('role_find_permissions', "RoleController@roleFindPermissions"); //根据角色找权限
            Route::post('attach_permissions', "RoleController@attachPermissions"); //角色权限绑定
            //用户与角色
            Route::get('user_bind_roles', "RoleController@userBindRoles"); //用户角色查看
            Route::post('user_find_roles', "RoleController@userFindRoles"); //根据用户找角色
            Route::post('attach_roles', "RoleController@attachRoles"); //用户角色绑定
        });

    });
});