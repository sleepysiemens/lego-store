<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()!=null)
        {
            if(auth()->user()->is_admin)
                return redirect()->route('admin.main.index');
            else
                //redirect на кабинет пользователя
                return redirect()->route('main.index');
        }
        else
        {
            return redirect()->route('main.index');
        }

        //return view('home');
    }
}
