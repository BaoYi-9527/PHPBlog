<?php


namespace App\Http\Controllers\Admin;


use App\Constant\Article;
use App\Http\Controllers\BaseController;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends BaseController
{
    /**
     * Notes:文章编辑器
     * User: weicheng
     * DateTime: 2021/8/16 20:45
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editor(Request $request)
    {
        return view('admin.article_editor');
    }

    /**
     * Notes:文章发布
     * User: weicheng
     * DateTime: 2021/8/16 20:45
     * @param Request $request
     * @return array
     */
    public function publish(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'desc'          => 'required',
            'markdown_code' => 'required',
//            'cover'         => 'required',
//            'label_id'      => 'required',
//            'cate_id'       => 'required',
        ],[
            'title.required'         => '文章标题必填',
            'desc.required'          => '文章描述必填',
            'markdown_code.required' => '文章内容必填',
//            'cover.required'         => '封面图片必传',
//            'label_id.required'      => '标签必选',
//            'cate_id.required'       => '菜单分类必选',
        ]);
        if ($validator->fails()) {
            return $this->errorMessage($validator->errors()->first());
        }
        $cover = $request->input('cover','');
        $saveArr = [
            'title'    => $request->input('title'),
            'status'   => $request->input('status', 0), #默认草稿状态
            'is_top'   => $request->input('is_top', 0),
//            'label_id' => $request->input('label_id', '') ?? '',
//            'cate_id'  => $request->input('cate_id', 0) ?? 0,
            'cover'    => empty($cover) ? Article::DEFAULT_COVER_PATH : $cover,
            'desc'     => $request->input('desc'),
            'content'  => $request->input('markdown_code')
        ];
        $articleId = $request->input('id','');
        $res = ArticleService::saveOrUpdate($saveArr,$articleId);
        return $this->successResponse($res);
    }

    /**
     * Notes:文章列表
     * User: weicheng
     * DateTime: 2021/8/17 23:45
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        $pageSize = $request->input('page_size',10);

        $res = (new ArticleService())->articleQuery([
            'id','title','status','is_top','label_id','cate_id','views',
            'comments_count','created_at','updated_at','deleted_at'
        ])->paginate($pageSize);

        return view('admin.article_list')
            ->with('articles',$res);
    }

    /**
     * Notes:编辑文章
     * User: weicheng
     * DateTime: 2021/8/18 0:57
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request)
    {
        $id = $request->input('id','');
        $article = ArticleService::getArticleByID($id);

        return view('admin.article_update')
            ->with('article',$article);
    }
}
