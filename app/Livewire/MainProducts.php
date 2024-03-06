<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class MainProducts extends Component
{
    public function render()
    {
        $categories=Category::all();
        $products=Product::query()
            ->join('categories','categories.id','=','products.category_id')
            ->join('colors','colors.bl_num','=','products.color_id')
            ->select('products.*','categories.title_ru as category_title_ru','categories.title_en as category_title_en', 'colors.title as color', 'colors.bl_num as bl_color')
            ->limit(8)->get();

        return view('livewire.main-products',compact(['categories', 'products']));
    }
}
