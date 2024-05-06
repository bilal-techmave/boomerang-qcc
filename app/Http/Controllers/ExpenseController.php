<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Common\ImageController;
use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\MainCompany;
use App\Models\FinancialAccount;
use App\Models\Supplier;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\ClientSite;
use App\Models\ExpenseDocument;
use App\Models\ExpenseSite;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:expenses-view')->only(['index', 'show']);
        $this->middleware('role:expenses-create')->only(['create', 'store']);
        $this->middleware('role:expenses-edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::select('expenses.*','expense_types.expense_type_name','financial_accounts.account_name','suppliers.name','main_companies.business_name')->leftJoin('expense_types','expense_types.id','=','expenses.expense_types_id')->leftJoin('main_companies','main_companies.id','=','expenses.main_companies_id')->leftJoin('financial_accounts','financial_accounts.id','=','expenses.financial_accounts_id')->leftJoin('suppliers','suppliers.id','=','expenses.suppliers_id')->orderBy('expenses.id','DESC')->get();
        return view('financial.expenses.expense',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = FinancialAccount::where('status','1')->get();
        $companies = MainCompany::where('status','1')->get();
        $expense_type = ExpenseType::where('status','1')->get();
        $suppliers = Supplier::where('status','1')->get();
        $allsites = ClientSite::with(['state','potfolio'])->where('status','1')->get();
        return view('financial.expenses.expense-add',compact('accounts','companies','expense_type','suppliers','allsites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $expensedata = [
            "financial_accounts_id" => $request->financial_accounts_id,
            "expense_types_id" => $request->expense_types_id,
            "main_companies_id" => $request->main_companies_id,
            "due_date" => $request->due_date,
            "amount" => $request->amount,
            "suppliers_id" => $request->suppliers_id,
            "notes" => $request->notes
        ];
        $expense = Expense::create($expensedata);

        if($request->site_id){
            foreach($request->site_id as $site){
                $expense_site_data[] = [
                    "expense_id" => $expense->id,
                    "client_site_id" => $site
                ];
            }
            if($expense_site_data && !empty($expense_site_data)) ExpenseSite::insert($expense_site_data);
        }

        if($request->documentImages){
            foreach($request->documentImages as $kk=>$docuimg){
                $image = $request->file('documentImages')[$kk];
                $dateFolder = $request->team_player_role.'/' . now()->format('Y_m_d');
                $imageupload = ImageController::upload($image, $dateFolder);
                $expense_docsImg[] = [
                    "expense_id" => $expense->id,
                    "document_image" => $imageupload
                ];
            }
            if($expense_docsImg && !empty($expense_docsImg))  ExpenseDocument::insert($expense_docsImg);
        }
        return redirect()->route('financial.expense.index',['expense'=>$expense->id])->with('success','Expense created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        $expenseSite = ExpenseSite::with(['site','site.state','site.potfolio'])->where('expense_id',$expense->id)->get();
        $expenseDocument = ExpenseDocument::where('expense_id',$expense->id)->get();
        $expense = Expense::select('expenses.*','expense_types.expense_type_name','financial_accounts.account_name','suppliers.name','main_companies.business_name')->leftJoin('expense_types','expense_types.id','=','expenses.expense_types_id')->leftJoin('main_companies','main_companies.id','=','expenses.main_companies_id')->leftJoin('financial_accounts','financial_accounts.id','=','expenses.financial_accounts_id')->leftJoin('suppliers','suppliers.id','=','expenses.suppliers_id')->where('expenses.id',$expense->id)->first();
        return view('financial.expenses.expense-view',compact('expense','expenseSite','expenseDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $accounts = FinancialAccount::get();
        $companies = MainCompany::get();
        $expense_type = ExpenseType::get();
        $suppliers = Supplier::get();
        $expenseSite = ExpenseSite::with(['site','site.state','site.potfolio'])->where('expense_id',$expense->id)->get();
        // dd($expenseSite);
        $expenseDocument = ExpenseDocument::where('expense_id',$expense->id)->get();
        $allsites = ClientSite::with(['state','potfolio'])->get();
        return view('financial.expenses.expense-edit',compact('accounts','companies','expense_type','suppliers','expense','allsites','expenseSite','expenseDocument'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $expenseid)
    {
        // dd($request->all());
        $expensedata = [
            "financial_accounts_id" => $request->financial_accounts_id,
            "expense_types_id" => $request->expense_types_id,
            "main_companies_id" => $request->main_companies_id,
            "due_date" => $request->due_date,
            "amount" => $request->amount,
            "suppliers_id" => $request->suppliers_id,
            "notes" => $request->notes
        ];
         Expense::where('id',$expenseid)->update($expensedata);
        if($expenseid){
            if($request->site_id){
                foreach($request->site_id as $site){
                    $expense_site_data[] = [
                        "expense_id" => $expenseid,
                        "client_site_id" => $site
                    ];
                }
                if($expense_site_data && !empty($expense_site_data)) ExpenseSite::insert($expense_site_data);
            }

            if($request->documentImages){
                foreach($request->documentImages as $kk=>$docuimg){
                    if($request->file('documentImages')[$kk] && $request->file('documentImages')[$kk] != ""){
                        $image = $request->file('documentImages')[$kk];
                        $dateFolder = $request->team_player_role.'/' . now()->format('Y_m_d');
                        $imageupload = ImageController::upload($image, $dateFolder);
                        $expense_docsImg[] = [
                            "expense_id" => $expenseid,
                            "document_image" => $imageupload
                        ];
                    }
                }
                if($expense_docsImg && !empty($expense_docsImg))  ExpenseDocument::insert($expense_docsImg);
            }
            return redirect()->route('financial.expense.index')->with('success','Expense Updated Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
