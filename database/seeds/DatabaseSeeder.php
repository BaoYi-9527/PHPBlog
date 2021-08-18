<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # 初始化菜单
        $this->menuInit();
        # 填充初始化后台用户
//        $this->adminUserInit();
    }

    private function menuInit()
    {
        $initMenus = [
            [
                'name'       => '首页',
                'level'      => 1,
                'sort'       => 1,
                'icon_class' => 'fa fa-flag',
                'route'      => 'frontend.home',
                'url'        => route('frontend.home'),
                'children'   => []
            ],
            [
                'name'       => '大前端',
                'level'      => 1,
                'sort'       => 2,
                'icon_class' => 'fa fa-cube',
                'route'      => '',
                'url'        => '',
                'children'   => []
            ],
            [
                'name'       => '编程语言',
                'level'      => 1,
                'sort'       => 3,
                'icon_class' => 'fa fa-code',
                'route'      => '',
                'url'        => '',
                'children'   => [
                    [
                        'name' => 'PHP',
                        'level' => 2,
                        'sort'  => 1,
                        'pid'   => 6,
                        'route' => 'frontend.home',
                        'url'   => route('frontend.home',['cate_id' => 1])
                    ],
                    [
                        'name' => 'Golang',
                        'level' => 2,
                        'sort'  => 2,
                        'pid'   => 6,
                        'route' => 'frontend.home',
                        'url'   => route('frontend.home',['cate_id' => 2])
                    ],
                    [
                        'name' => 'Python',
                        'level' => 2,
                        'sort'  => 3,
                        'pid'   => 6,
                        'route' => 'frontend.home',
                        'url'   => route('frontend.home',['cate_id' => 3])
                    ],
                ]
            ],
            [
                'name'       => '数据库技术',
                'level'      => 1,
                'sort'       => 4,
                'icon_class' => 'fa fa-database',
                'route'      => '',
                'url'        => '',
                'children'   => [
                    [
                        'name' => 'MySQL',
                        'level' => 2,
                        'sort'  => 1,
                        'pid'   => 10,
                        'route' => 'frontend.home',
                        'url'   => route('frontend.home',['cate_id' => 4])
                    ],
                    [
                        'name' => 'Redis',
                        'level' => 2,
                        'sort'  => 2,
                        'pid'   => 10,
                        'route' => 'frontend.home',
                        'url'   => route('frontend.home',['cate_id' => 5])
                    ],
                    [
                        'name' => 'ElasticSearch',
                        'level' => 2,
                        'sort'  => 3,
                        'pid'   => 10,
                        'route' => 'frontend.home',
                        'url'   => route('frontend.home',['cate_id' => 6])
                    ],
                ]
            ],
            [
                'name'       => '计算机基础',
                'level'      => 1,
                'sort'       => 5,
                'icon_class' => 'fa fa-tasks',
                'route'      => '',
                'url'        => '',
                'children'   => [
                    [
                        'name' => '网络协议',
                        'level' => 2,
                        'sort'  => 1,
                        'pid'   => 13,
                        'route' => 'frontend.home',
                        'url'   => route('frontend.home',['cate_id' => 6])
                    ],
                    [
                        'name' => '操作系统',
                        'level' => 2,
                        'sort'  => 2,
                        'pid'   => 13,
                        'route' => 'frontend.home',
                        'url'   => route('frontend.home',['cate_id' => 7])
                    ]
                ]
            ],
            [
                'name'       => '闲言碎语',
                'level'      => 1,
                'sort'       => 5,
                'icon_class' => 'fa fa-coffee',
                'route'      => '',
                'url'        => '',
                'children'   => []
            ],
            [
                'name'       => '工具集',
                'level'      => 1,
                'sort'       => 7,
                'icon_class' => 'fa fa-wrench',
                'route'      => '',
                'url'        => '',
                'children'   => [
                    [
                        'name' => "Worry's Tools",
                        'level' => 2,
                        'sort'  => 1,
                        'pid'   => 16,
                        'route' => 'frontend.tools.worry.excel',
                        'url'   => route('frontend.tools.worry.excel')
                    ]
                ]
            ],
        ];

        foreach ($initMenus as $topMenu) {
            if (empty($topMenu['children'])) {
                \App\Services\MenuService::saveOrUpdate($topMenu);
            } else {
                foreach ($topMenu['children'] as $subMenu) {
                    \App\Services\MenuService::saveOrUpdate($subMenu);
                }
                unset($topMenu['children']);
                \App\Services\MenuService::saveOrUpdate($topMenu);
            }
        }
        dump('菜单初始化完毕!');
    }

    private function adminUserInit()
    {
        $originToken = randomStr(16);
        DB::table('users')->insert([
            'username' => 'admin',
            'nickname' => 'admin',
            'password' => md5($originToken),
            'role'     => 0,
            'token'    => $originToken
        ]);
        dump('后台用户初始化完毕：');
        dump('账号：admin');
        dump('密码/token(仅初始化时一致)：'.$originToken);
    }
}
