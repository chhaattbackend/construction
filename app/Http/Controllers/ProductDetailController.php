<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\Product;
use App\ProductDetail;
use App\Unit;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
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
            $productdetails=ProductDetail::where('product','LIKE',"%{$request->keyword}%")->paginate(25);
            $productdetails->withPath('?keyword=' . $request->keyword);
            return view('admin.product_detail.index',compact('productdetails','keyword'));
        }
    }
        if ($request->ajax()){
        if($request->keyword!=null){
            $keyword=$request->keyword;
            $productdetails=ProductDetail::where('product','LIKE',"%{$request->keyword}%")->paginate(25);
            $productdetails->withPath('?keyword=' . $request->keyword);
        }
        else{
            $keyword='';
            $productdetails=ProductDetail::paginate(25);
        }
        return view('admin.product_detail.search',compact('productdetails','keyword'));
        }
        $productdetails=ProductDetail::paginate(25);
        return view('admin.product_detail.index',compact('productdetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        return view('admin.product_detail.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if (auth()->user()->role->name == 'super admin') {
        ProductDetail::create($request->all());
    }
        return redirect()->route('productdetails.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productdetail=ProductDetail::find($id);
        return view('admin.product_detail.show',compact('productdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productdetail=ProductDetail::find($id);
        $acategories=ACategory::all();
        $bcategories=BCategory::all();
        $units=Unit::all();
        $products=Product::all();
        return view('admin.product_detail.edit',compact('productdetail','acategories','bcategories','units','products'));
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
        $productdetail=ProductDetail::find($id);
        $productdetail->update($request->all());
    }
        return redirect()->route('productdetails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=ProductDetail::find($id);
        $item->delete();
        return redirect()->back();
    }
}
