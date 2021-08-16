<?php
namespace App\Constant;

interface CacheKey {
    # ---------------------- frontend-key ---------------------- #
    # worry
    const WORRY_CONFIGS = 'worry_configs_cache_key';


    # ---------------------- admin-key ---------------------- #
    # 临时admin鉴权key
    const ADMIN_AUTH_TEMP_KEY = 'admin_auth_temp_key_';
}
