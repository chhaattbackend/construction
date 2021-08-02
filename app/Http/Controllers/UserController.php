<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // auth()->user()->assignRole('super admin');
        // auth()->user()->givePermissionTo('delete');

        $users = User::all();
        return view('admin.user.index', compact('users'));
    }


    public function save_image(Request $request)
    {

        $id = $request->userid;
        $user = User::find(auth()->user()->id);


        //    if ($request->hasFile('dp')) {
        //        $completeFileName = $request->file('dp')->getClientOriginalName();
        //        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        //        $extension = $request->file('dp')->getClientOriginalExtension();
        //        $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
        //        $path = $request->file('dp')->storeAs('public/images/userdp', $compPic);
        //        $user->dp = $compPic;
        //        $user->save();
        //    }
        if ($request->hasFile('dp')) {

            if (auth()->user()->dp != null) {
                // $image_path = 'D:/xampp/htdocs/constructionchatt/public/images/userdp/'.auth()->user()->dp;
                $image_path = public_path('/images/userdp/').auth()->user()->dp;
                    unlink($image_path);

            }
            $nnn = date('YmdHis');
            $completeFileName = $request->file('dp')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $image = $request->file('dp');
            $name = str_replace(' ', '_', $fileNameOnly) . '-' . time() . $nnn . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/userdp');
            $image->move($destinationPath, $name);
            $user->dp = $name;
            $user->save();

            return 1;


        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { if (auth()->user()->email == 'chhattofficial@chhatt.com'){
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
    }
    return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if (auth()->user()->email == 'chhattofficial@chhatt.com') {
        User::create($request->except('password')+['password' => Hash::make($request->password)]);
    }
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user->status==0){
        $user->update([
            'status'=>1
        ]);
        }
        else{
            $user->update([
                'status'=>0
            ]);
        }
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   if (auth()->user()->email == 'chhattofficial@chhatt.com') {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user','roles'));
    }
    redirect()->route('users.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   if (auth()->user()->email == 'chhattofficial@chhatt.com') {

        $user = User::find($id);

        $user->update($request->except('password')+['password' => Hash::make($request->password)]);
    }
        return redirect()->route('users.index');
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
        $item = User::find($id);
        $item->delete();
        }
        return redirect()->back();
    }
}
