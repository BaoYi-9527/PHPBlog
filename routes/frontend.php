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


# worry's excel table
Route::get('worry/excel','WorryController@index')->name('worry.excel');
Route::post('worry/handleExcel','WorryController@handleExcel')->name('worry.handleExcel');





