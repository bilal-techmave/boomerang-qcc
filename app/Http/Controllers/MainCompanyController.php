<?php

namespace App\Http\Controllers;

use App\Models\MainCompany;
use App\Http\Requests\StoreMainCompnayRequest;
use App\Http\Requests\UpdateMainCompnayRequest;
use App\Models\GeoCity;
use App\Models\GeoState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class MainCompanyController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:company-list,company-view')->only(['index', 'show']);
        $this->middleware('role:company-add')->only(['create', 'store']);
        $this->middleware('role:company-edit')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cacheKey = 'all_main_companies';

        $mainCompany = Cache::remember($cacheKey, 60, function () {
            return MainCompany::with(['gcity','gstate'])->orderBy('id','DESC')->get();
        });
        return view('administration.company.company',compact('mainCompany'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = GeoCity::get();
        $states = GeoState::get();
        return view('administration.company.company-add',compact('cities','states'))->with('success','Add New');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'business_name' => 'required|unique:main_companies,business_name',
            'abn' => 'required|unique:main_companies,abn',
            'unit' => 'required',
            'address_number' => 'required',
            'street_address' => 'required',
            'suburb' => 'required',
            'city' => 'required|not_in:0',
            'state'=>'required|not_in:0',
            'zipcode'=>'required'
        ]);
        $fields = $request->except('_token');
        // $fields['slug'] = Str::slug($fields['business_name']);
        $Company = MainCompany::create($fields);
        if($Company){
            Cache::forget('all_main_companies');
            return redirect()->route('administration.company.index')->with('success','Company Added Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }


    /**
     * Display the specified resource.
     */
    public function show(MainCompany $company)
    {
        $city = GeoCity::where('id',$company->city)->first();
        $state = GeoState::where('id',$company->state)->first();
        return view('administration.company.comapny-view',compact('city','state','company'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainCompany $company)
    {
        $cities = GeoCity::get();
        $states = GeoState::get();
        return view('administration.company.company-edit',compact('cities','states','company'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MainCompany $company)
    {
        $mainComp = MainCompany::where('id',$company->id)->first();
        $this->validate($request,
        [
            'business_name' => 'required|unique:main_companies,business_name,'.$mainComp->business_name.',business_name',
            'abn' => 'required|unique:main_companies,abn,'.$mainComp->abn.',abn',
            'unit' => 'required',
            'address_number' => 'required',
            'street_address' => 'required',
            'suburb' => 'required',
            'city' => 'required|not_in:0',
            'state'=>'required|not_in:0',
            'zipcode'=>'required'
        ]
    );
        $fields = $request->except(['_token','_method']);
        $Company = MainCompany::where('id',$company->id)->update($fields);
        if($Company){
            Cache::forget('all_main_companies');
            return redirect()->route('administration.company.index')->with('success','Company Updated Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainCompany $company)
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
            }elseif(MainCompany::where($request->colname, urldecode($request->colvalue))->exists()){
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
