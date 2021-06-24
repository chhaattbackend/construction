<?php

namespace App\Http\Controllers;

use App\Product;
use App\Store;
use App\User;
use Attribute;
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
    public function index(Request $request)
    {
        // $role = Role::create(['name' => 'super admin']);
        // $permission = Permission::create(['name' => 'edit articles']);
        // $role = Role::findById(1);
        // $permissions = Permission::findById(1);
        // $role->givePermissionTo($permissions);
        // auth()->user()->givePermissionTo('edit articles'); {{model_has_permission}}
        // auth()->user()->assignRole('super admin');   {{model_has_role}}


        // $permissions = Permission::create(['name' => 'Edit service']);
        // $role = Role::findById(1);
        // $role->givePermissionTo($permissions);
        // return auth()->user()->getPermissionsViaRoles();
        // $roles = Role::create(['name' => 'admin']);
        // $permissions = Permission::create(['name' => 'create post']);
        // $roles = Role::findById(2);
        // $permissions = Permission::findById(3);
        // $roles->givePermissionTo($permissions);


        // return auth()->user()->getAllPermissions();
        // return auth()->user()->getDirectPermissions();
        // return auth()->user()->getPermissionsViaRoles();

        

        $store = Store::first();
        return view('home', compact('store'));
        // dd($product->storeproducts1[0]->product);
        // dd($product->storeproducts1[0]->product->attributes[0]->desc);
        $check1 = \DB::table('store_products')
            ->leftJoin('stores', 'store_products.store_id', 'stores.id')
            ->leftJoin('products', 'store_products.product_id', 'products.id')
            ->leftJoin('a_categories', 'a_categories.id', 'products.a_category_id')
            ->leftJoin('b_categories', 'b_categories.id', 'products.b_category_id')
            ->leftJoin('users', 'users.id', 'stores.user_id')
            ->leftJoin('suppliers', 'suppliers.store_id', 'store_products.store_id')
            ->leftJoin('product_attributes', 'store_products.product_id', 'product_attributes.product_id')
            ->leftJoin('attributes', 'attributes.id', 'product_attributes.attribute_id')
            ->select('products.*', 'a_categories.name as cat_a_name', 'b_categories.name  as cat_b_name', 'attributes.name as attribute_name', 'product_attributes.desc as attribute_description', 'stores.name as store_name')
            ->where('product_attributes.product_id', 1)
            ->distinct()
            ->first();

        // $check2=\DB::table('store_products')
        // ->leftJoin('stores','store_products.store_id','stores.id')
        // ->leftJoin('products','store_products.product_id','products.id')
        // ->leftJoin('a_categories','a_categories.id','products.a_category_id')
        // ->leftJoin('b_categories','b_categories.id','products.b_category_id')
        // ->leftJoin('users','users.id','stores.user_id')
        // ->leftJoin('suppliers','suppliers.store_id','store_products.store_id')
        // ->leftJoin('product_attributes','store_products.product_id','product_attributes.product_id')
        // ->leftJoin('attributes','attributes.id','product_attributes.attribute_id')
        // ->select('products.*','a_categories.name as cat_a_name','b_categories.name  as cat_b_name','attributes.name as attribute_name','product_attributes.desc as attribute_description','stores.name as store_name')
        // ->where('product_attributes.product_id',2)
        // ->distinct()
        // ->first();

        // $attributes1=\DB::table('product_attributes')
        // ->leftJoin('store_products','store_products.product_id','product_attributes.product_id')
        // ->leftJoin('stores','store_products.store_id','stores.id')
        // ->leftJoin('products','store_products.product_id','products.id')
        // ->leftJoin('a_categories','a_categories.id','products.a_category_id')
        // ->leftJoin('b_categories','b_categories.id','products.b_category_id')
        // ->leftJoin('users','users.id','stores.user_id')
        // ->leftJoin('suppliers','suppliers.store_id','store_products.store_id')
        // ->leftJoin('attributes','attributes.id','product_attributes.attribute_id')
        // ->select('attributes.name as attribute_name','product_attributes.desc as attribute_description')
        // ->where('product_attributes.product_id',1)
        // ->get();

        // $attributes2=\DB::table('product_attributes')
        // ->leftJoin('store_products','store_products.product_id','product_attributes.product_id')
        // ->leftJoin('stores','store_products.store_id','stores.id')
        // ->leftJoin('products','store_products.product_id','products.id')
        // ->leftJoin('a_categories','a_categories.id','products.a_category_id')
        // ->leftJoin('b_categories','b_categories.id','products.b_category_id')
        // ->leftJoin('users','users.id','stores.user_id')
        // ->leftJoin('suppliers','suppliers.store_id','store_products.store_id')
        // ->leftJoin('attributes','attributes.id','product_attributes.attribute_id')
        // ->select('attributes.name as attribute_name','product_attributes.desc as attribute_description')
        // ->where('product_attributes.product_id',2)
        // ->get();
        // // dd($attributes1);
        // return response()->json([
        //     'product1'=>$check1,
        //     'attributes1'=>$attributes1,
        //     'product2'=>$check2,
        //     'attributes2'=>$attributes2,

        // ]);
        return view('home');
    }
}
