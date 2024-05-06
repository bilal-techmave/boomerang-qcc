<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Common\ImageController;
use App\Models\Ticket;
use App\Models\ClientPortfolio;
use App\Models\User;
use App\Models\Client;
use App\Models\JobType;
use App\Models\Department;
use App\Models\WorkOrder;
use App\Models\BaseContact;
use App\Models\ClientSite;
use App\Models\ClientSiteShiftCleanerImage;
use App\Models\ClientWorkOrder;
use App\Models\Contractor;
use App\Models\GeoCity;
use App\Models\GeoState;
use App\Models\OtherDocument;
use App\Models\WorkOrderCleaner;
use App\Models\WorkOrderComment;
use App\Models\WorkOrderContractor;
use App\Models\WorkOrderEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['role']);
            $this->middleware('can:work-order-view')->only(['index','show','change_status','work_order_view']);
            $this->middleware('can:work-order-create')->only(['create','store']);
            $this->middleware('can:work-order-edit')->only(['edit','update']);
        // }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $allworkOrder = WorkOrder::with(['department','site','site.state','site.city','client','portfolio','portfolio.manager','jobtype']);

        $client                 =  $request->input('clients');
        $portfolio              =  $request->input('portfolio');
        $sites                  =  $request->input('allsites');
        $department             =  $request->input('departments');
        $status                 =  $request->input('status');
        $reference_number       =  $request->input('reference_number');
        $sch_date_start         =  $request->input('sch_date_start');
        $sch_date_finish        =  $request->input('sch_date_finish');
        $comp_date_start        =  $request->input('req_comp_date_start');
        $comp_date_finish       =  $request->input('req_comp_date_finish');
        $cre_date_from          =  $request->input('cre_date_from');
        $cre_date_to            =  $request->input('cre_date_to');
        $work_bill              =  $request->input('work_bill');
        $state                  =  $request->input('state');
        $city                   =  $request->input('city');
        $woork_order            =  ltrim($request->input('woork_order'),0);
        $type                   =  $request->input('type');
        $invoice_no             =  $request->input('invoice_no');
        $supervisor             =  $request->input('supervisor');
        $portfolio_manager      =  $request->input('portfolio_manager');


        $site_state             =  ClientSite::where('geo_state_id',$state)->get()->pluck('id');
        $site_city              =  ClientSite::where('geo_city_id',$city)->get()->pluck('id');
        if(auth()->user()->is_client){
            $clients = Client::where('client_id',auth()->user()->id)->get();
        }else{
            $clients = Client::get();
        }
        
        if($client){
            $allworkOrder->where('client_id',$client);
        }elseif(auth()->user()->is_client){
            $allworkOrder->whereIn('client_id',$clients->pluck('id')->toArray());
        }



        if($portfolio)
        {
            $allworkOrder->where('client_portfolio_id',$portfolio);
        }

        if($supervisor){
           $supervisor_ids = ClientSite::where('supervisor_id',$supervisor)->get()->pluck('id')->toArray();
        }

        if($sites && isset($supervisor_ids)){
            array_push($supervisor_ids,$sites);
            $allworkOrder->whereIn('client_site_id',$supervisor_ids);
        }elseif($sites)
        {
            $allworkOrder->where('client_site_id',$sites);
        }

        if($department)
        {
            $allworkOrder->where('department_id',$department);
        }
        if($status)
        {
            $allworkOrder->whereIn('status',$status);
        }
        if($reference_number)
        {
            $allworkOrder->where('reference_number',$reference_number);
        }
        
        if($sch_date_start){
            $allworkOrder->whereDate('schedule_date','>=',$sch_date_start);
        }
        if($sch_date_finish){
            $allworkOrder->whereDate('schedule_date','<=',$sch_date_finish);
        }

       
        if($comp_date_start ){
            $allworkOrder->whereDate('completion_date','>=',$comp_date_start);
        }

        if($comp_date_finish ){
            $allworkOrder->whereDate('completion_date','<=',$comp_date_finish);
        }

        if($cre_date_from ){
            $cre_date_froms     =  date('Y-m-d H:i:s',strtotime($request->input('cre_date_from')));
            $allworkOrder->whereDate('created_at','>=',$cre_date_froms);
        }
        if($cre_date_to){
            $cre_date_tos       =  date('Y-m-d H:i:s',strtotime($request->input('cre_date_to')));
            $allworkOrder->whereDate('created_at','<=',$cre_date_tos);
        }
        if($work_bill)
        {
            $allworkOrder->where('po_work_bill',$work_bill);
        }
        if($type)
        {
            $allworkOrder->where('job_type_id',$type);
        }
        if($invoice_no)
        {
            $allworkOrder->where('invoice_number',$invoice_no);
        }

        if($portfolio_manager)
        {
            $client_portfolio       =  ClientPortfolio::where('manager_id',$portfolio_manager)->get()->pluck('id');
            $allworkOrder->whereIn('client_portfolio_id',$client_portfolio);
        }

        if($state)
        {
            $allworkOrder->whereIn('client_site_id',$site_state);
        }
        if($city)
        {
            $allworkOrder->whereIn('client_site_id',$site_city);
        }

        $managers = ClientPortfolio::whereNotNull('manager_id')->get()->pluck('manager_id');
        
        $portfolios   = ClientPortfolio::whereIn('client_id',$clients->pluck('id')->toArray())->get();
        $allsites = ClientSite::with(['state','potfolio'])->get();
        $departments = Department::where('is_work_order','1')->get();
        $cities = GeoCity::get();
        $states = GeoState::get();
        $supervisors = User::where('role','staff')->get();
        $job_types   = JobType::get();
        $portfolio_manager = User::whereIn('id',$managers)->get();

        $allworkOrder = $allworkOrder->orderBy('id','DESC')->get();


        $allStatuses = ['To Schedule','To Quote','Scheduled','Cancelled','On Hold','Completed','Re-Attendance','In Progress','Closed','Send Confirmation','Invoiced','To Invoice','Duplicated','PO Required'];

        // Group the data by the 'status' column
        $statusCounts = $allworkOrder->groupBy('status')->map->count();

        // Iterate over each group and update the count in the $statusCounts array
        foreach ($allStatuses as $status) {
            if (!isset($statusCounts[$status])) {
                $statusCounts[$status] = 0;
            }
        }

        foreach ($statusCounts as $status => $count) {
            $statusCounts[$status] = $count ?: 0;
        }
        // dd($statusCounts);
        return view('work-orders.work-order',compact('allworkOrder','clients','portfolios','allsites','departments','cities','states','job_types','supervisors','portfolio_manager','statusCounts'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cleaners = User::where(['role'=>'cleaner','status'=>1])->get();
        $ticket      = Ticket::with(['getTicketDetail'])->get();
        if(auth()->user()->role == 'admin' || !auth()->user()->is_client){
            $client = Client::where('is_prospect_client','0')->where('status','1')->get();
        }else{
            $client = Client::where('client_id',auth()->user()->id)->where('is_prospect_client','0')->where('status','1')->get();
        }
        // $client      = Client::where('is_prospect_client','0')->get();
        // $portfolio   = ClientPortfolio::get();
        $portfolio   = ClientPortfolio::whereIn('client_id',$client->pluck('id')->toArray())->where('status','1')->get();
        $user        = User::where('role', 'user')->where('status','1')->get();
        $departments = Department::where('is_work_order','1')->where('status','1')->get();
        $client_portfolios = ClientPortfolio::where('status','1')->get();
        $job_types   = JobType::where('status','active')->get();
        $contractor = Contractor::where('status','1')->get();
        $allsites = ClientSite::with(['state','potfolio'])->whereIn('portfolio_id',$portfolio->pluck('portfolio_id')->where('status','1')->toArray())->get();
        return view('work-orders.work-order-add', compact('ticket', 'portfolio','cleaners','user', 'departments', 'client', 'job_types', 'client_portfolios', 'contractor','allsites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // $validationData = $this->validationData($request);
        // if ($validationData) {
        //     return  redirect()->back()->withInput()->withErrors($validationData);
        // }

        $workOrder = [
            'client_id' => $request->selectCleint,
            'client_portfolio_id' => $request->portfolio,
            'client_site_id' => $request->sitename,
            'job_type_id' => $request->type,
            'job_sub_type_id' => $request->subtype,
            'reference_number' => $request->referenceno,
            'requester' => $request->requester,
            'completion_date' => $request->completionDate,
            'start_time' => $request->starttime,
            'schedule_date' => $request->scheduledate,
            'priority' => $request->priority,
            'department_id' => $request->department,
            'is_change_client' => $request->is_change_client??'0',
            'is_quote_work_order' => $request->is_quite_work_order??'0',
            'sales_price' => $request->salesprice,
            'budget' => $request->budget,
            'time_allocated' => $request->timeallocated,
            'invoice_number' => $request->invoicenumber,
            'po_work_bill' => $request->workbill,
            'description' => $request->description,
            'history' => $request->history,
            'internal_communication' => $request->internalnamcommunity,
            'created_by'            =>auth()->user()->id,
            'status' => 1
        ];

        if($request->hasFile('uploadAttachemt')){
            $uploadAttachemt = $request->file('uploadAttachemt');
            $dateFolder = 'workorder/attachemt';
            $workOrder['attachment'] = ImageController::upload($uploadAttachemt,$dateFolder);
        }

        $workId = WorkOrder::create($workOrder);


        $getWorkId = $workId->id;
        $client_work_order = [];
        if($getWorkId){
            if($request->wotaskDescription){
                foreach($request->wotaskDescription as $kk=>$wotaskDescription){
                    $client_work_order[] = [
                        "work_order_id" => $getWorkId,
                        "task_description" => $wotaskDescription,
                        "reference_number" => $request->woreferenceno[$kk],
                        "po_work_bill" => $request->workingBill[$kk],
                        "invoice_number" => $request->woinvoiceNumber[$kk],
                        "sales_price" => $request->wosalesPrice[$kk],
                        "extra_charge" => $request->woextrachange[$kk]
                    ];
                }
            }
            if($client_work_order && !empty($client_work_order)){
                ClientWorkOrder::insert($client_work_order);
            }

            $woComments = [];
            if ($request->comment && !empty($request->comment)) {
                foreach ($request->comment as $kk => $comment) {
                    $create_at = date('Y-m-d H:i:s',strtotime($request->comment_time[$kk]));
                    $woComments[] = [
                        'work_order_id' => $getWorkId,
                        'user_id' => auth()->user()->id,
                        'comment' => $comment,
                        'created_at' => $create_at
                    ];
                }
            }
            if ($woComments && !empty($woComments)) {
                WorkOrderComment::insert($woComments);
            }

            $woCleaner = [];
            if ($request->cleaner_level && !empty($request->cleaner_level)) {
                foreach ($request->cleaner_level as $kk => $cleanerl) {
                    $woCleaner[] = [
                        'work_order_id' => $getWorkId,
                        'cleaner_id' => $cleanerl,
                        'work_hours' => $request->cleaner_hours[$kk],
                        'work_budget' => $request->cleaner_budget[$kk],
                        'date_attendance' => $request->cleaner_dateattendance[$kk]
                    ];
                }
            }
            if ($woCleaner && !empty($woCleaner)) {
                WorkOrderCleaner::insert($woCleaner);
            }


            $woContractor = [];
            if ($request->inputcontractor && !empty($request->inputcontractor)) {
                foreach ($request->inputcontractor as $kk => $inputcontractor) {
                    $woContractor[] = [
                        'work_order_id' => $getWorkId,
                        'contractor_id' => $inputcontractor,
                        'work_hours' => $request->contractorHours[$kk],
                        'work_cost' => $request->contractorCost[$kk],
                        'date_attendance' => $request->dataattendance[$kk]
                    ];
                }
            }
            if ($woContractor && !empty($woContractor)) {
                WorkOrderContractor::insert($woContractor);
            }

            $woEmails = [];
            if ($request->wo_email && !empty($request->wo_email)) {
                foreach ($request->wo_email as $kk => $wo_email) {
                    $woEmails[] = [
                        'work_order_id' => $getWorkId,
                        'email' => $wo_email
                    ];
                }
            }
            if ($woEmails && !empty($woEmails)) {
                WorkOrderEmail::insert($woEmails);
            }
        }

        return redirect()->route('work-order.work-order.index')->with('success','Work order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($workOrder)
    {
        $workOrder = WorkOrder::with(['department','jobtype','subjobtype','portfolio','site','site.state','client'])->whereId($workOrder)->first();

        $client_work_order = ClientWorkOrder::where("work_order_id",$workOrder->id)->get();
        $cleaner_work_order = WorkOrderCleaner::with(['cleaner'])->where("work_order_id",$workOrder->id)->get();
        $contractor_work_order = WorkOrderContractor::with(['contractor'])->where("work_order_id",$workOrder->id)->get();
        $comment_work_order = WorkOrderComment::with(['user'])->where("work_order_id",$workOrder->id)->get();
        $email_work_order = WorkOrderEmail::where("work_order_id",$workOrder->id)->get();
        return view('work-orders.work-order-view',compact('workOrder','client_work_order','cleaner_work_order','contractor_work_order','comment_work_order','email_work_order'));
    }

    public function work_order_view($workOrder){
        $workOrder = WorkOrder::with(['department','jobtype','subjobtype','portfolio','site','site.state','client','createdby','work_order_submit','work_order_submit.work_order_images','assign_cleaner.cleaner','work_order_submit_time'])->whereId($workOrder)->first();
        $beforeImages = $workOrder?->work_order_submit?->work_order_images->where('image_type','before');
        $afterImages = $workOrder?->work_order_submit?->work_order_images->where('image_type','after');
        $assign_cleaners = $workOrder->assign_cleaner;
        $cleaner_buget = $workOrder->assign_cleaner->sum('work_budget');
        $other_docs = OtherDocument::where('data_id',$workOrder->id)->where('type','other-doc')->get();
        $administrative_docs = OtherDocument::where('data_id',$workOrder->id)->where('type','administrative-doc')->get();
        $time_attendance = $workOrder->work_order_submit_time;

        $site_contact = BaseContact::with('user')->where('contact_type','site')->where('data_id',$workOrder->client_site_id)->first();
        return view('work-orders.work-order-cleaner-view',compact('workOrder','site_contact','beforeImages','afterImages','assign_cleaners','time_attendance','cleaner_buget','other_docs','administrative_docs'));
    }

    public function change_status(Request $request,$workOrder){
        $status_change = WorkOrder::where('id',$workOrder)->update(['status'=>$request->status]);
        if($status_change)
        {
            return redirect()->route('work-order.work-order.cleaner.view',['id'=>$workOrder])->with('success','Status Updated Successfully.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkOrder $workOrder)
    {
        
        if(auth()->user()->role == 'admin' || !auth()->user()->is_client){
            $client = Client::where('is_prospect_client','0')->orWhere('id',$workOrder->client_id)->get();
        }else{
            $client = Client::where('client_id',auth()->user()->id)->where('is_prospect_client','0')->get();
        }
        $cleaners = User::where(['role'=>'cleaner'])->get();
        $ticket      = Ticket::with(['getTicketDetail'])->get();
        $portfolio   = ClientPortfolio::whereIn('client_id',$client->pluck('id')->toArray())->get();
        $user        = User::where('role', 'user')->get();
        $departments = Department::where('is_work_order','1')->get();
        $client_portfolios = ClientPortfolio::get();
        // $client_portfolios = ClientPortfolio::get();
        $job_types   = JobType::where('status','active')->get();
        $contractor = Contractor::get();

        $allsites = ClientSite::with(['state','potfolio'])->whereIn('portfolio_id',$client_portfolios->pluck('portfolio_id')->toArray())->get();
        // $allsites = ClientSite::with(['state','potfolio'])->get();
        $client_work_order = ClientWorkOrder::where("work_order_id",$workOrder->id)->get();
        $cleaner_work_order = WorkOrderCleaner::with(['cleaner'])->where("work_order_id",$workOrder->id)->get();
        // dd($cleaner_work_order);
        $contractor_work_order = WorkOrderContractor::with(['contractor'])->where("work_order_id",$workOrder->id)->get();
        $comment_work_order = WorkOrderComment::with(['user'])->where("work_order_id",$workOrder->id)->get();
        $email_work_order = WorkOrderEmail::where("work_order_id",$workOrder->id)->get();

        return view('work-orders.work-order-edit',compact('ticket', 'portfolio', 'user', 'cleaners','departments', 'client', 'job_types', 'client_portfolios', 'contractor','allsites','workOrder','client_work_order','cleaner_work_order','contractor_work_order','comment_work_order','email_work_order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $workOrderId)
    {
        $workOrder = [
            'client_id' => $request->selectCleint,
            'client_portfolio_id' => $request->portfolio,
            'client_site_id' => $request->sitename,
            'job_type_id' => $request->type,
            'job_sub_type_id' => $request->subtype,
            'reference_number' => $request->referenceno,
            'requester' => $request->requester,
            'completion_date' => $request->completionDate,
            'start_time' => $request->starttime,
            'schedule_date' => $request->scheduledate,
            'priority' => $request->priority,
            'department_id' => $request->department,
            'is_change_client' => $request->is_change_client??'0',
            'is_quote_work_order' => $request->is_quite_work_order??'0',
            'sales_price' => $request->salesprice,
            'budget' => $request->budget,
            'time_allocated' => $request->timeallocated,
            'invoice_number' => $request->invoicenumber,
            'po_work_bill' => $request->workbill,
            'description' => $request->description,
            'history' => $request->history,
            'internal_communication' => $request->internalnamcommunity,
            // 'attachment' => $request->uploadAttachemt,
            'status' => $request->workorderStatus
        ];

        if($request->hasFile('uploadAttachemt')){
            $uploadAttachemt = $request->file('uploadAttachemt');
            $dateFolder = 'workorder/attachemt';
            $workOrder['attachment'] = ImageController::upload($uploadAttachemt,$dateFolder);
        }
        WorkOrder::whereId($workOrderId)->update($workOrder);


        $getWorkId = $workOrderId;
        $client_work_order = [];
        if($getWorkId){
            if($request->wotaskDescription){
                foreach($request->wotaskDescription as $kk=>$wotaskDescription){
                    $client_work_order[] = [
                        "work_order_id" => $getWorkId,
                        "task_description" => $wotaskDescription,
                        "reference_number" => $request->woreferenceno[$kk],
                        "po_work_bill" => $request->workingBill[$kk],
                        "invoice_number" => $request->woinvoiceNumber[$kk],
                        "sales_price" => $request->wosalesPrice[$kk],
                        "extra_charge" => $request->woextrachange[$kk]
                    ];
                }
            }
            if($client_work_order && !empty($client_work_order)){
                ClientWorkOrder::insert($client_work_order);
            }

            $woComments = [];
            if ($request->comment && !empty($request->comment)) {
                foreach ($request->comment as $kk => $comment) {
                    $create_at = date('Y-m-d H:i:s',strtotime($request->comment_time[$kk]));
                    $woComments[] = [
                        'work_order_id' => $getWorkId,
                        'user_id' => auth()->user()->id,
                        'comment' => $comment,
                        'created_at' => $create_at
                    ];
                }
            }
            if ($woComments && !empty($woComments)) {
                WorkOrderComment::insert($woComments);
            }

            $woCleaner = [];
            if ($request->cleaner_level && !empty($request->cleaner_level)) {
                foreach ($request->cleaner_level as $kk => $cleanerl) {
                    $woCleaner[] = [
                        'work_order_id' => $getWorkId,
                        'cleaner_id' => $cleanerl,
                        'work_hours' => $request->cleaner_hours[$kk],
                        'work_budget' => $request->cleaner_budget[$kk],
                        'date_attendance' => $request->cleaner_dateattendance[$kk]
                    ];
                }
            }
            if ($woCleaner && !empty($woCleaner)) {
                WorkOrderCleaner::insert($woCleaner);
            }


            $woContractor = [];
            if ($request->inputcontractor && !empty($request->inputcontractor)) {
                foreach ($request->inputcontractor as $kk => $inputcontractor) {
                    $woContractor[] = [
                        'work_order_id' => $getWorkId,
                        'contractor_id' => $inputcontractor,
                        'work_hours' => $request->contractorHours[$kk],
                        'work_cost' => $request->contractorCost[$kk],
                        'date_attendance' => $request->dataattendance[$kk]
                    ];
                }
            }
            if ($woContractor && !empty($woContractor)) {
                WorkOrderContractor::insert($woContractor);
            }

            $woEmails = [];
            if ($request->wo_email && !empty($request->wo_email)) {
                foreach ($request->wo_email as $kk => $wo_email) {
                    $woEmails[] = [
                        'work_order_id' => $getWorkId,
                        'email' => $wo_email
                    ];
                }
            }
            if ($woEmails && !empty($woEmails)) {
                WorkOrderEmail::insert($woEmails);
            }
        }

        return redirect()->route('work-order.work-order.index')->with('success','Work order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkOrder $workOrder)
    {
        //
    }

    function validationData($request, $userData = null)
    {
        $validData = null;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'dateofbirth' => 'nullable|date',
            'phone_number' => 'required|min:10|max:15',
            'second_number' => 'nullable|min:10|max:15',
            'country' => 'nullable',
            'tfn' => 'nullable',
            'abn' => 'nullable',
            'notes' => 'nullable'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'basic_info');
            $validData = $validator->errors();
            return $validData;
        }

        $validator = Validator::make($request->all(), [
            'unit' => 'nullable',
            'address_number' => 'required|array',
            'address_number.*' => 'required',
            'street_address' => 'required|array',
            'street_address.*' => 'required',
            'suburb' => 'required|array',
            'suburb.*' => 'required',
            'city' => 'nullable',
            'state' => 'nullable',
            'zipcode' => 'required|array',
            'zipcode.*' => 'required',
            'po_box' => 'nullable',
            'is_this_main_address' => 'nullable',
            'is_this_mail_address' => 'nullable',
            'imported_address' => 'required|array',
            'imported_address.*' => 'required'
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
            'contractor' => 'nullable'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'contractor');
            $validData = $validator->errors();
            return $validData;
        }

        $validator = Validator::make($request->all(), [
            'contractor' => 'nullable'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'departments');
            $validData = $validator->errors();
            return $validData;
        }


        $validator = Validator::make($request->all(), [
            'document_type' => 'nullable',
            'reference_number' => 'nullable',
            'expireDate' => 'nullable',
            'documentImages' => 'nullable'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'document');
            $validData = $validator->errors();
        }

        if (!$userData) {
            $validator = Validator::make($request->all(), [
                'team_player_role' => 'nullable',
                'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'nullable|min:6',
                'is_multipal_shift' => 'nullable'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'team_player_role' => 'nullable',
                'password' => 'nullable|min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'nullable|min:6',
                'is_multipal_shift' => 'nullable'
            ]);
        }
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'access');
            $validData = $validator->errors();
        }

        $validator = Validator::make($request->all(), [
            'request_document_type' => 'nullable'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'request-document');
            $validData = $validator->errors();
            return $validData;
        }

        if ($userData && $userData->email != $request->email && $userData->email == $request->team_player_role) {
            if (User::where(['email' => $request->email, 'role' => $request->team_player_role])->exists()) {
                $validator->errors()->add('email', 'Email Already Exists.');
                $validData = $validator->errors();
                return $validData;
            }
        } elseif (!$userData && User::where(['email' => $request->email, 'role' => $request->team_player_role])->exists()) {
            $validator->errors()->add('email', 'Email Already Exists --.');
            $validData = $validator->errors();
            return $validData;
        }
        return $validData;
    }


    public function uploadBeforeAfterImage(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'before_image' => 'nullable|image',
            'after_image' => 'nullable|image',
        ]);
        if ($validator->fails()) {
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 422);
        }

        $dateFolder = 'work-order/'.now()->format('Y_m_d');

        $shiftImages = null;
        if($request->hasFile('before_image')){
            foreach($request->file('before_image') as $before_image){
                $before_image_imageupload = ImageController::upload($before_image,$dateFolder);
                $shiftImages[] = ['image_tbl'=>'work-order','shift_submission_id'=>$id,'image_type'=>'before','shift_images'=>$before_image_imageupload];
            }
        }
        if($request->hasFile('after_image')){
            foreach($request->file('after_image') as $after_image){
                $after_image_imageupload = ImageController::upload($after_image,$dateFolder);
                $shiftImages[] = ['image_tbl'=>'work-order','shift_submission_id'=>$id,'image_type'=>'after','shift_images'=>$after_image_imageupload];
            }
        }
         if($shiftImages) ClientSiteShiftCleanerImage::insert($shiftImages);
         if($shiftImages){
            return redirect()->back()->with('success','Images Uploaded Successfully!');
         }

    }

    public function uploadOtherDoc(Request $request , $id){
        // dd($request->file('other_doc'));
        $dateFolder = 'work-order/other-doc/'.now()->format('Y_m_d');

        $before_image_imageupload = ImageController::upload($request->file('other_doc'),$dateFolder);
        $other_doc = ['type'=>'other-doc','data_id'=>$id,'document'=>$before_image_imageupload];

        if($other_doc) OtherDocument::insert($other_doc);
         if($other_doc){
            return redirect()->back()->with('success','Document Uploaded Successfully!');
         }
    }

    public function administrativeDoc(Request $request , $id){
        // dd($request->file('other_doc'));
        $dateFolder = 'work-order/other-doc/'.now()->format('Y_m_d');

        $other_doc = null;

        if($request->hasFile('administrative_doc')){
            $before_image_imageupload = ImageController::upload($request->file('administrative_doc'),$dateFolder);
            $other_doc = ['type'=>'administrative-doc','data_id'=>$id,'document'=>$before_image_imageupload];
        }

        if($other_doc) OtherDocument::insert($other_doc);
         if($other_doc){
            return redirect()->back()->with('success','Document Uploaded Successfully!');
         }
    }

    public function unique_check(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(WorkOrder::where($request->colname, urldecode($request->colvalue))->exists()){
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
