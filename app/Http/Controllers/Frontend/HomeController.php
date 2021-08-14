<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Notes:首页
     * User: weicheng
     * DateTime: 2021/7/23 16:46
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('page_size',10);

        $res = (new ArticleService())->articleQuery([
            'id','title','views','cover','desc','comments_count','created_at'
        ])->paginate($pageSize);

        return view('frontend.home.index')
            ->with('articles',$res);
    }
}
