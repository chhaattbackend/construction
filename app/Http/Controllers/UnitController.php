<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
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
            $units=Unit::where('name','LIKE',"%{$request->keyword}%")->paginate(25);
            $units->withPath('?keyword=' . $request->keyword);
            return view('admin.unit.index',compact('units','keyword'));
        }
    }
        if ($request->ajax()){
        if($request->keyword!=null){
            $keyword=$request->keyword;
            $units=Unit::where('name','LIKE',"%{$request->keyword}%")->paginate(25);
            $units->withPath('?keyword=' . $request->keyword);
        }
        else{
            $keyword='';
            $units=Unit::paginate(25);
        }
        return view('admin.unit.search',compact('units','keyword'));
        }
        $units=Unit::paginate(25);
        return view('admin.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if (auth()->user()->role->name == 'super admin') {
        Unit::create($request->all());
    }
        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit=Unit::find($id);
        return view('admin.unit.show',compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit=Unit::find($id);
        return view('admin.unit.edit',compact('unit'));
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
        $unit=Unit::find($id);
        $unit->update($request->all());
    }
        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {if(auth()->user()->email == 'chhattofficial@chhatt.com'){
        $item=Unit::find($id);
        $item->delete();
    }
        return redirect()->back();
    }
}
