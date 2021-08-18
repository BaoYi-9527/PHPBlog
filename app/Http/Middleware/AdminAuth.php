<?php

namespace App\Http\Middleware;

use App\Constant\CacheKey;
use App\Services\UserService;
use Closure;
use Illuminate\Support\Facades\Cache;

/**
 * 后台鉴权中间件
 * Class AdminAuth
 * @package App\Http\Middleware
 */
class AdminAuth
{
    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        # 简单鉴权 登录验证后续添加
        # 获取客户的IP
        $clientIp = $request->getClientIp();
        $authKey  = CacheKey::ADMIN_AUTH_TEMP_KEY . $clientIp;
        # key不存在则鉴权
        if (!Cache::has($authKey)) {
            $user     = $request->input('user');
            $token    = $request->input('token');
            $userInfo = UserService::getUserByUsername($user);
            if (empty($userInfo)) abort(403);
            if ($token != $userInfo['token']) abort(403);
            Cache::put($authKey, 1, 3600 * 12);
        }

        return $next($request);
    }
}
