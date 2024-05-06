<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:expense-type-view')->only(['index', 'show']);
        $this->middleware('role:expense-type-create')->only(['create', 'store']);
        $this->middleware('role:expense-type-edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expensetype = ExpenseType::orderBy('id','DESC')->get();
        return view('financial.expense-type.expense-type',compact('expensetype'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('financial.expense-type.expense-type-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseTypeRequest $request)
    {
        $fields = $request->except('_token');
        $expenstype = ExpenseType::create($fields);
        if($expenstype){
            return redirect()->route('financial.expensetype.index')->with('success','Expense Type Added Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseType $expensetype)
    {
        return view('financial.expense-type.expense-type-edit',compact('expensetype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expensetype)
    {
        $fields = $request->except(['_token','_method']);
        $expensetype = ExpenseType::where('id',$expensetype->id)->update($fields);
        if($expensetype){
            return redirect()->route('financial.expensetype.index')->with('success','Expense Type Updated Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseType $expenseType)
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
            }elseif(ExpenseType::where($request->colname, urldecode($request->colvalue))->exists()){
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
