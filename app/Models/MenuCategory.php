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
    public $fillable = [
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
    # 类型转换
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];
}
