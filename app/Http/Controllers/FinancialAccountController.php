<?php

namespace App\Http\Controllers;

use App\Models\FinancialAccount;
use App\Http\Requests\StoreFinancialAccountRequest;
use App\Http\Requests\UpdateFinancialAccountRequest;
use Illuminate\Http\Request;

class FinancialAccountController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:financial-account-view')->only(['index', 'show']);
        $this->middleware('role:financial-account-create')->only(['create', 'store']);
        $this->middleware('role:financial-account-edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = FinancialAccount::orderBy('id','DESC')->get();
        return view('financial.settings.financial-account',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('financial.settings.financial-account-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinancialAccountRequest $request)
    {
        $fields = $request->except('_token');
        $FinancialAccount = FinancialAccount::create($fields);
        if($FinancialAccount){
            return redirect()->route('financial.accounts.index')->with('success','Financial Account Added Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FinancialAccount $accounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinancialAccount $account)
    {
        // dd($account);
        return view('financial.settings.financial-account-edit',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinancialAccountRequest $request, FinancialAccount $account)
    {
        $fields = $request->except(['_token','_method']);
        $updateAccounts = FinancialAccount::where('id',$account->id)->update($fields);
        if($updateAccounts){
            return redirect()->route('financial.accounts.index')->with('success','Financial Account Updated Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialAccount $accounts)
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
            }elseif(FinancialAccount::where($request->colname, urldecode($request->colvalue))->exists()){
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
