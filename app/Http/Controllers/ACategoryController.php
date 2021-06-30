<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use Illuminate\Http\Request;
use App\GlobalClass;
use App\Role;

class ACategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->globalclass = new GlobalClass;
    }

    public function index(Request $request)
    {


        if(!$request->keyword){
            $acategories=ACategory::paginate(10);
            }
            else{

                $acategories=ACategory::where('name','like','%'.$request->keyword.'%')
                ->paginate(10)->setPath ( '' );

                $pagination = $acategories->appends ( array (
                    'keyword' => $request->keyword
            ) );

            }
            // $b = ACategory::find(2)->subcategories;
            // $c = BCategory::find(2)->subcategories;
            // return $c;

        return view('admin.a_category.index', compact('acategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.a_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if (auth()->user()->role->name == 'super admin') {

        if($request->file('image')){

            $filename = $this->globalclass->storeS3($request->file('image'),'construction/acategories');
            ACategory::create($request->except('image') + ["image" => $filename]);
        }
        else{
            Acategory::create($request->except('image'));
        }
    }
        return redirect()->route('acategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a_category = ACategory::find($id);
        return view('admin.a_category.show', compact('a_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate \Http\Response
     */
    public function edit($id)
    {
        $a_category = ACategory::find($id);
        return view('admin.a_category.edit', compact('a_category'));
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
        $a_category = ACategory::find($id);
        $a_category->update($request->all());
    }
        return redirect()->route('acategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('h');
        if(auth()->user()->email == 'chhattofficial@chhatt.com'){
        $item = ACategory::find($id);
        $item->delete();
        }
        return redirect()->back();
    }
}
