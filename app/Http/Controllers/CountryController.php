<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\Country;
use App\Unit;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->keyword){
            $countries=Country::paginate(25);
            }
            else{

                $countries=Country::where('name','like','%'.$request->keyword.'%')
                ->paginate(25)->setPath ( '' );

                $pagination = $countries->appends ( array (
                    'keyword' => $request->keyword
            ));

            }

        return view('admin.country.index', compact('countries'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if (auth()->user()->role->name == 'super admin') {
        Country::create($request->all());
    }
        return redirect()->route('countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country=Country::find($id);
        return view('admin.country.show',compact('country'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country=Country::find($id);
        $acategories=ACategory::all();
        $bcategories=BCategory::all();
        $units=Unit::all();
        return view('admin.country.edit',compact('country','acategories','bcategories','units'));
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
        $country=Country::find($id);
        $country->update($request->all());
    }
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   if(auth()->user()->email == 'chhattofficial@chhatt.com'){
        $item=Country::find($id);
        $item->delete();
    }
        return redirect()->back();
    }
}
