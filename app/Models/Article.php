<?php


namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 文章表模型
 * Class Article
 * @package App\Models
 */
class Article extends BaseModel
{
    #软删除
    use SoftDeletes;
    # 批量赋值
    protected $fillable = [
        "title",
        "status",
        "is_top",
        "label_id",
        "cate_id",
        "views",
        "cover",
        "desc",
        "content",
        "comments_count",
        "ext",
    ];
}
