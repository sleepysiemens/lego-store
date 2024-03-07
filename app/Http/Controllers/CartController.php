<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.cart.index');
    }

    public function checkout()
    {
        return view('pages.checkout.index');
    }
}
