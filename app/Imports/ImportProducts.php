<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\TemporaryProductImportData;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportProducts implements ToModel,WithStartRow, WithHeadingRow
{

    public function model(array $row)
    {
        return new TemporaryProductImportData([
            'added_by' => auth()->user()->user_type,
            'name' => @$row['name'],
            'slug' => $row['slug'],
            'price' => $row['price'],
            'min_price' => $row['price'],
            'max_price' => $row['price'],
            'discount_value' => $row['discount_value'],
            'discount_type' => $row['discount_type'],
            'stock_qty' => $row['stock_qty'],
            'sku'=>$row['sku'],
            'code'=>$row['code'],
            'has_variation' => 0,
            'created_by' => auth()->user()->id,
            'shop_id' => getMyShopId(),            
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }

    public function headingRow(): int
    {
        return 1;
    }
}
