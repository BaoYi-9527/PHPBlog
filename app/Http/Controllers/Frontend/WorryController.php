<?php


namespace App\Http\Controllers\Frontend;


use App\Exports\PromotionsExport;
use App\Http\Controllers\BaseController;
use App\Imports\PromotionsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class WorryController extends BaseController
{
    private $fileData = [];

    /**
     * Notes:worry tools collection index
     * User: weicheng
     * DateTime: 2021/8/5 16:33
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function index(Request $request)
    {
        $type    = $request->input('type', 1);
        $pathArr = [
            1 => 'worry/config',
            2 => 'worry/excel',
            3 => 'worry/export'
        ];
        $files   = Storage::files($pathArr[(int)$type]);
        return view('frontend.worry.excel')
            ->with('files', $files);
    }

    /**
     * Notes:Excel处理
     * User: weicheng
     * DateTime: 2021/8/5 20:43
     * @param Request $request
     * @return array
     */
    public function handleExcel(Request $request)
    {
        $dirPath = 'worry/excel';
        $files = Storage::allFiles($dirPath);
        $promotions = [];
        foreach ($files as $file) {
            $array = Excel::toArray(new PromotionsImport(), $file)[0];
            unset($array[0]);
            $batchID = explode('_',ltrim($file, $dirPath))[0];

            if (empty($array)) {
                $promotions[$batchID] = [
                    'discount_type' => '',
                    'batch_id'      => $batchID,
                    'batch_count'   => 0,
                    'discount_sum'  => 0,
                    'amount_sum'    => 0
                ];
            } else {
                $promotions[$batchID] = [
                    'discount_type' => $array[1][2],
                    'batch_id'      => $batchID,
                    'batch_count'   => count($array),
                    'discount_sum'  => array_sum(array_column($array,3)),
                    'amount_sum'    => array_sum(array_column($array,4))
                ];
            }
        }
        $headers = ['优惠方式', '批次号', '领取数量', '优惠金额', '结算金额'];
        array_unshift($promotions, $headers);
        $export         = new PromotionsExport($promotions);
        $exportFilePath = 'worry/export/promotions_' . time() . '.xlsx';
        Excel::store($export, $exportFilePath);
        return $this->successResponse(['path' => asset($exportFilePath)]);
    }


}
