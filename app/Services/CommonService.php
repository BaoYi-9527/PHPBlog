<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class CommonService
{
    # ------------------------------- public function ------------------------------- #

    # ------------------------------- static function ------------------------------- #

    /**
     * Notes:阿里云OSS上传并返回地址
     * User: weicheng
     * DateTime: 2021/8/18 15:45
     * @param $dirPath
     * @param $localPath
     * @param $fileName
     * @return string
     */
    public static function aliOssStorage($dirPath,$localPath,$fileName = '')
    {
        # 指定文件名
        if (!empty($fileName)) {
            $res = Storage::disk('aliyun')->putFileAs($dirPath, $localPath, $fileName);
        } else {
            $res = Storage::disk('aliyun')->putFile($dirPath, $localPath);
        }
        $domain = 'http://lifewonder.oss-cn-shenzhen.aliyuncs.com/';
        return $domain.$res;
    }

    # ------------------------------- private function ------------------------------- #
}
