<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('分类菜单名称');
            $table->tinyInteger('status')->default(1)->comment('是否可见:0->不可见，1->可见');
            $table->tinyInteger('level')->default(1)->comment('分类菜单级别：1->顶级菜单，2->次级菜单');
            $table->tinyInteger('sort')->default(0)->comment('展示排序');
            $table->tinyInteger('pid')->default(0)->comment('父级ID：0->顶级菜单无父级');
            $table->string('icon_class')->nullable()->comment('顶级菜单图标，次级菜单无');
            $table->string('route')->nullable()->comment('路由名称');
            $table->string('url')->nullable()->comment('路由路径');
            $table->json('ext')->nullable()->comment('扩展字段');
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
        Schema::dropIfExists('menu_categories');
    }
}
