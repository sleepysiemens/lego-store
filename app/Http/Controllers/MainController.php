<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('pages.main.index', compact(['categories']));
    }

    public function fill()
    {
        foreach (Product::all() as $product)
            $product->delete();

        /*foreach (Category::all() as $category)
            $category->delete();*/

        $data=
            [
              [
                'title'=>'Minifigure, Utensil Candle',
                'color_id'=>1,
                'number'=>'6234807',
                'bricklink_number'=>'37762',
                  'other_numbers'=>'6234807/37762',
                  'price'=>36,
                'amount'=>3,
                'is_available'=>true,
                'category_id'=>1,
                'weight'=>0.28,


              ],
            ];

        foreach ($data as $fill)
        {
            Product::create($fill);
        }
    }
}
