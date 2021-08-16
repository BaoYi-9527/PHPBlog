<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('username')->comment('用户名');
            $table->string('nickname')->comment('用户昵称');
            $table->string('password')->comment('用户密码');
            $table->integer('role')->default(1)->comment('用户角色：0->管理员，1->普通用户');
            $table->integer('phone')->nullable()->comment('手机号');
            $table->string('token')->nullable()->comment('用户token');
            $table->string('email')->nullable()->comment('用户邮箱');
            $table->string('head_img')->nullable()->comment('用户邮箱');
            $table->softDeletes();
            $table->timestamps();
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
