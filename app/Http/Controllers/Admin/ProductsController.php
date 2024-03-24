<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;

class ProductsController
{
    public function index($category)
    {
        if($category!='all')
        {
            $category=Category::query()->where('url','=',$category)->first();
        }
        else
        {
            $category=json_decode(json_encode(['url'=>'all']));
        }
        return view('admin.pages.product.index',compact(['category']));
    }

    public function create()
    {
        $categories=Category::all();
        $colors=Color::all();
        return view('admin.pages.product.create', compact(['categories', 'colors']));
    }

    public function store()
    {
        $data=
            [
                'title'=>request()->title,
                'color_id'=>request()->color_id,
                'number'=>request()->number,
                'bricklink_number'=>request()->bricklink_number,
                'other_numbers'=>request()->other_numbers,
                'price'=>request()->price,
                'category_id'=>request()->category_id,
                'amount'=>request()->amount,
                'search_link'=>request()->title.'/'.request()->number.'/'.request()->bricklink_number.'/'.request()->other_numbers,
            ];

        if(request()->is_available==null)
            $data['is_available']=0;
        else
            $data['is_available']=1;

        Product::create($data);

        return redirect()->route('admin.products.index','all');
    }

    public function edit(Product $product)
    {
        $categories=Category::all();
        $colors=Color::all();
        return view('admin.pages.product.edit', compact(['product','categories', 'colors']));
    }

    public function update(Product $product)
    {
        $data=
            [
                'title'=>request()->title,
                'color_id'=>request()->color_id,
                'number'=>request()->number,
                'bricklink_number'=>request()->bricklink_number,
                'other_numbers'=>request()->other_numbers,
                'price'=>request()->price,
                'category_id'=>request()->category_id,
                'amount'=>request()->amount,
            ];

        if(request()->is_available==null)
            $data['is_available']=0;
        else
            $data['is_available']=1;

        $product->update($data);
        return redirect()->route('admin.products.index','all');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index','all');
    }
}
