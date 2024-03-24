<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $orders=Order::query()->where('user_id','=',auth()->user()->id)->get();
        $all_products=$this->cacheService->products_cache();

        return view('pages.profile.index', compact(['orders', 'all_products']));
    }
}
