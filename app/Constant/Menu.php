<?php

namespace App\Constant;

interface Menu
{

    # 菜单状态
    const STATUS_NORMAL  = 1;   # 正常
    const STATUS_DISABLE = 2;   # 禁用
    const STATUS_LIST    = [
        self::STATUS_NORMAL  => '正常',
        self::STATUS_DISABLE => '禁用'
    ];

    # 菜单级别
    const LEVEL_1    = 1;
    const LEVEL_2    = 2;
    const LEVEL_LIST = [
        self::LEVEL_1 => '顶级菜单',
        self::LEVEL_2 => '次级菜单'
    ];

    # 菜单必要参数
    const MENU_REQUIRED_PARAMS = [
        self::LEVEL_1 => [
            'name'       => '菜单名称',
            'status'     => '菜单状态',
            'level'      => '菜单级别',
            'sort'       => '菜单排序',
            'icon_class' => '菜单图标',
            'route'      => '菜单路由',
        ],
        self::LEVEL_2 => [
            'name'       => '菜单名称',
            'status'     => '菜单状态',
            'level'      => '菜单级别',
            'pid'        => '菜单父级',
            'sort'       => '菜单排序',
            'route'      => '菜单路由',
        ],
    ];

}
