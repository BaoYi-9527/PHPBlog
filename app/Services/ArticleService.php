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
        return Article::where('status',ArticleConstant::STATUS_PUBLISHED)
            ->when($fields, function ($query) use ($fields) {
            return $query->select($fields);
        });
    }

    # ------------------------------- static function ------------------------------- #



    # ------------------------------- private function ------------------------------- #


}
