<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Str;

class DepartmentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:department-view')->only(['index', 'show']);
        $this->middleware('role:department-add')->only(['create', 'store']);
        $this->middleware('role:department-edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cacheKey = 'all_departments';

        $departments = Cache::remember($cacheKey, 60, function () {
            return Department::orderBy('id','DESC')->get();
        });
        return view('administration.departments.departments',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managers = User::whereIn('role',['staff','person'])->where('status','1')->orderBy('name','ASC')->get();
        $supervisors = $managers;
        return view('administration.departments.departments-add',compact('managers','supervisors'))->with('success','Add New');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
         [
            'name' => 'required|min:2|unique:departments,name',
            'email' => 'required|email:rfc,dns|unique:departments,email',
            'internal_code' => 'required|unique:departments,internal_code',
            'supervisor' => 'nullable',
            'manager' => 'nullable',
            'is_work_order' => 'nullable',
            'is_email_send' => 'nullable'
         ]);
        $fields = $request->except('_token');
        $fields['slug'] = Str::slug($fields['name']);
        $fields['supervisor'] = $request->supervisor == '0' ? null : $request->supervisor;
        $fields['manager'] = $request->manager == '0' ? null : $request->manager;

        $department = Department::create($fields);
        if($department){
            Cache::forget('all_departments');
            return redirect()->route('administration.department.index')->with('success','Department Added Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');

    }

    /**
     * Display the specified resource.
     */
    public function show($department)
    {
        $departmentnew = Department::with(['manager_get','supervisor_get'])->whereId($department)->first();
        return view('administration.departments.departments-view',compact('departmentnew'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $managers = User::whereIn('role',['staff','person'])->orderBy('name','ASC')->get();
        $supervisors = $managers;
        return view('administration.departments.departments-edit',compact('department','managers','supervisors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $olddepartment = Department::whereId($department->id)->first();
        $this->validate($request,
         [
            'name' => 'required|min:2|unique:departments,name,'.$olddepartment->name.',name',
            'email' => 'required|email:rfc,dns|unique:departments,email,'.$olddepartment->email.',email',
            'internal_code' => 'required|unique:departments,internal_code,'.$olddepartment->internal_code.',internal_code',
            'supervisor' => 'nullable',
            'manager' => 'nullable',
            'is_work_order' => 'nullable',
            'is_email_send' => 'nullable'
         ]);
        $fields = $request->except(['_token','_method']);
        $fields['slug'] = Str::slug($fields['name']);
        $fields['supervisor'] = $request->supervisor == '0' ? null : $request->supervisor;
        $fields['manager'] = $request->manager == '0' ? null : $request->manager;
        $fields['is_work_order'] = $request->is_work_order == '0' ? null : $request->is_work_order;
        $fields['is_email_send'] = $request->is_email_send == '0' ? null : $request->is_email_send;

        $department = Department::whereId($department->id)->update($fields);
        if($department){
            Cache::forget('all_departments');
            return redirect()->route('administration.department.index')->with('success','Department Updated Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }

    public function unique_check(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(Department::where($request->colname, urldecode($request->colvalue))->exists()){
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
