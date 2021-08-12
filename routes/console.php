<?php

use App\Constant\CacheKey;
use App\Exports\PromotionsExport;
use App\Imports\ConfigImport;
use App\Imports\PromotionsImport;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('test:test', function () {

    dd(\Illuminate\Support\Facades\Cache::get('worry_configs_cache_key'));

//    $dirPath    = 'worry/excel';
//    $files      = Storage::allFiles($dirPath);
//    $promotions = [];
//    foreach ($files as $file) {
//        $array = Excel::toArray(new PromotionsImport(), $file)[0];
//        unset($array[0]);
//        $batchID = explode('_', ltrim($file, $dirPath))[0];
//
//        if (empty($array)) {
//            $promotions[$batchID] = [
//                'discount_type' => '',
//                'batch_id'      => $batchID,
//                'batch_count'   => 0,
//                'discount_sum'  => 0,
//                'amount_sum'    => 0
//            ];
//        } else {
//            $promotions[$batchID] = [
//                'discount_type' => $array[1][2],
//                'batch_id'      => $batchID,
//                'batch_count'   => count($array),
//                'discount_sum'  => array_sum(array_column($array, 3)),
//                'amount_sum'    => array_sum(array_column($array, 4))
//            ];
//        }
//    }
//    $promotions = \Illuminate\Support\Facades\Cache::get('excel_data');
//    $cacheKey = CacheKey::WORRY_CONFIGS;
//    if (\Illuminate\Support\Facades\Cache::has($cacheKey)) {
//        $cacheData = \Illuminate\Support\Facades\Cache::get($cacheKey);
//        $citiesExcelData = [];
//        foreach ($cacheData as $city => $batchArr) {
//            foreach ($batchArr as $batchID => $batchName) {
//                if (!isset($promotions[$batchID])) continue;
//                $promotions[$batchID]['discount_type'] = $batchName;
//                $citiesExcelData[$city][$batchID] = $promotions[$batchID];
//            }
//            if (isset($citiesExcelData[$city])) {
//                $footerRow = [
//                    '总计',
//                    '',
//                    array_sum(array_column($citiesExcelData[$city],'batch_count')),
//                    array_sum(array_column($citiesExcelData[$city],'discount_sum')),
//                    array_sum(array_column($citiesExcelData[$city],'amount_sum')),
//                ];
//                $citiesExcelData[$city] = array_merge($citiesExcelData[$city],[$footerRow]);
//            }
//        }
//
//        $headers = ['优惠方式', '批次号', '领取数量', '优惠金额', '结算金额'];
//        foreach ($citiesExcelData as $city => $data) {
//            array_unshift($data, $headers);
//            $export         = new PromotionsExport($data);
//            $exportFilePath = 'worry/export/'.$city.'_promotions_' . time() . '.xlsx';
//            Excel::store($export, $exportFilePath);
//        }
//    }
//    dd(111);
//    dd($promotions);

    $sheetCount      = 11;
    $cityCol         = 1;
    $activityNameCol = 5;
    $batchIdCol      = 29;

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
                $configs[$city][$row[$batchIdCol]] = empty($row[$activityNameCol]) ? $activityName : $row[$activityNameCol];
            }
        }
    }
    dd($configs);
    $cacheKey = 'worry_configs_cache_key';
    \Illuminate\Support\Facades\Cache::put($cacheKey, $configs, 60 * 12);




//    $files = \Illuminate\Support\Facades\Storage::files('worry/excel');
    $files = \Illuminate\Support\Facades\Storage::allFiles('worry/excel');
    dd($files);
});
