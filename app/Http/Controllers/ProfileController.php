<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $orders=Order::query()->where('user_id','=',auth()->user()->id)->get();
        return view('pages.profile.index', compact(['orders']));
    }
}
