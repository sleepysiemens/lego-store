<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class RenderCatalogue
{
    public function get_products($sort, $sort_method, $filter)
    {
        if(isset($filter['search']))
        {
            $products=Product::query()->where('is_available','=',true)->where('search_line','like','%'.$filter['search'].'%')
                ->join('categories','categories.id','=','products.category_id')
                ->join('colors','colors.bl_num','=','products.color_id')
                ->select('products.*','categories.title_ru as category_title_ru','categories.title_en as category_title_en', 'colors.title as color', 'colors.bl_num as bl_color')
                #->orderBy($sort, $sort_method)
            ;
        }
        else
        {
            $products=Product::query()->where('is_available','=',true)
                ->join('categories','categories.id','=','products.category_id')
                ->join('colors','colors.bl_num','=','products.color_id')
                ->select('products.*','categories.title_ru as category_title_ru','categories.title_en as category_title_en', 'colors.title as color', 'colors.bl_num as bl_color')
            ;
        }


        #CATEGORY
        if(isset($filter['category']))
        {
            $categories=Category::query()->select('id')->get();
            foreach ($categories as $category)
            {
                if(!collect($filter['category'])->has($category->id))
                    $products=$products->where('category_id','!=',$category->id);
            }
        }

        #COLOR
        if(isset($filter['color']))
        {
            $colors=Color::query()->select('bl_num')->get();
            foreach ($colors as $color)
            {
                if(!collect($filter['color'])->has($color->bl_num))
                    $products=$products->where('color_id','!=',$color->bl_num);
            }
        }

            $products=$products->orderBy($sort, $sort_method);

        return $products;
    }

    public function sort_products($products, $sort, $sort_method)
    {
        $result=$products->orderBy($sort, $sort_method);

        return($result);
    }

    public function get_colors()
    {
        $colors=[];
        foreach (Product::all() as $product)
        {
            $colors[]=Color::query()->where('bl_num', '=',$product->color_id)->first();
        }

        $colors=array_unique($colors);

        return $colors;
    }

    public function get_amount()
    {
        $amount[1]=Product::query()->where('category_id','=',1)->where('is_available','=',true)->count();
        $amount[2]=Product::query()->where('category_id','=',2)->where('is_available','=',true)->count();
        $amount[3]=Product::query()->where('category_id','=',3)->where('is_available','=',true)->count();

        return $amount;
    }

}
