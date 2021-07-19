<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\CCategory;
use App\DCategory;
use App\ECategory;
use Illuminate\Http\Request;

class ECategoryController extends Controller
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
            $ecategories=ECategory::where('name','LIKE',"%{$request->keyword}%")->paginate(25);
            $ecategories->withPath('?keyword=' . $request->keyword);
            return view('admin.e_category.index',compact('ecategories','keyword'));
        }
    }
        if ($request->ajax()){
        if($request->keyword!=null){
            $keyword=$request->keyword;
            $ecategories=ECategory::where('name','LIKE',"%{$request->keyword}%")->paginate(25);
            $ecategories->withPath('?keyword=' . $request->keyword);
        }
        else{
            $keyword = '';
            $ecategories=ECategory::paginate(25);
        }
        return view('admin.e_category.search',compact('ecategories','keyword'));
        }
        $ecategories=ECategory::paginate(25);
        return view('admin.e_category.index',compact('ecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dcategories=DCategory::all();
        return view('admin.e_category.create',compact('dcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if (auth()->user()->role->name == 'super admin') {
        ECategory::create($request->all());
        
    }
        return redirect()->route('ecategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $e_category=ECategory::find($id);
        return view('admin.e_category.show',compact('e_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $e_category=ECategory::find($id);
        $dcategories=DCategory::all();
        return view('admin.e_category.edit',compact('e_category','dcategories'));
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
        $e_category=ECategory::find($id);
        $e_category->update($request->all());
    }
        return redirect()->route('ecategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {if(auth()->user()->email == 'chhattofficial@chhatt.com'){
        $item=ECategory::find($id);
        $item->delete();
    }
        return redirect()->back();
    }
}
