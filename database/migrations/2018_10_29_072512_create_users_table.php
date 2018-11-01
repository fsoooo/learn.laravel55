<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('简称');
            $table->string('real_name')->comment('真实全称');
            $table->string('email', 100)->comment('邮箱');
            $table->string('phone', 11)->comment('手机号');
            $table->string('code')->comment('身份标识');
            $table->string('occupation')->comment('用户职业')->default('默认职业');
            $table->string('address')->comment('地址');
            $table->string('type')->comment('客户类型')->default('user');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
