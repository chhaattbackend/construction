<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\Product;
use App\ProductReview;
use App\Store;
use App\Unit;
use App\User;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productreviews=ProductReview::paginate(25);
        return view('admin.product_review.index',compact('productreviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        $users=User::all();
        $stores=Store::all();
        return view("admin.product_review.create",compact('products','users','stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->role->name=='superadmin'){

            ProductReview::create($request->all());
        }
        return redirect()->route('productreviews.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productreview=ProductReview::find($id);
        return view('admin.product_review.show',compact('productreview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productreview=ProductReview::find($id);
        $users=User::all();
        $stores=Store::all();
        $products=Product::all();
        return view('admin.product_review.edit',compact('productreview','users','stores','products'));
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
        $productreview=ProductReview::find($id);
        $productreview->update($request->all());
    }
        return redirect()->route('productreviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=ProductReview::find($id);
        $item->delete();
        return redirect()->back();
    }
}
