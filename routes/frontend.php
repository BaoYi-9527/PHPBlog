<?php

use Illuminate\Support\Facades\Route;

# 首页
Route::get('/','HomeController@index')->name('home');
