<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\CCategory;
use App\DCategory;
use App\ECategory;
use App\FCategory;
use Illuminate\Http\Request;

class FCategoryController extends Controller
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
            $fcategories=FCategory::where('name','LIKE',"%{$request->keyword}%")->paginate(25);
            $fcategories->withPath('?keyword=' . $request->keyword);
            return view('admin.f_category.index',compact('fcategories','keyword'));
        }
    }
        if ($request->ajax()){
        if($request->keyword!=null){
            $keyword=$request->keyword;
            $fcategories=FCategory::where('name','LIKE',"%{$request->keyword}%")->paginate(25);
            $fcategories->withPath('?keyword=' . $request->keyword);
        }
        else{
            $keyword = '';
            $fcategories=FCategory::paginate(25);
        }
        return view('admin.f_category.search',compact('fcategories','keyword'));
        }
        $fcategories=FCategory::paginate(25);
        return view('admin.f_category.index',compact('fcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ecategories=ECategory::all();
        return view('admin.f_category.create',compact('ecategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FCategory::create($request->all());
        return redirect()->route('fcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $f_category=FCategory::find($id);
        return view('admin.f_category.show',compact('f_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $f_category=FCategory::find($id);
        $ecategories=ECategory::all();
        return view('admin.f_category.edit',compact('f_category','ecategories'));
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
        $f_category=FCategory::find($id);
        $f_category->update($request->all());
        return redirect()->route('fcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=FCategory::find($id);
        $item->delete();
        return redirect()->back();
    }
}
