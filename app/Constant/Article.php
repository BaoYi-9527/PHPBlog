<?php
namespace App\Constant;

interface Article {
    # 文章状态
    const STATUS_DRAFT     = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_HIDDEN    = 2;
    const STATUS_LIST      = [
        self::STATUS_DRAFT     => '草稿',
        self::STATUS_PUBLISHED => '已发布',
        self::STATUS_HIDDEN    => '隐藏',
    ];
}
