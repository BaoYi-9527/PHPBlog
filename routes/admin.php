<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['admin.auth']],function () {
    # 文章
    Route::prefix('article')->name('article.')->group(function () {
        # 编辑器-写作
        Route::get('editor','ArticleController@editor')->name('editor');
        # 文章发布
        Route::post('publish','ArticleController@publish')->name('publish');

    });
});
