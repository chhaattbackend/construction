<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\Product;
use App\Store;
use App\Attribute;
use App\BCategory;
use App\ProductAttribute;
use App\Unit;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) {

        if($request->page!=null && $request->keyword!=null){
            $keyword=$request->keyword;
            $productattributes=ProductAttribute::where('product','LIKE',"%{$request->keyword}%")
            ->orWhere('attribute','LIKE',"%{$request->keyword}%")
            ->orWhere('desc','LIKE',"%{$request->keyword}%")
            ->paginate(25);
            $productattributes->withPath('?keyword=' . $request->keyword);
            return view('admin.product_attribute.index',compact('productattributes','keyword'));
        }
    }
        if ($request->ajax()){
        if($request->keyword!=null){
            $keyword=$request->keyword;
            $productattributes=ProductAttribute::where('product','LIKE',"%{$request->keyword}%")
            ->orWhere('attribute','LIKE',"%{$request->keyword}%")
            ->orWhere('desc','LIKE',"%{$request->keyword}%")
            ->paginate(25);
            $productattributes->withPath('?keyword=' . $request->keyword);
        }
        else{
            $keyword = '';
            $productattributes=ProductAttribute::paginate(25);
        }
        return view('admin.product_attribute.search',compact('productattributes','keyword'));
    }
        $productattributes=ProductAttribute::paginate(25);
        return view('admin.product_attribute.index',compact('productattributes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores=Store::all();
        $products=Product::all();
        $attributes=Attribute::all();
        return view('admin.product_attribute.create',compact('stores','products','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->role->name == 'super admin') {
        ProductAttribute::create($request->all());
        }
        return redirect()->route('productattributes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productattribute=ProductAttribute::find($id);
        return view('admin.product_attribute.show',compact('productattribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productattribute=ProductAttribute::find($id);
        $acategories=ACategory::all();
        $bcategories=BCategory::all();
        $units=Unit::all();
        $stores=Store::all();
        $products= Product::all();
        $attributes =Attribute::all();
        return view('admin.product_attribute.edit',compact('productattribute','acategories','attributes','products','bcategories','units','stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   if (auth()->user()->role->name == 'super admin') {
        $productattribute=ProductAttribute::find($id);
        $productattribute->update($request->all());
    }
        return redirect()->route('productattributes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=ProductAttribute::find($id);
        $item->delete();
        return redirect()->back();
    }
}
