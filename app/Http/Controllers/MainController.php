<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $products_amount=Product::query()->where('is_available','=',true)->count();
        $orders_amount=Order::query()->where('status','=',6)->count();
        $clients_amount=User::query()->where('is_admin','=', false)->count();
        return view('pages.main.index', compact(['categories', 'products_amount', 'orders_amount', 'clients_amount']));
    }

    public function contact()
    {
        return view('pages.contact.index');
    }
}
