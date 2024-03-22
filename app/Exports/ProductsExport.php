<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromQuery, WithHeadings
{

    public function query()
    {
        return Product::select(
            "id",
            "shop_id",
            "added_by",
            "name",
            
            "slug",
            "brand_id",
            "unit_id",
            "thumbnail_image",
            "gallery_images",
            "product_tags",
            "short_description",
            "description",
            "min_price",
            "max_price",
            "discount_value",
            "discount_type",
            "discount_start_date",
            "discount_end_date",
            "sell_target",
            "stock_qty",
            "is_published",
            "is_featured",
            "min_purchase_qty",
            "max_purchase_qty",
            "has_variation",
            "has_warranty",
            "total_sale_count",
            "standard_delivery_hours",
            "express_delivery_hours",
            "size_guide",
            "meta_title",
            "meta_description",
            "meta_img",
            "reward_points",
            "created_at",
            "updated_at",
            "deleted_at"
        );
    }

    public function headings(): array
    {
        return [
            "id",
            "shop_id",
            "added_by",
            "name",
            "slug",
            "brand_id",
            "unit_id",
            "thumbnail_image",
            "gallery_images",
            "product_tags",
            "short_description",
            "description",
            "min_price",
            "max_price",
            "discount_value",
            "discount_type",
            "discount_start_date",
            "discount_end_date",
            "sell_target",
            "stock_qty",
            "is_published",
            "is_featured",
            "min_purchase_qty",
            "max_purchase_qty",
            "has_variation",
            "has_warranty",
            "total_sale_count",
            "standard_delivery_hours",
            "express_delivery_hours",
            "size_guide",
            "meta_title",
            "meta_description",
            "meta_img",
            "reward_points",
            "created_at",
            "updated_at",
            "deleted_at"
        ];
    }
}
