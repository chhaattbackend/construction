<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\Brand;
use App\CCategory;
use App\DCategory;
use App\ECategory;
use App\FCategory;
use App\GlobalClass;
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

    public $globalclass;
    public function __construct()
    {
        $this->globalclass = new GlobalClass();
    }
    public function index(Request $request)
    {
        if (!$request->keyword) {
            $products = Product::paginate(25);
        } else {
            $seacrh = $request->keyword;
            $products = Product::whereHas('a_category', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('b_category', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('c_category', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('d_category', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhere('name', 'like', '%' . $seacrh . '%')
                ->orWhere('id', $seacrh)->paginate(25)->setPath('');

            $pagination = $products->appends(array(
                'keyword' => $request->keyword
            ));
        }




        return view('admin.product.index', compact('products'));
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
        $brand = Brand::all();
        return view('admin.product.create', compact('acategories', 'bcategories', 'units', 'ccategories', 'dcategories', 'ecategories', 'fcategories', 'brand'));
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

            if ($request->file('images')) {

                $product =   Product::create($request->except('image'));
                $this->globalclass->storeMultipleS3($request->file('images'), 'construction/product', $product->id);
            } else {
                Product::create($request->except('image'));
            }
        }
        return redirect()->route('products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('admin.product_image.edit', compact('product'));
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
        $brand = Brand::all();
        $units = Unit::all();
        return view('admin.product.edit', compact('product', 'acategories', 'bcategories', 'units', 'ccategories', 'dcategories', 'ecategories', 'fcategories', 'brand'));
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
        if ($request->bool12 == 1) {
            if ($request->file('images')) {
                $product =   Product::create($request->except('image', 'slug'));
                $this->globalclass->storeMultipleS3($request->file('images'), 'construction/product', $product->id);
            } else {
                Product::create($request->except('image'));
            }
        }
        if ($request->bool12 == 0) {
            $product = Product::find($id);
            if ($request->file('images')) {

                $this->globalclass->storeMultipleS3($request->file('images'), 'construction/product', $product->id);
                $product->update($request->except('image'));
            } else {
                $product->update($request->except('image'));
            }
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
            $item = Product::find($id);
            $item->delete();
        }
        return redirect()->back();
    }
    public function list(Request $request)
    {



        // $product = Product::find();

        // Product::create([
        //     'a_category_id' => $product->a_category_id,
        //     'b_category_id' => $product->b_category_id,
        //     'c_category_id' => $product->c_category_id,
        //     'd_category_id' => $product->d_category_id,
        //     'name' => $request->name,
        //     'brand_id' => $request->brand_id,
        //     'quantity' => $request->quantity,





        // ]);
        if ($request->file('image')) {

            $filename = $this->globalclass->storeS3($request->file('image'), 'construction/product');
            Product::create($request->except('image') + ["image" => $filename]);
        } else {
            Product::create($request->except('image'));
        }
    }
}
