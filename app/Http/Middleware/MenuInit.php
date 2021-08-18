<?php


namespace App\Http\Middleware;

use App\Services\MenuService;
use Closure;
use Illuminate\Support\Facades\View;

/**
 * 菜单初始化
 * Class MenuInit
 * @package App\Http\Middleware
 */
class MenuInit
{
    /**
     * Notes:传递菜单参数
     * User: weicheng
     * DateTime: 2021/8/18 11:41
     * @param $request
     * @param Closure $next
     * @return Closure
     */
    public function handle($request, Closure $next)
    {
        $menus = (new MenuService())->menuInit();
        View::share('menus',$menus);

        return $next($request);
    }
}
