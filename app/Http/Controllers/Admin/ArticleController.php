<?php


namespace App\Http\Controllers\Admin;


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
            'cover'         => 'required',
//            'label_id'      => 'required',
//            'cate_id'       => 'required',
        ],[
            'title.required'         => '文章标题必填',
            'desc.required'          => '文章描述必填',
            'markdown_code.required' => '文章内容必填',
            'cover.required'         => '封面图片必传',
//            'label_id.required'      => '标签必选',
//            'cate_id.required'       => '菜单分类必选',
        ]);
        if ($validator->fails()) {
            return $this->errorMessage($validator->errors()->first());
        }
        $saveArr = [
            'title'    => $request->input('title'),
            'status'   => $request->input('status', 0), #默认草稿状态
            'is_top'   => $request->input('is_top', 0),
//            'label_id' => $request->input('label_id', '') ?? '',
//            'cate_id'  => $request->input('cate_id', 0) ?? 0,
            'cover'    => $request->input('cover'),
            'desc'     => $request->input('desc'),
            'content'  => $request->input('markdown_code')
        ];
        $res = ArticleService::saveOrUpdate($saveArr);
        return $this->successResponse($res);
    }
}
