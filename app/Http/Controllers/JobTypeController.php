<?php

namespace App\Http\Controllers;

use App\Models\JobsubType;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:job-type-view,job-sub-type-view')->only(['index', 'show']);
        $this->middleware('role:job-type-create')->only(['create', 'store']);
        $this->middleware('role:job-type-edit')->only(['edit', 'update','updatedBoth']);
        $this->middleware('role:job-sub-type-create')->only(['addSubtype']);
        $this->middleware('role:job-sub-type-edit')->only(['edit', 'update','updatedBoth']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allsubjobs = JobsubType::with(['jobtype'])->orderBy('id','DESC')->get();
        $alljobs = JobType::orderBy('id','DESC')->get();
        return view('jobs.job-type',compact('alljobs','allsubjobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:job_types,name'
        ]);
        $fields = $request->except('_token');
        $jobtype = JobType::create($fields);
        if($jobtype){
            return redirect()->route('job-type.index')->with('success','Job Type Added Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $fields = $request->except(['_token','id']);
        $jobtypeupdated = JobType::whereId($request->id)->update($fields);
        if($jobtypeupdated){
            return redirect()->route('job-type.index')->with('success','Job Type Updated Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function addSubtype(Request $request)
    {
        $jobtypeData = JobType::whereId($request->id)->first();
        $jobtypeupdated = JobsubType::create(['job_type_id'=>$request->id,'name'=>$request->sub_type]);
        if($jobtypeupdated){
            return redirect()->route('job-type.index')->with('success','Sub-Job Type Added Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    public function updatedBoth(Request $request)
    {
        $this->validate($request, [
            'job_name' => 'required',
            'subjob_name' => 'required'
        ]);
        $subjob_id = $request->jobid;
        $jobname = $request->job_name;
        $jobsub_name = $request->subjob_name;
        $subJobtype = JobsubType::whereId($subjob_id)->first();
        $job_id = $subJobtype->job_type_id;


        if(JobType::where('name',$jobname)->exists()){
            $job_id = JobType::where('name',$jobname)->pluck('id')->first();
        }else{
            $job_id = JobType::create(['name'=>$jobname])->id;
        }
        if($jobsub_name){
            JobsubType::whereId($subjob_id)->update(['job_type_id'=>$job_id,'name'=>$jobsub_name]);
        }

        return redirect()->route('job-type.index')->with('success','Updated Successfully.');
    }

    public function unique_check(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(JobType::where($request->colname, urldecode($request->colvalue))->exists()){
                return response()->json([
                    "status" => false,
                    "message"=> "Please fill unique data. It's already exists."
                ]);
            }
            return response()->json([
                "status" => true,
                "message"=> $request->colname.' '.urldecode($request->colvalue)
            ]);
        }else{
            return response()->json([
                "status" => true,
                "message"=> "3"
            ]);
        }
    }

    public function sub_unique_check(Request $request){
        if($request->colname){
            if($request->typeC == "sub"){
                $job_id = JobType::where('name',$request->previousVal)->first()->id;
            }else{
                $job_id =$request->previousVal;
            }
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(JobsubType::where($request->colname, urldecode($request->colvalue))->where('job_type_id',$job_id)->exists()){
                return response()->json([
                    "status" => false,
                    "message"=> "Please fill unique data. It's already exists."
                ]);
            }
            return response()->json([
                "status" => true,
                "message"=> $request->colname.' '.urldecode($request->colvalue)
            ]);
        }else{
            return response()->json([
                "status" => true,
                "message"=> "3"
            ]);
        }
    }
}
