<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.pages.main.index');
    }
}
