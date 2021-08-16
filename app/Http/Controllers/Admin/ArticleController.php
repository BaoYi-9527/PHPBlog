<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    # 文章编辑器
    public function editor(Request $request)
    {
        return view('admin.article_editor');
    }
}
