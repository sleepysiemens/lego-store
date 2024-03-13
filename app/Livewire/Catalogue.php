<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Catalogue extends Component
{
    use WithPagination;
    public function render()
    {
        $products=Product::query()->where('is_available','=',true)
            ->join('categories','categories.id','=','products.category_id')
            ->join('colors','colors.id','=','products.color_id')
            ->select('products.*','categories.title_ru as category_title_ru','categories.title_en as category_title_en', 'colors.title as color', 'colors.bl_num as bl_color')
            ->paginate(9);
        $categories=Category::all();
        $colors=[];
        foreach (Product::all() as $product)
        {
            $colors[]=Color::query()->where('bl_num', '=',$product->color_id)->first();
        }

        $colors=array_unique($colors);

        $amount[1]=Product::query()->where('category_id','=',1)->count();
        $amount[2]=Product::query()->where('category_id','=',2)->count();
        $amount[3]=Product::query()->where('category_id','=',3)->count();
        //dd(($colors));
        return view('livewire.catalogue', compact(['products', 'categories', 'colors', 'amount']));
    }
}
