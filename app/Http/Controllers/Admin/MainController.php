<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function index()
    {
        $orders=Order::query()
            ->join('users','users.id','=','orders.user_id')
            ->orderBy('created_at', 'desc')
            ->select('orders.*', 'users.email')
            ->limit(10)->get();
        $bricks_amount=Product::query()->where('is_available','=',true)->where('category_id','=',1)->count();
        $minifigs_amount=Product::query()->where('is_available','=',true)->where('category_id','=',2)->count();
        $sets_amount=Product::query()->where('is_available','=',true)->where('category_id','=',3)->count();

        $latest_products=Product::query()->orderBy('updated_at', 'desc')->limit(4)->get();

        $this_month_products=Product::query()->where('created_at', '>=', date("Y-m-d H:i:s",strtotime('first day of month')))->count();
        $succ_orders=Order::query()->where('updated_at','>=',date("Y-m-d H:i:s",strtotime('first day of month')))->where('status','=',6)->count();

        $cities_amount=0;

        if(Cache::has('cities'))
        {
            $cities_amount=count(Cache::get('cities'));
        }

        return view('admin.pages.main.index', compact(['orders', 'bricks_amount', 'minifigs_amount', 'sets_amount', 'latest_products', 'this_month_products', 'succ_orders', 'cities_amount']));
    }

    public function update_cities()
    {
        if (request()->hasFile('cities_list'))
        {
            request()->file('cities_list')->move(public_path(), 'cities_list.json');

            if (file_exists(public_path('cities_list.json')))
            {
                $cities=collect(json_decode(file_get_contents(public_path('cities_list.json'))));
                $regions=$cities->pluck('region')->unique()->values()->all();
                $cities=$cities->pluck('city')->unique()->values()->all();
                Cache::put('cities', $cities);
                Cache::put('regions', $regions);
            }
        }

        return redirect()->route('admin.main');
    }
}
