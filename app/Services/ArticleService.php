<?php

namespace App\Services;

use App\Models\Article;
use App\Constant\Article as ArticleConstant;

class ArticleService
{
    # ------------------------------- public function ------------------------------- #

    /**
     * Notes:构建文章查询 query (已发布)
     * User: weicheng
     * DateTime: 2021/8/14 23:51
     * @param array $fields     // 所需字段
     * @param array $conditions // 可选条件
     * @return mixed
     */
    public function articleQuery($fields = [], $conditions = [])
    {
        $cateId = $conditions['cate_id'] ?? '';
        return Article::where('status',ArticleConstant::STATUS_PUBLISHED)
            ->when($cateId, function ($query) use ($cateId) {
                return $query->where('cate_id',$cateId);
            })->when($fields, function ($query) use ($fields) {
                return $query->select($fields);
            });
    }

    # ------------------------------- static function ------------------------------- #

    /**
     * Notes:获取文章
     * User: weicheng
     * DateTime: 2021/8/16 12:18
     * @param $id
     * @return mixed
     */
    public static function getArticleByID($id)
    {
        return Article::find($id);
    }

    /**
     * Notes:保存或更新
     * User: weicheng
     * DateTime: 2021/8/16 17:55
     * @param $params
     * @param string $id
     * @return bool
     */
    public static function saveOrUpdate($params, $id = '')
    {
        if ($id) {
            $res = Article::where('id', $id)->update($params);
        } else {
            $article = new Article();
            foreach ($params as $key => $value) {
                $article->{$key} = $value;
            }
            $res = $article->save();
        }
        return $res;
    }

    # ------------------------------- private function ------------------------------- #


}
