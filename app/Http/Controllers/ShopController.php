<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $filter=[];
        if(isset($_GET['category']))
        {
            $filter['category']=$_GET['category'];
        }
        if(isset($_GET['color']))
        {
            $filter['color']=$_GET['color'];
        }

        return view('pages.shop.index', compact(['filter']));
    }

    public function show($product)
    {
        $product=Product::query()->where('number','=',$product)
            ->join('categories','categories.id','=','products.category_id')
            ->join('colors','colors.bl_num','=','products.color_id')
            ->select('products.*','categories.title_ru as category_title_ru','categories.title_en as category_title_en', 'colors.title as color', 'colors.bl_num as bl_color')
            ->first();

        $related_products=Product::query()
            ->join('categories','categories.id','=','products.category_id')
            ->join('colors','colors.id','=','products.color_id')
            ->select('products.*','categories.title_ru as category_title_ru','categories.title_en as category_title_en', 'colors.title as color', 'colors.bl_num as bl_color')
            ->limit(8)->get();
        return view('pages.product.index', compact(['product', 'related_products']));
    }
}
