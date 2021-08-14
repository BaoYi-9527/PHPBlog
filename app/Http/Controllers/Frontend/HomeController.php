<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    /**
     * Notes:首页
     * User: weicheng
     * DateTime: 2021/7/23 16:46
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.home.index');
    }
}
