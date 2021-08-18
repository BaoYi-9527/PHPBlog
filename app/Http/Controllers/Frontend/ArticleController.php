<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\BaseController;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    # 文章详情页
    public function detail(Request $request)
    {
        $id = $request->input('id');
        $article = ArticleService::getArticleByID($id);

        # 更新浏览量
        $clientIp = $request->getClientIp();
        ArticleService::viewsAdd($id,$clientIp.'_'.$id);

        return view('frontend.article.detail')
            ->with('article', $article);
    }
}
