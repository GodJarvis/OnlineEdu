<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager', function (Blueprint $table) {
            // 设计字段
            // 主键字段
            $table->increments('id');
            // 用户名，varchar(20)，不能为null
            $table->string('username',20)->notNull();
            // 密码，varchar(255)，不能为null
            $table->string('password',255)->notNull();
            // 性别，1=男，2=女，3=保密
            $table->enum('gender',[1,2,3])->notNull()->default('1');
            // 手机号，varchar（11）
            $table->string('mobile',11);
            // 邮箱，varchar（50）
            $table->string('email',40);
            // 角色表中的主键id
            $table->tinyInteger('role_id');
            // create_at和updated_at时间字段（系统自己创建）
            $table->timestamps();
            // 实现记住登录状态字段，用于存储token
            $table->rememberToken();
            // 账号状态，1=禁用，2=启用
            $table->enum('status',[1,2])->notNull()->default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager');
    }
}
