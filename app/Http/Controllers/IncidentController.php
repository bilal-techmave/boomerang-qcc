<?php

namespace App\Http\Controllers;
use App\Models\{Incident, IncidentStatus};
use App\Models\IncidentDocu;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Common\ImageController;
use App\Models\Client;
use App\Models\ClientPortfolio;
use App\Models\ClientSite;
use App\Models\User;
use App\Models\ClientPortfolioSite;
use Illuminate\Http\Request;

class IncidentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:incident-report-view')->only(['index', 'show']);
        $this->middleware('role:incident-report-create')->only(['create', 'store']);
        $this->middleware('role:incident-report-solve')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allprotfolio = ClientPortfolioSite::with(['site','site.state','protfolio','protfolio.client'])->has('protfolio')->has('site')->has('protfolio.client')->get();
        $incidents_query = Incident::with(['incident_client','incident_user'])->orderBy('id','DESC');
        $alluser        = User::whereIn('role', ['person', 'staff'])->get();

        $searchParams = [
            'client_id' => 'client_id',
            'incident_status' => 'status',
            'incident_date' => 'incident_date',
            'incident_id' => 'id',
            'creator' => 'creater_id',
        ];
        
        foreach ($searchParams as $param => $column) {
            if ($request->filled($param)) {
                if ($column == 'incident_date' && $request->$param !== "") {
                    $incidents_query->whereDate($column, $request->$param);
                } elseif ($request->$param !== "0") {
                    $incidents_query->where($column, $request->$param);
                }
            }
        }
        
        $incidents = $incidents_query->get();
        return view('reports.incident.incident-reports', compact('incidents','allprotfolio','alluser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allprotfolio = ClientPortfolioSite::with(['site','site.state','protfolio','protfolio.client'])->has('protfolio')->has('site')->has('protfolio.client')->get();
        return view('reports.incident.incident-reports-add',compact('allprotfolio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'place_of_incident' => 'required|not_in:0',
            'incident_date' => 'required',
        ]);

        $driver_vehicle_data=[
            "driver_name"=>$request['driver_name'] ?? null,
            "driver_licence"=>$request['driver_licence'] ?? null,
            "first_vehicle_rego"=>$request['first_vehicle_rego'] ?? null,
            "second_driver_name"=>$request['second_driver_name'] ?? null,
            "second_driver_licence"=>$request['second_driver_licence'] ?? null,
            "second_vehicle_rego"=>$request['second_vehicle_rego'] ?? null,

        ];
        $injury_person_data=[
            // "injury_person_check"=>$request['injury_person_check'] ?? null,
            "injured_person_name"=>$request['injured_person_name'] ?? null,
            "injured_person_phone"=>$request['injured_person_phone'] ?? null,
            "injured_person_document"=>$request['injured_person_document'] ?? null,
            "medical_treatment"=>$request['medical_treatment'] ?? null,
            "person_stop_work"=>$request['person_stop_work'] ?? null,
            "person_returned_work"=>$request['person_returned_work'] ?? null,
            "person_medical_certificated"=>$request['person_medical_certificated'] ?? null,
            "date_work_ceased"=>$request['date_work_ceased'] ?? null,
            "time_work_ceased"=>$request['time_work_ceased'] ?? null,
            "injury_cause"=>$request['injury_cause'] ?? null,
            "injury_location"=>$request['injury_location'] ?? null,

        ];
        $environmental_data=[
            "category_environmental_incident"=>$request['category_environmental_incident'] ?? null,
            "cause_been_isolated_eliminated"=>$request['cause_been_isolated_eliminated'] ?? null,
            "action_eliminate_impact"=>$request['action_eliminate_impact'] ?? null,
            "further_action_required"=>$request['further_action_required'] ?? null,
            "action_is_required"=>$request['action_is_required'] ?? null,

        ];
        $other_details = [
            "category_other_incident" => $request["category_other_incident"] ?? null,
            "provide_other_info" => $request["provide_other_info"] ?? null,
            "cause_isolated_elimnated" => $request["cause_isolated_elimnated"] ?? null,
            "action_taken_eliminate_impact" => $request["action_taken_eliminate_impact"] ?? null,
            "is_further_action_required" => $request["is_further_action_required"] ?? null,
            "further_action_required" => $request["further_action_required"] ?? null,
            "i_confirm_all" => $request["i_confirm_all"] ?? null,
        ];

        $incident_data = [
            'creater_id'                =>auth()->user()->id,
            'creater_name'              =>$request->creater_name,
            'creater_phone'             =>$request->creater_phone,
            'place_of_incident'         =>$request->place_of_incident,
            'incident_date'             =>$request->incident_date,
            'incident_time'             =>$request->incident_time,
            // 'is_witness'                =>$request->is_witness,
            'is_witness_check'          =>0,
            'witness_name'              =>$request->witness_name,
            'witness_phone'             =>$request->witness_phone,
            'witness_doc_number'        =>$request->witness_doc_number,
            'client_id'                 =>$request->client_id,
            'incident_address'          =>$request->incident_address,
            'driver_vehicle_data'       =>json_encode($driver_vehicle_data),
            'is_injury_person_check'    =>0,
            'injury_person_data'        =>json_encode($injury_person_data),
            'is_environmental_incident' =>0,
            'environmental_data'        =>json_encode($environmental_data),
            'other_details'             =>json_encode($other_details),
            'status'                    =>$request->status ?? 'Created',

        ];
        $incident_id = Incident::create($incident_data)->id;
        // $incident = Incident::insert($incident_data);
        // $incident_id = $incident->id;
        IncidentStatus::insert(['user_id'=>auth()->user()->id, 'status'=>$request->status ?? 'Created', 'incident_id'=>$incident_id]);
        if ($incident_id)
        {
            if($request->hasFile('injury_file')){
                $injury_file = $request->file('injury_file');
                $dateFolder = 'incident/injury';
                $injury_file_imageupload = ImageController::upload($injury_file,$dateFolder);
                $incident_docus = [
                    "incident_id"=>$incident_id ,
                    "doc_type" => 'injury' ,
                    "doc_file" => $injury_file_imageupload ,
                ];
                IncidentDocu::insert($incident_docus);
            }

            if($request->hasFile('environmental_file')){
                $environmental_file = $request->file('environmental_file');
                $dateFolder = 'incident/environmental';
                $environmental_file_imageupload = ImageController::upload($environmental_file,$dateFolder);
                $incident_docus= [
                    "incident_id"=>$incident_id,
                    "doc_type" => 'environmental',
                    "doc_file" => $environmental_file_imageupload,
                ];
                IncidentDocu::insert($incident_docus);
            }
            if($request->hasFile('other_file')){
                $other_file = $request->file('other_file');
                $dateFolder = 'incident/other_file';
                $other_file_imageupload = ImageController::upload($other_file,$dateFolder);
                $incident_docus = [
                    "incident_id"=>$incident_id ,
                    "doc_type" => 'other_file',
                    "doc_file" =>  $other_file_imageupload ,
                ];
                IncidentDocu::insert($incident_docus);
            }
        }

        return redirect()->route('incident.index')->with('success','Site Created Successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // die('ok');
        $selectedprotfolio = ClientPortfolioSite::with(['site','site.state','protfolio','protfolio.client'])->has('protfolio')->has('site')->has('protfolio.client')->whereId($id)->first();
        $incident = Incident::findOrFail($id);
        $incident_docs = IncidentDocu::where('incident_id',$id)->orderBy('doc_type','ASC')->get()->toArray();
        $incidentdocument = Incident::with('incidentDocs')->where('id',$id)->get();
        // dd($incident_docs);
        $driver_vehicle_data = json_decode($incident->driver_vehicle_data, true);
        $injury_person_data = json_decode($incident->injury_person_data, true);
        $environmental_data = json_decode($incident->environmental_data, true);
        $other_details = json_decode($incident->other_details, true);
        return view('reports.incident.incident-reports-view', compact('incidentdocument','incident', 'driver_vehicle_data', 'injury_person_data', 'environmental_data', 'other_details','selectedprotfolio'));

        // return view('reports.incident.incident-reports-view');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $allprotfolio = ClientPortfolioSite::with(['site','site.state','protfolio','protfolio.client'])->has('protfolio')->has('site')->has('protfolio.client')->get();
        $incident = Incident::findOrFail($id);
        // $incident_docs = IncidentDocu::where('incident_id',$id)->orderBy('doc_type','ASC')->get()->toArray();
        $incidentdocument = Incident::with('incidentDocs')->where('id',$id)->get();
        $driver_vehicle_data = json_decode($incident->driver_vehicle_data, true);
        $injury_person_data = json_decode($incident->injury_person_data, true);
        $environmental_data = json_decode($incident->environmental_data, true);
        $other_details = json_decode($incident->other_details, true);
        return view('reports.incident.incident-reports-edit', compact('incident','incidentdocument' ,'driver_vehicle_data', 'injury_person_data', 'environmental_data', 'other_details','allprotfolio'));

        // return view('work-orders.work-order-edit');
    }
//

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'place_of_incident' => 'required|not_in:0',
            'incident_date' => 'required',
        ]);
        // dd($request->all());

        $incident = Incident::findOrFail($id);

        // Update the incident data
        $updatedata = [
            'status' => $request->status,
            'creater_name' => $request->creater_name,
            'creater_phone' => $request->creater_phone,
            'place_of_incident' => $request->place_of_incident,
            'incident_date' => $request->incident_date,
            'incident_time' => $request->incident_time,
            'is_witness_check' => $request->has('is_witness_check') ? 1 : 0,
            'witness_name' => $request->witness_name,
            'witness_phone' => $request->witness_phone,
            'witness_doc_number' => $request->witness_doc_number,
            'client_id' => $request->client_id,
            'incident_address' => $request->incident_address,
            'driver_vehicle_data' => json_encode([
                "driver_name"=>$request['driver_name'] ?? null,
                "driver_licence"=>$request['driver_licence'] ?? null,
                "first_vehicle_rego"=>$request['first_vehicle_rego'] ?? null,
                "second_driver_name"=>$request['second_driver_name'] ?? null,
                "second_driver_licence"=>$request['second_driver_licence'] ?? null,
                "second_vehicle_rego"=>$request['second_vehicle_rego'] ?? null,
            ]),
            'is_injury_person_check' => $request['injured_person_name'] ? 1 : 0,
            'injury_person_data' => json_encode([
                "injured_person_name"=>$request['injured_person_name'] ?? null,
                "injured_person_phone"=>$request['injured_person_phone'] ?? null,
                "injured_person_document"=>$request['injured_person_document'] ?? null,
                "medical_treatment"=>$request['medical_treatment'] ?? null,
                "person_stop_work"=>$request['person_stop_work'] ?? null,
                "person_returned_work"=>$request['person_returned_work'] ?? null,
                "person_medical_certificated"=>$request['person_medical_certificated'] ?? null,
                "date_work_ceased"=>$request['date_work_ceased'] ?? null,
                "time_work_ceased"=>$request['time_work_ceased'] ?? null,
                "injury_cause"=>$request['injury_cause'] ?? null,
                "injury_location"=>$request['injury_location'] ?? null,
            ]),
            'is_environmental_incident' => $request['category_environmental_incident'] ? 1 :0,
            'environmental_data' => json_encode([
                "category_environmental_incident"=>$request['category_environmental_incident'] ?? null,
                "cause_been_isolated_eliminated"=>$request['cause_been_isolated_eliminated'] ?? null,
                "action_eliminate_impact"=>$request['action_eliminate_impact'] ?? null,
                "further_action_required"=>$request['further_action_required'] ?? null,
                "action_is_required"=>$request['action_is_required'] ?? null
            ]),
            'other_details' => json_encode([
                "category_other_incident" => $request["category_other_incident"] ?? null,
                "provide_other_info" => $request["provide_other_info"] ?? null,
                "cause_isolated_elimnated" => $request["cause_isolated_elimnated"] ?? null,
                "action_taken_eliminate_impact" => $request["action_taken_eliminate_impact"] ?? null,
                "is_further_action_required" => $request["is_further_action_required"] ?? null,
                "further_action_required" => $request["further_action_required"] ?? null,
                "i_confirm_all" => $request["i_confirm_all"] ?? null,
            ]),
            'notifiable_incident'   => $request->notifiable_incident,
            'incident_investigated' => $request->incident_investigated,
            'root_cause_completed'  => $request->root_cause_completed,
            'ncr_required'          => $request->ncr_required,
            'review_completed'      => $request->review_completed,
            'general_commented'     => $request->general_commented,
        ];

        $incident->update($updatedata);
        IncidentStatus::where('incident_id', $id)->update(['user_id'=>auth()->user()->id, 'status'=>$request->status]);

        if ($id)
        {
            if($request->hasFile('injury_file')){
                $injury_file = $request->file('injury_file');
                $dateFolder = 'incident/injury';
                $injury_file_imageupload = ImageController::upload($injury_file,$dateFolder);
                $incident_docus = [
                    "incident_id"=>$id ,
                    "doc_type" => 'injury' ,
                    "doc_file" => $injury_file_imageupload ,
                ];
                IncidentDocu::insert($incident_docus);
            }

            if($request->hasFile('environmental_file')){
                $environmental_file = $request->file('environmental_file');
                $dateFolder = 'incident/environmental';
                $environmental_file_imageupload = ImageController::upload($environmental_file,$dateFolder);
                $incident_docus= [
                    "incident_id"=>$id,
                    "doc_type" => 'environmental',
                    "doc_file" => $environmental_file_imageupload,
                ];
                IncidentDocu::insert($incident_docus);
            }
            if($request->hasFile('other_file')){
                $other_file = $request->file('other_file');
                $dateFolder = 'incident/other_file';
                $other_file_imageupload = ImageController::upload($other_file,$dateFolder);
                $incident_docus = [
                    "incident_id"=>$id ,
                    "doc_type" => 'other_file',
                    "doc_file" =>  $other_file_imageupload ,
                ];
                IncidentDocu::insert($incident_docus);
            }
        }

        return redirect()->route('incident.index')->with('success', 'Incident Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($workOrder)
    {
        //
    }

}