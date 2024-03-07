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

    public function contact()
    {
        return view('pages.contact.index');
    }
}
