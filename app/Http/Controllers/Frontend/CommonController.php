<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommonController extends BaseController
{
    /**
     * Notes:上传文件
     * User: weicheng
     * DateTime: 2021/8/5 15:04
     * @param Request $request
     * @return array
     */
    public function uploadFile(Request $request)
    {
        $dirPath  = $request->input('path');
        $suffix   = $request->input('suffix','');
        if ($suffix) {
            $fileName = rtrim($request->file('file')->getClientOriginalName(), $suffix) . '_' . time() . '_' . rand(1000, 9999).'.xlsx';
        } else {
            $fileName = $request->file('file')->getClientOriginalName();
        }
        $path     = $request->file('file')->storeAs($dirPath, $fileName);
        return $this->successResponse(['path' => $path, 'file_name' => $fileName]);
    }

    /**
     * Notes:清空目录下文件
     * User: weicheng
     * DateTime: 2021/8/5 15:14
     * @param Request $request
     * @return array
     */
    public function clearFiles(Request $request)
    {
        $path = $request->input('path');
        Storage::deleteDirectory($path);
        return $this->successResponse();
    }

    /**
     * Notes:目录下所有文件信息
     * User: weicheng
     * DateTime: 2021/8/5 16:20
     * @param Request $request
     * @return array
     */
    public function getFiles(Request $request)
    {
        $path = $request->input('path');
        $files = Storage::files($path);
        return $this->successResponse($files);
    }
}
