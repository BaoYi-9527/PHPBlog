<?php

namespace App\Imports;

use App\Models\Promotions;
use Maatwebsite\Excel\Concerns\ToModel;

class PromotionsImport implements ToModel
{

    public function model(array $row)
    {
        return new Promotions([
              'batch_id'        => $row[0], # 批次ID
              'discount_id'     => $row[1], # 优惠ID
              'discount_type'   => $row[2], # 优惠类型
              'discount_amount' => $row[3], # 优惠金额
              'order_amount'    => $row[4], # 订单总额
              'trade_type'      => $row[5]  # 交易类型
          ]);
    }
}
