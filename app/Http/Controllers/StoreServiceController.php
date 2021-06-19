<?php

namespace App\Http\Controllers;

use App\Service;
use App\Store;
use App\StoreService;
use App\Unit;
use Illuminate\Http\Request;

class StoreServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $storeservices=StoreService::paginate(25);

        if(auth()->user()->store==null){
            return redirect()->route('storeservices.create');
        }
        if (auth()->user()->role->name=='admin'){
            $storeservices=StoreService::where('store_id',auth()->user()->store->id)->paginate(25);
        }

        return view('admin.store_service.index',compact('storeservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores=Store::all();
        $services=Service::all();
        $units=Unit::all();
        return view('admin.store_service.create',compact('stores','services','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StoreService::create($request->all());
        return redirect()->route('storeservices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $storeservice=StoreService::find($id);
        return view('admin.store_service.show',compact('storeservice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $storeservice=StoreService::find($id);
        $stores=Store::all();
        $services=Service::all();
        $units=Unit::all();
        return view('admin.store_service.edit',compact('storeservice','stores','services','units'));
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
        $storeservice=StoreService::find($id);
        $storeservice->update($request->all());
        return redirect()->route('storeservices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=StoreService::find($id);
        $item->delete();
        return redirect()->back();
    }
}
