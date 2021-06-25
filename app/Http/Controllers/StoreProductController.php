<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\Brand;
use App\CCategory;
use App\Product;
use App\Store;
use App\StoreProduct;
use App\Unit;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Global_;

class StoreProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $storeproducts=StoreProduct::paginate(25);
        // if(auth()->user()->store==null){
        //     return redirect()->route('stores.create');
        // }
        // if (auth()->user()->role->name=='admin'){
        //     $storeproducts=StoreProduct::where('store_id',auth()->user()->store->id)->paginate(25);
        // }
        return view('admin.store_product.index',compact('storeproducts'));

    }

    public function index2(Request $request)
    {

        return view('admin.store_product.create2');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $storeproducts=StoreProduct::all();
        $products=Product::all();
        $stores=Store::all();
        $brands=Brand::all();
        $units=Unit::all();

        if(auth()->user()->role->name=='admin'){
            $storeproducts=StoreProduct::where('store_id',auth()->user()->store->id)->get();
            $stores=Store::where('user_id',auth()->user()->id)->get();
        }
        // dd($storeproducts);
        return view('admin.store_product.create',compact('products','stores','brands','units','storeproducts'));
    }
    // public function ajax(Request $request)
    // {

    //     return view('admin.store_product.show');
    // }

    public function save(Request $request)
    {


        for($i=0;$i<count($request->product_ids);$i++){
            StoreProduct::create([
                'store_id'=>$request->storeid,
                'product_id'=>$request->product_ids[$i],
                'store_price'=>$request->productprices[$i],
                'qty'=>$request->productquantities[$i],
                'status'=>1,
                'unit_id'=>$request->unit_ids[$i]

            ]);

        }
        return redirect()->route('storeproducts.index');


    }
    public function prsonal()
    {

        // $storeproducts=StoreProduct::all();
        // $products=Product::all();
        // $stores=Store::all();
        // $brands=Brand::all();
        // $units=Unit::all();

        // if(auth()->user()->role->name=='admin'){
        //     $storeproducts=StoreProduct::where('store_id',auth()->user()->store->id)->get();
        //     $stores=Store::where('user_id',auth()->user()->id)->get();
        // }
        // // dd($storeproducts);
        // return view('admin.store_product.create',compact('products','stores','brands','units','storeproducts'));

        $acat= Store::all();
        $b = "a";
        
        $storeid = 2;

        return view('admin.store_product.list',compact('acat','b','storeid'));

    }
    public function productview(){

        $stores = Store::all();
        $b = 'a';
        return view('admin.store_product.product' ,compact('stores','b'));

    }
    public function product(Request $request){


        $b = $request->a;
        if ($request->a == 'a') {
            $b++;
            $stores = StoreProduct::where('store_id' ,$request->category)->get();

            return view('admin.store_product.product' ,compact('stores','b'));
        }

        if($request->a == 'b'){
            $b++;
            $stores = Product::where('id',$request->category)->get();
            return view('admin.store_product.product' ,compact('stores','b'));
        }
        else
        {
            return view('admin.store_product.product' ,compact('stores','b'));
        }

    }



    public function inner(Request $request)
    {


        $b = $request->a;

        if($request->a == "a"){
            $acat= ACategory::all();
            $b++;
            $storeid = $request->cat;
            return view('admin.store_product.list',compact('acat','b','storeid'));
        }
        if($request->a == "c"){
            $storeid = $request->storeid;
            $b++;

            $acat= CCategory::where('b_category_id',$request->id)->get();

            return view('admin.store_product.list',compact('acat','b','storeid'));
        }
        else if ($request->a == "d") {
            $storeid = $request->storeid;
            $b = 'product';
            $storeproducts = StoreProduct::all();
            $acat= Product::where('c_category_id',$request->id)->get();
            $units = Unit::all();
            return view('admin.store_product.list',compact('acat','b','units','storeid','storeproducts'));
        }

        else {
            $storeid = $request->storeid;
            $b++;
            $acat= BCategory::where('a_category_id',$request->id)->get();
            return view('admin.store_product.list',compact('acat','b','storeid'));
        }








    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(count($request->product_ids));

        for($i=0;$i<count($request->product_ids);$i++){
            StoreProduct::create([
                'store_id'=>$request->store_id,
                'product_id'=>$request->product_ids[$i],
                'store_price'=>$request->productprices[$i],
                'qty'=>$request->productquantities[$i],
                'status'=>1,
                'unit_id'=>$request->unit_ids[$i]

            ]);

        }
        return redirect()->route('storeproducts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $storeproduct=StoreProduct::find($id);
        return view('admin.store_product.show',compact('storeproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $storeproduct=StoreProduct::find($id);
        $products=Product::all();
        $stores=Store::all();
        $brands=Brand::all();
        $units=Unit::all();

        return view('admin.store_product.edit',compact('products','stores','brands','units','storeproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $storeproduct=StoreProduct::find($id);
        $storeproduct->update($request->all());
        return redirect()->route('storeproducts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=StoreProduct::find($id);
        $item->delete();
        return redirect()->back();
    }
}
