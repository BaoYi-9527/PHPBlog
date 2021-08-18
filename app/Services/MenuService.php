<?php


namespace App\Services;


use App\Constant\Menu;
use App\Models\MenuCategory;

class MenuService
{
    # ------------------------------- public function ------------------------------- #

    /**
     * Notes:菜单初始化
     * User: weicheng
     * DateTime: 2021/8/18 11:53
     * @return array
     */
    public function menuInit()
    {
        $fields   = ['id', 'name', 'status', 'level', 'sort', 'pid', 'icon_class', 'route', 'url'];
        $menus    = MenuCategory::select($fields)->where('status', Menu::STATUS_NORMAL)->get();
        $topMenus = $menus->where('level', 1)->sortBy('sort')->toArray();
        $subMenus = $menus->where('level', 2)->groupBy('pid')->toArray();
        $menuArr  = [];
        foreach ($topMenus as $topMenu) {
            $topMenu['children'] = [];
            if (isset($subMenus[$topMenu['id']])) {
                $topMenu['children'] = collect($subMenus[$topMenu['id']])->sortBy('sort')->toArray();
            }
            $menuArr[] = $topMenu;
        }
        return $menuArr;
    }

    /**
     * Notes:获取可供文章选择的菜单分类（有路由的分类）
     * User: weicheng
     * DateTime: 2021/8/18 12:30
     * @return mixed
     */
    public function menuCategories()
    {
        $fields   = ['id', 'name', 'status','route'];
        return MenuCategory::select($fields)
            ->where('status',Menu::STATUS_NORMAL)
            ->where('route','!=','')->get();
    }

    # ------------------------------- static function ------------------------------- #

    /**
     * Notes:保存或更新
     * User: weicheng
     * DateTime: 2021/8/18 10:44
     * @param $params
     * @param $id
     * @return bool
     */
    public static function saveOrUpdate($params, $id = '')
    {
        if ($id) {
            $res = MenuCategory::where('id', $id)->update($params);
        } else {
            $menu = new MenuCategory();
            foreach ($params as $key => $value) {
                if (!in_array($key,$menu->fillable)) continue;
                $menu->{$key} = $value;
            }
            $res = $menu->save();
        }
        return $res;
    }

    # ------------------------------- private function ------------------------------- #
}
