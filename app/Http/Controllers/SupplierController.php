<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\Store;
use App\Supplier;
use App\Unit;
use App\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
            $suppliers=Supplier::where('name','LIKE',"%{$request->keyword}%")
            ->orWhere('contact','LIKE',"%{$request->keyword}%")
            ->orWhere('email','LIKE',"%{$request->keyword}%")
            ->paginate(25);
            $suppliers->withPath('?keyword=' . $request->keyword);
            return view('admin.supplier.index',compact('suppliers','keyword'));
        }
    }
        if ($request->ajax()){
        if($request->keyword!=null){
            $keyword=$request->keyword;
            $suppliers=Supplier::where('name','LIKE',"%{$request->keyword}%")
            ->orWhere('contact','LIKE',"%{$request->keyword}%")
            ->orWhere('email','LIKE',"%{$request->keyword}%")
            ->paginate(25);
            $suppliers->withPath('?keyword=' . $request->keyword);
        }
        else{
            $keyword='';
            $suppliers=Supplier::paginate(25);
        }
        return view('admin.supplier.search',compact('suppliers','keyword'));
        }
        $suppliers=Supplier::paginate(25);
        return view('admin.supplier.index',compact('suppliers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $stores=Store::all();
        return view('admin.supplier.create',compact('users','stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if (auth()->user()->role->name == 'super admin') {
        Supplier::create($request->all());
    }
        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier=Supplier::find($id);
        return view('admin.supplier.show',compact('supplier'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier=Supplier::find($id);
        $acategories=ACategory::all();
        $bcategories=BCategory::all();
        $units=Unit::all();
        return view('admin.supplier.edit',compact('supplier','acategories','bcategories','units'));
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
        $supplier=Supplier::find($id);
        $supplier->update($request->all());
    }
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {if(auth()->user()->email == 'chhattofficial@chhatt.com'){
        $item=Supplier::find($id);
        $item->delete();
    }
        return redirect()->back();
    }
}
