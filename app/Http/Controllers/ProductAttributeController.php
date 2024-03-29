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
use SebastianBergmann\Environment\Console;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->keyword) {
            $productattributes = ProductAttribute::paginate(25);
        } else {
            $seacrh = $request->keyword;
            $productattributes = ProductAttribute::whereHas('store', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('product', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('attribute', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhere('desc', 'like', '%' . $seacrh . '%')
            ->orWhere('id', $seacrh)->paginate(25)->setPath('');

            $pagination = $productattributes->appends(array(
                'keyword' => $request->keyword
            ));
        }



        return view('admin.product_attribute.index', compact('productattributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();
        $products = Product::all();
        $attributes = Attribute::all();

        return view('admin.product_attribute.create', compact('stores', 'products', 'attributes'));
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
        return redirect()->route('productattributes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productattribute = ProductAttribute::find($id);
        return view('admin.product_attribute.show', compact('productattribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productattribute = ProductAttribute::find($id);
        $acategories = ACategory::all();
        $bcategories = BCategory::all();
        $units = Unit::all();
        $stores = Store::all();
        $products = Product::all();
        $attributes = Attribute::all();
        return view('admin.product_attribute.edit', compact('productattribute', 'acategories', 'attributes', 'products', 'bcategories', 'units', 'stores'));
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
        if (auth()->user()->role->name == 'super admin') {
            $productattribute = ProductAttribute::find($id);
            $productattribute->update($request->all());
        }
        return redirect()->away($request->previous_url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->email == 'chhattofficial@chhatt.com') {
            $item = ProductAttribute::find($id);
            $item->delete();
        }
        return redirect()->back();
    }
    public function attributelist($id)
    {

        $productattribute = ProductAttribute::find($id);
        $stores = Store::all();
        // dd($productattribute->product_id);
        $products = Product::all();
        $product = ProductAttribute::where('product_id', $productattribute->product_id)->get();
        $attributes = Attribute::all();
        return view('admin.product_attribute.show', compact('productattribute', 'products', 'stores', 'product', 'attributes'));
    }


    public function attributelistStore(Product $product, Request $request)
    {
        if ($request->product_id != $request->old_product_id) {
            foreach ($request->attribute_id as $key => $item) {


                $des = $request->desc[$key];
                ProductAttribute::create([
                    'product_id' => $request->product_id,
                    'attribute_id' => $item,
                    'desc' => $des,
                ]);
            }
            return redirect()->away($request->previous_url);
        } else {

            foreach ($request->attribute_id as $key => $item) {

                $des = $request->desc[$key];
                $old_id = $request->old_id[$key];
                $productattribute = ProductAttribute::where('product_id', $product->id)->where('attribute_id', $old_id)->first();
                $productattribute->update([
                    'desc' => $des,
                    'attribute_id' => $item
                ]);
                return redirect()->route('productattributes.index');
            }
        }
    }
}
