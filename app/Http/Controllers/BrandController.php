<?php

namespace App\Http\Controllers;

use App\Brand;
use App\GlobalClass;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->globalclass = new GlobalClass();
    }
    public function index(Request $request)
    {
        if(!$request->keyword){
            $brands=Brand::paginate(25);
            }
            else{

                $brands=Brand::where('name','like','%'.$request->keyword.'%')
                ->paginate(25)->setPath ( '' );

                $pagination = $brands->appends ( array (
                    'keyword' => $request->keyword
            ));

            }

        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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

            if ($request->file('image')) {
                $filename = $this->globalclass->storeS3($request->file('image',), 'construction/brand');
                Brand::create($request->except('image') + ["image" => $filename]);
            } else {
                Brand::create($request->except('image'));
            }
        }
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $brand = Brand::find($id);

        if ($request->file('image')) {
            $filename = $this->globalclass->storeS3($request->file('image'), 'construction/brand');
            $brand->update($request->except('image') + ["image" => $filename]);
        } else {
            $brand->update($request->except('image'));
        }
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   if(auth()->user()->email == 'chhattofficial@chhatt.com'){
        $item = Brand::find($id);
        $item->delete();
    }
        return redirect()->back();
    }
}
