<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Agent;
use App\AgentSpeciality;
use App\AreaOne;
use App\AreaThree;
use App\AreaTwo;
use App\City;
use App\Lead;
use App\LeadProject;
use App\Property;
use App\PropertyImage;
use App\PropertySocial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class AreaOneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        if (!$request->keyword) {
            $areaones = AreaOne::paginate(25);
        } else {
            $areaones = AreaOne::where('name', 'like', '%' . $request->keyword . '%')
                ->paginate(25)->setPath('');
            $pagination = $areaones->appends(array(
                'keyword' => $request->keyword
            ));
        }
        return view('admin.area_one.index', compact('areaones'));


    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areaones = AreaOne::all();
        $cities = City::all();
        return view('admin.area_one.create', compact('areaones', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   if (auth()->user()->role->name == 'super admin'){
        AreaOne::create($request->all());
    }
        return redirect()->route('areaones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\areaone  $areaone
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {



    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\areaone  $areaone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areaone = AreaOne::find($id);
        $cities = City::all();
        return view("admin.area_one.edit", compact('areaone', 'cities'));
    }


    public function samplecode(Request $request)
    {
        // if ($request->script_id == 1) {
        //     Storage::disk('s3')->deleteDirectory('projects');
        //     Storage::disk('s3')->deleteDirectory('properties');
        //     Storage::disk('s3')->deleteDirectory('public');
        //     Storage::disk('s3')->deleteDirectory('users');
        // }
        // if ($request->script_id == 2) {
        //     Artisan::call('migrate:fresh');
        // }
        // if ($request->script_id == 3) {
        //     $users=User::all();
        //     foreach ($users as $user) {
        //         $encodedSMS = urlencode($request->text);

        //         $smsURL = "http://api.bizsms.pk/api-send-branded-sms.aspx?username=chhatt@bizsms.pk&pass=ch3att99&text=$encodedSMS&masking=CHHATT&destinationnum=92$user->phone&language=English%27";
        //         $client = new Client();
        //         $res = $client->get($smsURL);
        //         echo $res->getStatusCode(); // 200
        //         echo $res->getBody();
        //     }
        // }
        // if ($request->script_id == 4) {
        //     User::where('id','!=',null)->update(['role_id'=>20]);
        // }
        // if ($request->script_id == 5) {
        //     LeadProject::where('id','!=',null)->update(['project_id'=>7]);
        //     Lead::where('id','!=',null)->update(['phone'=>null]);
        //     User::where('id','!=',null)->decrement('id');
        // }
        dd('done');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\areaone  $areaone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   if (auth()->user()->role->name == 'Administrator'){
        $areaone = AreaOne::find($id);
        $areaone->update($request->all());
    }
        return redirect()->route('areaones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\areaone  $areaone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->email == 'chhattofficial@chhatt.com'){
        $item = AreaOne::find($id);
        $item->delete();
        }
        return redirect()->back();
    }
}
