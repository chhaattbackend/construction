<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\CCategory;
use App\DCategory;
use App\ECategory;
use App\FCategory;
use App\Product;
use Illuminate\Http\Request;
use App\Unit;

class ProductController extends Controller
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
            $products=Product::where('name','LIKE',"%{$request->keyword}%")
            ->orWhere('price','LIKE',"%{$request->keyword}%")
            ->paginate(25);
            $products->withPath('?keyword=' . $request->keyword);
            return view('admin.product.index',compact('products','keyword'));
        }
    }
        if ($request->ajax()) {

            if($request->keyword!=null){
                $keyword=$request->keyword;
                $products=Product::where('name','LIKE',"%{$request->keyword}%")
                ->orWhere('price','LIKE',"%{$request->keyword}%")
                ->paginate(25);
                $products->withPath('?keyword=' . $request->keyword);
        }
        else{
            $keyword = '';
            $products=Product::paginate(25);
        }

        return view('admin.product.search',compact('products','keyword'));
    }
    $products=Product::paginate(25);

        return view('admin.product.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acategories = ACategory::all();
        $bcategories = BCategory::all();
        $ccategories = CCategory::all();
        $dcategories = DCategory::all();
        $ecategories = ECategory::all();
        $fcategories = FCategory::all();
        $units = Unit::all();
        return view('admin.product.create', compact('acategories', 'bcategories', 'units','ccategories','dcategories','ecategories','fcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $img = $image->move($destinationPath, $name);
            Product::create($request->except('image') + ['image' => $name]);
        } else {
            Product::create($request->all());
        }

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $acategories = ACategory::all();
        $bcategories = BCategory::all();
        $ccategories = CCategory::all();
        $dcategories = DCategory::all();
        $ecategories = ECategory::all();
        $fcategories = FCategory::all();

        $units = Unit::all();
        return view('admin.product.edit', compact('product', 'acategories', 'bcategories', 'units','ccategories','dcategories','ecategories','fcategories'));
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
        // dd($request->all());
       

            $product = Product::find($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $img = $image->move($destinationPath, $name);
                $product->update($request->except('image') + ['image' => $name]);
            } else {
                $product->update($request->all());
            }

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::find($id);
        $item->delete();
        return redirect()->back();
    }
}
