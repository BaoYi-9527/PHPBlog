<?php


namespace App\Http\Controllers;


class BaseController extends Controller
{

    /**
     * Notes:成功响应
     * User: weicheng
     * DateTime: 2021/7/23 16:39
     * @param array $data
     * @param string $msg
     * @param int $code
     * @return array
     */
    protected function successResponse($data = [], $msg = "success", $code = 200)
    {
        return [
            'message' => $msg,
            'code'    => $code,
            'data'    => $data
        ];
    }

    /**
     * Notes:失败响应
     * User: weicheng
     * DateTime: 2021/7/23 16:39
     * @param array $data
     * @param string $msg
     * @param int $code
     * @return array
     */
    protected function errorResponse($data = [], $msg = "error", $code = 403)
    {
        return [
            'message' => $msg,
            'code'    => $code,
            'data'    => $data
        ];
    }

    /**
     * Notes:成功消息
     * User: weicheng
     * DateTime: 2021/7/23 16:39
     * @param string $msg
     * @param array $data
     * @param int $code
     * @return array
     */
    protected function successMessage($msg = '操作成功', $data = [], $code = 200)
    {
        return [
            'message' => $msg,
            'code'    => $code,
            'data'    => $data
        ];
    }

    /**
     * Notes:失败消息
     * User: weicheng
     * DateTime: 2021/7/23 16:39
     * @param string $msg
     * @param array $data
     * @param int $code
     * @return array
     */
    protected function errorMessage($msg = 'error', $data = [], $code = 403)
    {
        return [
            'message' => $msg,
            'code'    => $code,
            'data'    => $data
        ];
    }
}
