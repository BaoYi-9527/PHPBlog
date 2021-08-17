<?php
namespace App\Constant;

interface Article {
    # 文章状态
    const STATUS_DRAFT     = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_HIDDEN    = 2;
    const STATUS_LIST      = [
        self::STATUS_DRAFT     => '草稿',
        self::STATUS_PUBLISHED => '公开',
        self::STATUS_HIDDEN    => '私密',
    ];
    # 默认封面地址
    const DEFAULT_COVER_PATH = '/resources/imgs/covers/animal_party_yellow_dog.png';
}
