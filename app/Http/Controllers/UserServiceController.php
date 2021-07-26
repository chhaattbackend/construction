<?php

namespace App\Http\Controllers;

use App\Service;
use App\Store;
use App\Unit;
use App\User;
use App\UserService;
use Illuminate\Http\Request;

class UserServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!$request->keyword) {
            $userservices = UserService::paginate(25);
        } else {
            $seacrh = $request->keyword;
            $userservices = UserService::whereHas('user', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('user', function ($query) use ($seacrh) {
                $query->whereHas('store', function ($query) use ($seacrh) {
                    $query->where('name', 'like', '%' . $seacrh . '%');
                });
            })->orWhereHas('service', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->paginate(25)->setPath('');

            $pagination = $userservices->appends(array(
                'keyword' => $request->keyword
            ));
        }

        return view('admin.user_service.index', compact('userservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $services = Service::all();
        $units = Unit::all();
        return view('admin.user_service.create', compact('users', 'services', 'units'));
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
            UserService::create($request->all());
        }
        return redirect()->route('userservices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userservice = UserService::find($id);
        return view('admin.user_service.show', compact('userservice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userservice = UserService::find($id);
        $users = User::all();
        $services = Service::all();
        $units = Unit::all();
        return view('admin.user_service.edit', compact('userservice', 'users', 'services', 'units'));
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
            $userservice = UserService::find($id);
            $userservice->update($request->all());
        }
        return redirect()->route('userservices.index');
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
            $item = UserService::find($id);
            $item->delete();
        }
        return redirect()->back();
    }
}
