<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProducts extends Component
{
    use WithPagination;
    public $category='all';

    public function InitItems($category)
    {
        if($category!='all')
            $this->category=Category::query()->where('url','=',$category)->first();
    }

    public function render()
    {
        if($this->category->url!='all')
        {
            $products=Product::query()->where('category_id','=', $this->category->id)
                ->join('categories','categories.id','=','products.category_id')
                ->join('colors','colors.id','=','products.color_id')
                ->select('products.*','categories.title_ru as category_title_ru','categories.title_en as category_title_en', 'colors.title as color', 'colors.bl_num as bl_color')
                ->paginate(12);
        }
        else
        {
            $products=Product::query()
                ->join('categories','categories.id','=','products.category_id')
                ->join('colors','colors.id','=','products.color_id')
                ->select('products.*','categories.title_ru as category_title_ru','categories.title_en as category_title_en', 'colors.title as color', 'colors.bl_num as bl_color')
                ->paginate(12);
        }
        return view('livewire.admin-products', compact(['products']));
    }
}
