<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class CacheService
{
    public function products_cache()
    {
        if(Cache::has('all_products'))
        {
            $all_products=Cache::get('all_products');
        }
        else
        {
            $all_products=Product::query()->where('is_available','=',true)->select('id','title', 'number', 'bricklink_number', 'amount', 'color_id', 'price', 'search_line')->get();
            Cache::put('all_products', $all_products, now()->addHours(24));
        }

        return($all_products);
    }
}
