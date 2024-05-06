<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\BaseContact;
use App\Models\GeoCity;
use App\Models\GeoState;
use App\Models\SuppliersFinancial;
use App\Models\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:supplier-view')->only(['index', 'show']);
        $this->middleware('role:supplier-create')->only(['create', 'store']);
        $this->middleware('role:supplier-edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::orderBy('id','DESC')->get();
        return view('suppliers.suppliers',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = GeoCity::get();
        $states = GeoState::get();
        $alluser = User::whereIn('role',['staff','person'])->get();
        return view('suppliers.suppliers-add',compact('cities','states','alluser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $fields = [
            'name' => $request->name,
            'abn' => $request->abn,
            'phone_number' => $request->phone_number,
            'alt_phone_number' => $request->alt_phone_number,
            'fax_number' => $request->fax_number,
            'unit' => $request->unit,
            'address_number' => $request->address_number,
            'street_address' => $request->street_address,
            'zipcode' => $request->zipcode,
            'suburb' => $request->suburb,
            'city' => $request->city,
            'state' => $request->state,
            'email' => $request->email,
            'website' =>$request->website,
            'notes' => $request->notes
        ];
        $supplier_id = Supplier::create($fields)->id;
        if($supplier_id){

            if($request->user_id && !empty($request->user_id)){
                foreach($request->user_id as $kk=>$contact){
                    BaseContact::create(['contact_type'=>'supplier','data_id'=>$supplier_id,'user_id'=>$contact,'user_type'=>$request->contact_type[$kk]]);
                }
            }

            if($request->payment_type && !empty($request->payment_type)){
                foreach($request->payment_type as $kk=>$paytype){
                    SuppliersFinancial::create([
                        'supplier_id'=>$supplier_id,
                        'payment_type'=>$paytype,
                        'cheque_name'=>$request->chequeName[$kk],
                        'account_name'=>$request->accountName[$kk],
                        'branch_route'=>$request->branchRoute[$kk],
                        'account_number'=>$request->accountNumber[$kk],
                        'biller_code'=>$request->billerCode[$kk],
                        'reference'=>$request->refernceCNR[$kk]
                    ]);
                }
            }

            return redirect()->route('supplier.suppliers.index')->with('success','Supplier Added Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Display the specified resource.
     */
    public function show($supplier)
    {
        $supplier = Supplier::whereId($supplier)->first();
        $baseContact = BaseContact::where(['contact_type'=>'supplier','data_id'=>$supplier->id])->get();
        $supplierFin = SuppliersFinancial::where(['supplier_id'=>$supplier->id])->get();

        return view('suppliers.suppliers-view',compact('supplier','baseContact','supplierFin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($supplier)
    {
        $cities = GeoCity::get();
        $states = GeoState::get();
        $supplier = Supplier::whereId($supplier)->first();
        $baseContact = BaseContact::with(['user'])->where(['contact_type'=>'supplier','data_id'=>$supplier->id])->get();
        $supplierFin = SuppliersFinancial::where(['supplier_id'=>$supplier->id])->get();
        $alluser = User::whereIn('role',['staff','person'])->get();
        // dd($supplier,$baseContact,$supplierFin);
        return view('suppliers.suppliers-edit',compact('cities','states','supplier','baseContact','supplierFin','alluser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $supplier)
    {
        $fields = [
            'name' => $request->name,
            'abn' => $request->abn,
            'phone_number' => $request->phone_number,
            'alt_phone_number' => $request->alt_phone_number,
            'fax_number' => $request->fax_number,
            'unit' => $request->unit,
            'address_number' => $request->address_number,
            'street_address' => $request->street_address,
            'zipcode' => $request->zipcode,
            'suburb' => $request->suburb,
            'city' => $request->city,
            'state' => $request->state,
            'email' => $request->email,
            'website' =>$request->website,
            'notes' => $request->notes
        ];
        $suppliers = Supplier::where('id',$supplier)->update($fields);
        if($suppliers){
            if($request->user_id && !empty($request->user_id)){
                foreach($request->user_id as $kk=>$contact){
                    BaseContact::create(['contact_type'=>'supplier','data_id'=>$supplier,'user_id'=>$contact,'user_type'=>$request->contact_type[$kk]]);
                }
            }

            if($request->payment_type && !empty($request->payment_type)){
                foreach($request->payment_type as $kk=>$paytype){
                    SuppliersFinancial::create([
                        'supplier_id'=>$supplier,
                        'payment_type'=>$paytype,
                        'cheque_name'=>$request->chequeName[$kk],
                        'account_name'=>$request->accountName[$kk],
                        'branch_route'=>$request->branchRoute[$kk],
                        'account_number'=>$request->accountNumber[$kk],
                        'biller_code'=>$request->billerCode[$kk],
                        'reference'=>$request->refernceCNR[$kk]
                    ]);
                }
            }
            return redirect()->route('supplier.suppliers.index')->with('success','Supplier Updated Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
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
            }elseif(Supplier::where($request->colname, urldecode($request->colvalue))->exists()){
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
