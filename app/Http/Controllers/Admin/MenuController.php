<?php


namespace App\Http\Controllers\Admin;


use App\Constant\Menu;
use App\Http\Controllers\BaseController;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MenuController extends BaseController
{
    /**
     * Notes:菜单列表
     * User: weicheng
     * DateTime: 2021/8/24 16:30
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        $menus = (new MenuService())->queryBuilder()->get();
        $topMenus = $menus->where('level',Menu::LEVEL_1)->sortBy('sort')->toArray();
        $menusByPid = $menus->groupBy('pid');

        $menuArr = [];
        foreach ($topMenus as $topMenu) {
            $menuArr[] = $topMenu;
            if (isset($menusByPid[$topMenu['id']])) {
                $subMenus = $menusByPid[$topMenu['id']]->sortBy('sort')->toArray();
                $count = count($subMenus);
                foreach ($subMenus as $key => $subMenu) {
                    if ($key == ($count - 1)) {
                        $subMenu['name'] = '└ '.$subMenu['name'];
                    } else {
                        $subMenu['name'] = '├ '.$subMenu['name'];
                    }
                    $menuArr[] = $subMenu;
                }
            }
        }
        return view('admin.menu_list')
            ->with('menus',$menuArr);
    }

    /**
     * Notes:创建菜单
     * User: weicheng
     * DateTime: 2021/8/24 16:55
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        $level  = $request->input('level', 1);
        $params = $request->all();
        $requiredParams = Menu::MENU_REQUIRED_PARAMS[$level];

        # 校验参数
        foreach ($requiredParams as $field => $name) {
            if (!isset($params[$field]) or (empty($params[$field]) and $params['field'] != 0)) {
                return $this->errorMessage($name.'必填');
            }
            # 判断路由是否存在 仅在传入 route 时进行判断
            if ($field == 'route' and !empty($params[$field]) and !Route::has($params[$field])) {
                return $this->errorMessage('路由不存在');
            }
        }
        $res = MenuService::saveOrUpdate($params);
        return $this->successResponse($res);
    }

    /**
     * Notes:删除菜单标签
     * User: weicheng
     * DateTime: 2021/8/24 16:49
     * @param Request $request
     * @return array
     */
    public function delete(Request $request)
    {
        $menuID = $request->input('id');
        $res = MenuService::delete($menuID);
        return $this->successResponse($res);
    }

    public function update()
    {

    }
}
