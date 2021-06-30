<?php

namespace App\Http\Controllers;

use App\ACategory;
use App\BCategory;
use App\Customer;
use App\Unit;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->keyword){
            $customers=Customer::paginate(25);
            }
            else{

                $customers=Customer::where('name','like','%'.$request->keyword.'%')
                ->orwhere('email','like','%'.$request->keyword.'%')
                ->orwhere('phone','like','%'.$request->keyword.'%')
                ->paginate(25)->setPath ( '' );

                $pagination = $customers->appends ( array (
                    'keyword' => $request->keyword
            ));

            }

        return view('admin.customer.index', compact('customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.customer.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if (auth()->user()->role->name == 'super admin') {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $img = $image->move($destinationPath, $name);
            Customer::create($request->except('image') + ['image' => $name]);
        } else {
            Customer::create($request->all());
        }
    }
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $acategories = ACategory::all();
        $bcategories = BCategory::all();
        $units = Unit::all();
        $users = User::all();
        return view('admin.customer.edit', compact('customer', 'acategories', 'bcategories', 'units', 'users'));
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
        $customer = Customer::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $img = $image->move($destinationPath, $name);
            $customer->update($request->except('image') + ['image' => $name]);
        } else {
            $customer->update($request->all());
        }
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   if(auth()->user()->email == 'chhattofficial@chhatt.com'){
        $item = Customer::find($id);
        $item->delete();
    }
        return redirect()->back();
    }
}
