<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\CCategory;
use App\GlobalClass;
use Illuminate\Http\Request;

class CCategoryController extends Controller
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
            $ccategories=CCategory::paginate(25);
            }
            else{

                $ccategories=CCategory::where('name','like','%'.$request->keyword.'%')
                ->paginate(25)->setPath ( '' );

                $pagination = $ccategories->appends ( array (
                    'keyword' => $request->keyword
            ) );

            }

        return view('admin.c_category.index', compact('ccategories'));
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bcategories=BCategory::all();
        return view('admin.c_category.create',compact('bcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('image')){
            $filename = $this->globalclass->storeS3($request->file('image'),'construction/ccategories');
            CCategory::create($request->except('image') + ["image" => $filename]);

        }
        else{
            Ccategory::create($request->except('image'));
        }
        return redirect()->route('ccategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c_category=CCategory::find($id);
        return view('admin.c_category.show',compact('c_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $c_category=CCategory::find($id);
        $bcategories=BCategory::all();
        return view('admin.c_category.edit',compact('c_category','bcategories'));
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
        $c_category=CCategory::find($id);
        $c_category->update($request->all());
        return redirect()->route('ccategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=CCategory::find($id);
        $item->delete();
        return redirect()->back();
    }
}
