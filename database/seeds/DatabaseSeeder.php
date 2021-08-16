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
        # 填充初始化后台用户
        $this->adminUserInit();
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
    }
}
