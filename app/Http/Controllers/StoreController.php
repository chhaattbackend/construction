<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\City;
use App\Store;
use App\Unit;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->role->name=='admin'){

                $stores=Store::where('user_id',auth()->user()->id)->paginate(25);
        }
        else{

        if (!$request->ajax()) {
        if($request->page!=null && $request->keyword!=null){
            $keyword=$request->keyword;
            $stores=Store::where('name','LIKE',"%{$request->keyword}%")
            ->orWhere('phone','LIKE',"%{$request->keyword}%")
            ->orWhere('email','LIKE',"%{$request->keyword}%")
            ->orWhere('mobile','LIKE',"%{$request->keyword}%")
            ->paginate(25);
            $stores->withPath('?keyword=' . $request->keyword);
            return view('admin.store.index',compact('stores','keyword'));
        }
    }
        if ($request->ajax()){
        if($request->keyword!=null){
            $keyword=$request->keyword;
            $stores=Store::where('name','LIKE',"%{$request->keyword}%")
            ->orWhere('phone','LIKE',"%{$request->keyword}%")
            ->orWhere('email','LIKE',"%{$request->keyword}%")
            ->orWhere('mobile','LIKE',"%{$request->keyword}%")
            ->paginate(25);
            $stores->withPath('?keyword=' . $request->keyword);
        }
        else{
            $keyword='';
            $stores=Store::paginate(25);
        }
        return view('admin.store.search',compact('stores','keyword'));
        }
        $stores=Store::paginate(25);
    }
        return view('admin.store.index',compact('stores'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $cities=City::all();
        if(auth()->user()->role->name=='admin'){
            $users=User::where('id',auth()->user()->id)->get();
        }
        return view("admin.store.create",compact('cities','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if (auth()->user()->role->name == 'super admin') {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $img = $image->move($destinationPath, $name);
            Store::create($request->except('image') + ['image' => $name]);
        } else {
            Store::create($request->all());
        }
    }
        return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store=Store::find($id);
        return view('admin.store.show',compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store=Store::find($id);
        $units=Unit::all();
        $users=User::all();
        $cities=City::all();
        return view('admin.store.edit',compact('store','users','cities'));
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
        $store=Store::find($id);
        $store = Store::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $img = $image->move($destinationPath, $name);
            $store->update($request->except('image') + ['image' => $name]);
        } else {
            $store->update($request->all());
        }
    }
        return redirect()->route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Store::find($id);
        $item->delete();
        return redirect()->back();
    }
}
