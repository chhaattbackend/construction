<?php

namespace App\Http\Controllers;

use App\BCategory;
use App\Product;
use App\Store;
use App\StoreProduct;
use App\User;
use Attribute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stores = Store::whereDate('created_at', Carbon::today())->get();
        $products = Product::whereDate('created_at', Carbon::today())->get();
        $store_products = StoreProduct::whereDate('created_at', Carbon::today())->get();


        return view('home',compact('stores','products','store_products'));
    }
}
