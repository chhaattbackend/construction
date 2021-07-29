<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\AreaOne;
use App\AreaThree;
use App\AreaTwo;
use App\BCategory;
use App\City;
use App\GlobalClass;
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

    public function __construct()
    {
        $this->globalclass = new GlobalClass();
    }
    public function index(Request $request)
    {
        

        if (auth()->user()->role->name == 'admin') {

            $stores = Store::where('user_id', auth()->user()->id)->paginate(25);
        } else {

            if (!$request->ajax()) {
                if ($request->page != null && $request->keyword != null) {
                    $keyword = $request->keyword;
                    $stores = Store::where('name', 'LIKE', "%{$request->keyword}%")
                        ->orWhere('phone', 'LIKE', "%{$request->keyword}%")
                        ->orWhere('email', 'LIKE', "%{$request->keyword}%")
                        ->orWhere('mobile', 'LIKE', "%{$request->keyword}%")
                        ->paginate(25);
                    $stores->withPath('?keyword=' . $request->keyword);
                    return view('admin.store.index', compact('stores', 'keyword'));
                }
            }
            if ($request->ajax()) {
                if ($request->keyword != null) {
                    $keyword = $request->keyword;
                    $stores = Store::where('name', 'LIKE', "%{$request->keyword}%")
                        ->orWhere('phone', 'LIKE', "%{$request->keyword}%")
                        ->orWhere('email', 'LIKE', "%{$request->keyword}%")
                        ->orWhere('mobile', 'LIKE', "%{$request->keyword}%")
                        ->paginate(25);
                    $stores->withPath('?keyword=' . $request->keyword);
                } else {
                    $keyword = '';
                    $stores = Store::paginate(25);
                }
                return view('admin.store.search', compact('stores', 'keyword'));
            }
            $stores = Store::paginate(25);
        }
        return view('admin.store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $cities = City::all();
        $areaones = AreaOne::all();
        $areatwos = AreaTwo::all();
        $areathrees = AreaThree::all();


        if (auth()->user()->role->name == 'admin') {
            $users = User::where('id', auth()->user()->id)->get();
        }
        return view("admin.store.create", compact('cities', 'users', 'areaones', 'areatwos', 'areathrees'));
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

                $filename = $this->globalclass->storeS3($request->file('image'), 'construction/store');
                $area = AreaThree::where('id', $request->area_three_id)->first();
                Store::create($request->except('image', 'area_two_id', 'area_one_id') + ['image' => $filename, 'area_one_id' => $area->areaOne->id, 'area_two_id' => $area->areaTwo->id]);
            } else {
                $area = AreaThree::where('id', $request->area_three_id)->first();
                Store::create($request->except('area_two_id', 'area_one_id') + ['area_one_id' => $area->areaOne->id, 'area_two_id' => $area->areaTwo->id]);
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
        $store = Store::find($id);
        return view('admin.store.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::find($id);
        $units = Unit::all();
        $users = User::all();
        $cities = City::all();
        $areathree = AreaThree::all();
        return view('admin.store.edit', compact('store', 'users', 'cities', 'areathree'));
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
            $store = Store::find($id);

            if ($request->file('image')) {
                $filename = $this->globalclass->storeS3($request->file('image'), 'construction/store');

                $a = strtolower($request->name);
                $slug = str_replace(' ', '-', $a);

                $area = AreaThree::where('id', $request->area_three_id)->first();
                $store->update($request->except('image', 'area_two_id', 'area_one_id', 'slug') + ['image' => $filename, 'area_one_id' => $area->area_one_id, 'area_two_id' => $area->area_two_id, 'slug' => $slug]);
            } else {
                $a = strtolower($request->name);
                $slug = str_replace(' ', '-', $a);
                $area = AreaThree::where('id', $request->area_three_id)->first();
                $store->update($request->except('area_two_id', 'area_one_id', 'slug') + ['area_one_id' => $area->area_one_id, 'area_two_id' => $area->area_two_id, 'slug' => $slug]);
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
        if (auth()->user()->email == 'chhattofficial@chhatt.com') {
            $item = Store::find($id);
            $item->delete();
        }
        return redirect()->back();
    }
}
