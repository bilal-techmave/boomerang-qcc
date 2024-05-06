<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Template, ClientSite, User, Asset, ScheduleTemplate};


class ScheduleController extends Controller
{
    public function index()
    {
        return view("schedules.schedule");
    }
    public function create(Request $request)
    {
        $Assign_to = User::where('role', 'cleaner')->get();
        $sites = ClientSite::orderBy('id', 'desc')->get();
        $templates = Template::orderBy('id', 'desc')->get();
        $assets = Asset::orderBy('id', 'desc')->get();

        return view('schedules.template-schedule', compact('Assign_to', 'sites', 'templates', 'assets'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request['site_id'] = json_encode($request->site_id);
        $request['asset_id'] = json_encode($request->asset_id);
        $request['assign_by'] = auth()->user()->id;
        $schedule = ScheduleTemplate::create($request->all());
        
        if($schedule)
        {
            return redirect()->back()->with('success','template scheduled successfully.');
        }else{
            return redirect()->back()->with('success','template not scheduled.');
        }

    }

    public function storeAsset(Request $request)
    {
        $request->validate([
            'name'=> 'required',
        ]);
        $asset = Asset::create($request->all());
        if($asset)
        {
            return response()->json([
                'status' => '200',
                'message' => 'Success',
            ]);
        }else{
            return response()->json([
                'status' => '500',
                'message' => 'Error',
            ]);
        }
    }
    
}
