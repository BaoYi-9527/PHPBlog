<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['admin.auth']],function () {
//Route::group(['middleware' => []],function () {
    # 文章
    Route::prefix('article')->name('article.')->group(function () {
        # 编辑器-写作
        Route::get('editor','ArticleController@editor')->name('editor');
        # 文章发布
        Route::post('publish','ArticleController@publish')->name('publish');
        # 文章列表
        Route::get('list','ArticleController@list')->name('list');
        # 编辑文章
        Route::get('update','ArticleController@update')->name('update');

    });
    # 菜单
    Route::prefix('menu')->name('menu.')->group(function () {
        # 列表
        Route::get('list','MenuController@list')->name('list');
        # 新增
        Route::post('create','MenuController@create')->name('create');
        # 删除
        Route::post('delete','MenuController@delete')->name('delete');
        # 更新
        Route::post('update','MenuController@update')->name('update');
    });
});
