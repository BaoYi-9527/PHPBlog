<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('文章标题');
            $table->tinyInteger('status')->default(1)->comment('状态：0->草稿，1->发布，2->隐藏');
            $table->tinyInteger('is_top')->default(0)->comment('是否置顶：0->否，1->是');
            $table->json('label_id')->nullable()->comment('文章所属标签ID，支持多标签');
            $table->tinyInteger('cate_id')->default(0)->comment('文章所属的分类菜单ID');
            $table->integer('views')->default(0)->comment('访问量');
            $table->string('cover')->nullable()->comment('文章封面，为空使用默认的封面');
            $table->string('desc')->nullable()->comment('文章序言/描述');
            $table->text('content')->comment('文章内容');
            $table->integer('comments_count')->default(0)->comment('评论数');
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
        Schema::dropIfExists('articles');
    }
}
