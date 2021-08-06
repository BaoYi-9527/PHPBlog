<?php

namespace App\Imports;

use App\Models\Config;
use Maatwebsite\Excel\Concerns\ToModel;

class ConfigImport implements ToModel
{
    /**
     * Notes:
     * @param array $row
     * @return Config|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|null
     */
    public function model(array $row)
    {
        return new Config([

        ]);
    }
}
