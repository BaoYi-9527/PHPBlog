<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\BaseController;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    /**
     * Notes:文章详情页
     * User: weicheng
     * DateTime: 2021/8/18 17:57
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Notes:api 获取文章列表
     * User: weicheng
     * DateTime: 2021/8/18 18:10
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        $pageSize = $request->input('page_size', 5);
        $cateId   = $request->input('id', '');

        $conditions = [];
        if (!empty($cateId) && $cateId != 1) $conditions['cate_id'] = $cateId;   # 菜单分类 1为首页 首页不限分类

        $res = (new ArticleService())->articleQuery([
            'id','title','views','cover','desc','comments_count','created_at'
        ],$conditions)->orderBy('is_top','desc')->latest()->paginate($pageSize);

        return view('frontend.home.partials.flow')
            ->with('articles',$res);
    }
}
