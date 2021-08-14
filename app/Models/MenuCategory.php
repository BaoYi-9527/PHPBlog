<?php


namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 菜单分类表模型
 * Class MenuCategory
 * @package App\Models
 */
class MenuCategory extends BaseModel
{
    # 软删除
    use SoftDeletes;
    # 批量赋值
    protected $fillable = [
        "name",
        "status",
        "level",
        "sort",
        "pid",
        "icon_class",
        "route",
        "url",
        "ext",
    ];
}
