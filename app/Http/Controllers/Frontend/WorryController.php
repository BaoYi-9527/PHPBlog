<?php


namespace App\Http\Controllers\Frontend;


use App\Constant\CacheKey;
use App\Exports\PromotionsExport;
use App\Http\Controllers\BaseController;
use App\Imports\ConfigImport;
use App\Imports\PromotionsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        $dirPath    = 'worry/excel';
        $files      = Storage::allFiles($dirPath);
        $promotions = [];
        foreach ($files as $file) {
            $array = Excel::toArray(new PromotionsImport(), $file)[0];
            unset($array[0]);
            $batchID = explode('_', ltrim($file, $dirPath))[0];

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
                    'discount_sum'  => array_sum(array_column($array, 3)),
                    'amount_sum'    => array_sum(array_column($array, 4))
                ];
            }
        }
//        Cache::put('excel_data', $promotions, 60 * 12);
        $cacheKey = CacheKey::WORRY_CONFIGS;
        if (Cache::has($cacheKey)) {
            $cacheData       = Cache::get($cacheKey);
            $citiesExcelData = [];
            foreach ($cacheData as $city => $batchArr) {
                foreach ($batchArr as $batchID => $batchName) {
                    if (!isset($promotions[$batchID])) continue;
                    $promotions[$batchID]['discount_type'] = $batchName;
                    $citiesExcelData[$city][$batchID]      = $promotions[$batchID];
                }
                if (isset($citiesExcelData[$city])) {
                    $footerRow              = [
                        '总计',
                        '',
                        array_sum(array_column($citiesExcelData[$city], 'batch_count')),
                        array_sum(array_column($citiesExcelData[$city], 'discount_sum')),
                        array_sum(array_column($citiesExcelData[$city], 'amount_sum')),
                    ];
                    $citiesExcelData[$city] = array_merge($citiesExcelData[$city], [$footerRow]);
                }
            }
            $headers = ['优惠方式', '批次号', '领取数量', '优惠金额', '结算金额'];
            foreach ($citiesExcelData as $city => $data) {
                array_unshift($data, $headers);
                $export         = new PromotionsExport($data);
                $exportFilePath = 'worry/export/' . $city . '_promotions_' . time() . '.xlsx';
                Excel::store($export, $exportFilePath);
            }
            return $this->successResponse();
        } else {
            $headers = ['优惠方式', '批次号', '领取数量', '优惠金额', '结算金额'];
            array_unshift($promotions, $headers);
            $export         = new PromotionsExport($promotions);
            $exportFilePath = 'worry/export/promotions_' . time() . '.xlsx';
            Excel::store($export, $exportFilePath);
            return $this->successResponse(['path' => asset($exportFilePath)]);
        }
    }

    /**
     * Notes: 加载配置 Excel
     * User: weicheng
     * DateTime: 2021/8/6 13:23
     * @param Request $request
     * @return array
     */
    public function loadConfig(Request $request)
    {
        $sheetCount      = $request->input('sheetCount',12) - 1;
        $cityCol         = $request->input('cityColumn',2) - 1;
        $activityNameCol = $request->input('activityColumn',6) - 1;
        $batchIdCol      = $request->input('batchIdColumn',30) -1;

        $dirPath = 'worry/config';
        $files   = Storage::allFiles($dirPath);
        $configs = [];
        foreach ($files as $file) {
            $array = Excel::toArray(new ConfigImport(), $file);
            foreach ($array as $sheet => $item) {
                if ($sheet > $sheetCount) break;
                unset($item[0]);    # 去除第一行
                unset($item[1]);    # 去除表头
                foreach ($item as $row) {
                    $city = empty($row[$cityCol]) ? ($city ?? '') : $row[$cityCol];
                    if (!empty($row[$activityNameCol])) $activityName = $row[$activityNameCol];
                    if (empty($row[$batchIdCol]) or ($row[$batchIdCol] == '/')) continue; # 若批次码为空 则跳过
                    $configs[$city][$row[$batchIdCol]] = empty($row[$activityNameCol]) ? ($activityName ?? '') : $row[$activityNameCol];
                }
            }
        }
        $cacheKey = CacheKey::WORRY_CONFIGS;
        Cache::put($cacheKey, $configs, 3600 * 12);
        return $this->successResponse();
    }

}
