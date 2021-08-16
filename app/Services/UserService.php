<?php


namespace App\Services;

use App\Models\User;

class UserService
{
    # ------------------------------- public function ------------------------------- #


    # ------------------------------- static function ------------------------------- #

    /**
     * Notes:用户名获取用户
     * User: weicheng
     * DateTime: 2021/8/16 17:32
     * @param $username
     * @return mixed
     */
    public static function getUserByUsername($username)
    {
        return User::where('username', $username)->first();
    }

    # ------------------------------- private function ------------------------------- #
}
