<?php

use Illuminate\Support\Facades\Route;

# 首页
Route::get('/','HomeController@index')->name('home');

# 公共上传文件上传
Route::any('upload/file','CommonController@uploadFile')->name('common.uploadFile');
# 清空该path目录的所有文件
Route::any('clear/files','CommonController@clearFiles')->name('common.clearFiles');
# 获取目录下文件信息
Route::any('get/files','CommonController@getFiles')->name('common.getFiles');
# 测试地址
Route::any('test','TestController@index')->name('common.test');

# 工具相关路由
Route::prefix('tools')->name('tools.')->namespace('Tools')->group(function (){
    # worry's tools
    Route::prefix('worry')->name('worry.')->group(function () {
        # worry's excel table
        Route::get('excel','WorryController@index')->name('excel');
        # 处理Excel
        Route::post('handleExcel','WorryController@handleExcel')->name('handleExcel');
        # 加载配置文件
        Route::post('loadConfig','WorryController@loadConfig')->name('loadConfig');
    });
    # SVG
    Route::prefix("svg")->name('svg.')->group(function () {
        # 展示页
        Route::get('index','SvgController@index')->name('index');
    });
});

# 文章相关路由
Route::prefix('article')->name('article.')->group(function () {
    # 文章页
    Route::get('detail','ArticleController@detail')->name('detail');
    # 获取文章列表 主要用于流加载
    Route::get('list','ArticleController@list')->name('list');
});





