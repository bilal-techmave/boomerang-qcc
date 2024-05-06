<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Common\ImageController;
use App\Models\Contractor;
use App\Models\BaseAddress;
use App\Models\BaseDocument;
use App\Models\ContractorCleaner;
use App\Models\ContractorSupervisor;
use App\Models\GeoCity;
use App\Models\GeoState;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractorController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:contractor-view')->only(['index', 'show']);
        $this->middleware('role:contractors-create')->only(['create', 'store']);
        $this->middleware('role:contractor-edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contractors = Contractor::with('responsible')->orderBy('id','DESC')->get();
        return view('human-resources.contractors.contractor', compact('contractors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = GeoCity::get();
        $states = GeoState::get();
        $managers = User::whereIn('role',['staff','person'])->where('status','1')->get();
        $cleaners = User::where(['role' => 'cleaner', 'status' => '1'])->select('id', 'name', 'surname', 'email', 'phone_number')->get();
        return view('human-resources.contractors.contractor-add', compact('cities', 'states', 'managers', 'cleaners'));
    }


    function validationData($request)
    {
        $validData = null;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'abn' => 'required',
            'responsible' => 'nullable',
            'hourly_rate' => 'required'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'basic_info');
            $validData = $validator->errors();
            return $validData;
        }

        $validator = Validator::make($request->all(), [
            'unit' => 'nullable',
            'address_number' => 'required|array',
            'street_address' => 'required|array',
            'suburb' => 'required|array',
            'city' => 'nullable',
            'state' => 'nullable',
            'zipcode' => 'required|array',
            'is_this_main_address' => 'nullable',
            'is_this_mail_address' => 'nullable',
            'imported_address' => 'required|array'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'address');
            $validData = $validator->errors();
            return $validData;
        }

        $validator = Validator::make($request->all(), [
            'cleaner' => 'nullable'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'cleaners');
            $validData = $validator->errors();
            return $validData;
        }


        $validator = Validator::make($request->all(), [
            'document_type' => 'required|array',
            'reference_number' => 'required|array',
            'expireDate' => 'required|array',
            'documentImages' => 'nullable'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'document');
            $validData = $validator->errors();
        }
        return $validData;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validationData = $this->validationData($request);
        // if ($validationData) {
        //     return  redirect()->back()->withErrors($validationData);
        // }
        // dd($request->all());

        $contractorData = [
            'name' => $request->name,
            'abn' => $request->abn,
            'responsible_id' => $request->responsible,
            'hourly_rate' => $request->hourly_rate,
            'status' => '1'
        ];
        $newContractor = Contractor::create($contractorData);

        $contractorAddress = [];
        if ($request->address_number && !empty($request->address_number)) {
            foreach ($request->address_number as $kk => $add_num) {
                $contractorAddress[] = [
                    'type' => 'contractor',
                    'data_id' => $newContractor->id,
                    'unit' => $request->unit[$kk] ?? null,
                    'address_number' => $add_num ?? null,
                    'street_address' => $request->street_address[$kk] ?? null,
                    'suburb' => $request->suburb[$kk] ?? null,
                    'geo_city_id' => $request->city[$kk] ?? null,
                    'geo_state_id' => $request->state[$kk] ?? null,
                    'zipcode' => $request->zipcode[$kk] ?? null,
                    'is_this_main_address' => $request->is_main_address[$kk] ?? null,
                    'is_this_mail_address' => $request->is_mail_address[$kk] ?? null,
                    'status' => 1,
                    'imported_address' => $request->imported_address[$kk] ?? null,
                ];
            }
        }
        if ($contractorAddress && !empty($contractorAddress)) {
            BaseAddress::insert($contractorAddress);
        }

        $contractorCleaners = [];

        if ($request->cleaner && !empty($request->cleaner)) {
            foreach ($request->cleaner as $kk => $clear) {
                $contractorCleaners[] = [
                    'cleaner_id' => $clear,
                    'contractor_id' => $newContractor->id
                ];
            }
        }
        if ($contractorCleaners && !empty($contractorCleaners)) {
            ContractorCleaner::insert($contractorCleaners);
        }

        $contractorSupervisors = [];
        if ($request->supervisor && !empty($request->supervisor)) {
            foreach ($request->supervisor as $kk => $supervisor) {
                $contractorSupervisors[] = [
                    'contractor_id' => $newContractor->id,
                    'user_id' => $supervisor,
                    'status' => 1
                ];
            }
        }
        if ($contractorSupervisors && !empty($contractorSupervisors)) {
            ContractorSupervisor::insert($contractorSupervisors);
        }

        $contractorDocuments = [];
        if ($request->document_type && !empty($request->document_type)) {
            foreach ($request->document_type as $kk => $docs) {
                $image = $request->file('documentImages')[$kk];
                $dateFolder = 'contractor/' . now()->format('Y_m_d');
                $imageupload = ImageController::upload($image, $dateFolder);
                $contractorDocuments[] = [
                    'docs_type' => $docs,
                    'reference_number' => $request->reference_number[$kk],
                    'expire_date' => $request->expireDate[$kk],
                    'user_id' => $newContractor->id,
                    'docs_image' => $imageupload,
                    'user_type' => 'contractor'
                ];
            }
        }
        if ($contractorDocuments && !empty($contractorDocuments)) {
            BaseDocument::insert($contractorDocuments);
        }

        return redirect()->route('hr.contractor.index')->with('success', 'Contractor Save Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contractor $contractor)
    {
        $contSupervisor = ContractorSupervisor::where('contractor_id',$contractor->id)->get();
        $contractorAddress = BaseAddress::with(['city', 'state'])->where(['data_id' => $contractor->id, 'type' => 'contractor'])->get();
        $contractorDocuments = BaseDocument::where(['user_type' => 'contractor', 'user_id' => $contractor->id])->get();
        $contractorCleaner = ContractorCleaner::with(['cleaners'])->where('contractor_id', $contractor->id)->get();
        return view('human-resources.contractors.contractor-view',compact('contractor', 'contractorAddress', 'contractorDocuments', 'contractorCleaner','contSupervisor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contractor $contractor)
    {
        $cities = GeoCity::get();
        $states = GeoState::get();
        $managers = User::whereIn('role',['staff','person'])->get();
        $contSupervisor = ContractorSupervisor::where('contractor_id',$contractor->id)->get();
        $cleaners = User::where(['role' => 'cleaner', 'status' => '1'])->select('id', 'name', 'surname', 'email', 'phone_number')->get();
        $contractorAddress = BaseAddress::with(['city', 'state'])->where(['data_id' => $contractor->id, 'type' => 'contractor'])->get();
        $contractorDocuments = BaseDocument::where(['user_type' => 'contractor', 'user_id' => $contractor->id])->get();
        $contractorCleaner = ContractorCleaner::with(['cleaners'])->where('contractor_id', $contractor->id)->get();
        return view('human-resources.contractors.contractor-edit', compact('cities', 'states', 'managers', 'cleaners', 'contractor', 'contractorAddress', 'contractorDocuments', 'contractorCleaner','contSupervisor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contractor $contractor)
    {
        // $validationData = $this->validationData($request);
        // if ($validationData) {
        //     return  redirect()->back()->withInput()->withErrors($validationData);
        // }
        $contractor_id = $contractor->id;
        $contractorData = [
            'name' => $request->name,
            'abn' => $request->abn,
            'responsible_id' => $request->responsible,
            'hourly_rate' => $request->hourly_rate,
            'status' => '1'
        ];
        Contractor::whereId($contractor_id)->update($contractorData);

        $contractorAddress = [];
        if ($request->address_number && !empty($request->address_number)) {
            BaseAddress::where(['data_id' => $contractor_id, 'type' => 'contractor'])->update(['status' => 0]);
            foreach ($request->address_number as $kk => $add_num) {
                $contractorAddressNew = [
                    'unit' => $request->unit[$kk] ?? null,
                    'address_number' => $add_num ?? null,
                    'street_address' => $request->street_address[$kk] ?? null,
                    'suburb' => $request->suburb[$kk] ?? null,
                    'geo_city_id' => $request->city[$kk] ?? null,
                    'geo_state_id' => $request->state[$kk] ?? null,
                    'zipcode' => $request->zipcode[$kk] ?? null,
                    'is_this_main_address' => $request->is_main_address[$kk] ?? null,
                    'is_this_mail_address' => $request->is_mail_address[$kk] ?? null,
                    'status' => 1,
                    'imported_address' => $request->imported_address[$kk] ?? null,
                    'data_id' => $contractor_id,
                    'type' => 'contractor'
                ];
                if ($request->address_id && isset($request->address_id[$kk])) {
                    BaseAddress::where(['id' => $request->address_id[$kk], 'data_id' => $contractor_id, 'type' => 'contractor'])->update($contractorAddressNew);
                } else {
                    $contractorAddress[] = $contractorAddressNew;
                }
            }
            BaseAddress::where(['data_id' => $contractor_id, 'type' => 'contractor', 'status' => 0])->delete();
        }
        if ($contractorAddress && !empty($contractorAddress)) {
            BaseAddress::insert($contractorAddress);
        }

        $contractorCleaners = [];
        if ($request->cleaner && !empty($request->cleaner)) {
            foreach ($request->cleaner as $kk => $clear) {
                $contractorCleaners[] = [
                    'cleaner_id' => $clear,
                    'contractor_id' => $contractor_id,
                    'status' => 1
                ];
            }
        }
        if ($contractorCleaners && !empty($contractorCleaners)) {
            ContractorCleaner::insert($contractorCleaners);
        }

        $contractorSupervisors = [];
        if ($request->supervisor && !empty($request->supervisor)) {
            foreach ($request->supervisor as $kk => $supervisor) {
                $contractorSupervisors[] = [
                    'contractor_id' => $contractor_id,
                    'user_id' => $supervisor,
                    'status' => 1
                ];
            }
        }
        if ($contractorSupervisors && !empty($contractorSupervisors)) {
            ContractorSupervisor::insert($contractorSupervisors);
        }

        $contractorDocuments = [];
        if ($request->document_type && !empty($request->document_type)) {
            foreach ($request->document_type as $kk => $docs) {
                $image = $request->file('documentImages')[$kk]??null;
                $dateFolder = 'contractor/' . now()->format('Y_m_d');
                if($image){
                    $imageupload = ImageController::upload($image, $dateFolder);
                }
                $contractorDocuments[] = [
                    'docs_type' => $docs,
                    'reference_number' => $request->reference_number[$kk],
                    'expire_date' => $request->expireDate[$kk],
                    'user_id' => $contractor_id,
                    'docs_image' => $imageupload??null,
                    'user_type' => 'contractor',
                    'doc_upload_type'=>'request',
                    'status' => 1
                ];
            }
        }
        if ($contractorDocuments && !empty($contractorDocuments)) {
            BaseDocument::insert($contractorDocuments);
        }

        return redirect()->route('hr.contractor.index')->with('success', 'Contractor Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contractor $contractor)
    {
        //
    }

    public function cleanerDelete(){

    }

    public function unique_check(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(Contractor::where($request->colname, urldecode($request->colvalue))->exists()){
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
