<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketImage;
use App\Models\ClientPortfolio;
use App\Models\User;
use App\Models\Client;
use App\Models\JobType;
use App\Models\Department;
use App\Http\Controllers\Common\ImageController;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\AssignedTicket;
use App\Models\ClientSite;
use App\Models\GeoCity;
use App\Models\GeoState;
use App\Models\TicketActivity;
use App\Models\TicketReply;
use Illuminate\Http\Request;


class TicketController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:ticket-view')->only(['index', 'show','ticket_view']);
        $this->middleware('role:ticket-create')->only(['create', 'store']);
        $this->middleware('role:ticket-assign')->only(['assign_ticket']);
        $this->middleware('role:ticket-reply')->only(['reply_ticket']);
        $this->middleware('role:ticket-slove,ticket-close,ticket-reopen')->only(['change_status']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $assined     = Ticket::get()->pluck('user_id');
        $client      = Client::get();
        $portfolio   = ClientPortfolio::get();
        $clientSite  = ClientSite::get();
        $user        = User::whereIn('role', ['person', 'staff'])->get();
        $departments = Department::get();
        $job_types   = JobType::get();
        $creator     = User::whereIn('id', $assined)->get();
        $responsible = User::whereIn('id',$assined)->get();


        $client_id = $request->input('client_id');
        $protfolio_id = $request->input('protfolio_id');
        $site_id = $request->input('site_id');
        $type_id = $request->input('type_id');
        $priority_id = $request->input('priority_id');
        $responsible_id = $request->input('responsible_id');
        $department_id = $request->input('department_id');
        $creator_id = $request->input('creator_id');
        $ticket_participant_id = $request->input('ticket_participant_id');
        $reference_number = $request->input('reference_number');
        $ticket_status = $request->input('status');
        $ticket_number = $request->input('ticket_number');

        $creation_date_froms = $request->input('creation_date_from');
        $creation_date_tos = $request->input('creation_date_to');
        if($creation_date_froms){
            $creation_date_from = date('Y-m-d H:i:s',strtotime($creation_date_froms));
        }
        if($creation_date_tos){
            $creation_date_to = date('Y-m-d H:i:s',strtotime($creation_date_tos));
        }
        $due_date_from = $request->input('due_date_from');
        $due_date_to = $request->input('due_date_to');

        $query = Ticket::with(['getUser'])->orderBy('id', 'DESC');

        if ($client_id) {
             $query->where('client_id', $client_id);
        }
        if ($protfolio_id) {
             $query->where('portfolio_id', $protfolio_id);
        }
        if ($site_id) {
             $query->where('client_site_id', $site_id);
        }
        if ($type_id) {
             $query->where('type', $type_id);
        }
        if ($priority_id) {
             $query->where('priority', $priority_id);
        }
        if ($responsible_id) {
             $query->where('user_id', $responsible_id);
        }

        if ($ticket_participant_id) {
             $query->where('user_id', $ticket_participant_id);
        }
        if ($department_id) {
             $query->where('department_id', $department_id);
        }
        if ($ticket_participant_id) {
             $query->where('user_id', $ticket_participant_id);
        }
        if ($reference_number) {
             $query->where('reference_number', $reference_number);
        }
        if ($reference_number) {
             $query->where('reference_number', $reference_number);
        }
        if ($ticket_status) {
             $query->whereIn('status', $ticket_status);
        }

        if($creation_date_froms ){
           $query=  $query->whereDate('created_at','>=',$creation_date_from);
        }
        if($creation_date_tos ){
             $query->whereDate('created_at','<=',$creation_date_to);
        }

        if($due_date_from ){
            $query->whereDate('due_date_to','>=',$due_date_from);
        }
        if($due_date_to ){
             $query->whereDate('due_date_to','<=',$due_date_to);
        }

        if ($creator_id) {
            $query->where('user_id', $creator_id);
        }

        $ticket = $query->get();

        return view('tickets.tickets', compact('ticket', 'portfolio', 'user', 'departments', 'clientSite', 'client', 'job_types', 'client_id', 'protfolio_id', 'site_id', 'type_id', 'priority_id', 'responsible_id', 'department_id', 'ticket_participant_id', 'reference_number', 'ticket_status', 'creator','responsible'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $ticket      = Ticket::with(['getTicketDetail'])->get();
        $portfolio   = ClientPortfolio::where('status','1')->get();
        $user        = User::whereIn('role', ['person', 'staff'])->where('status','1')->get();
        $departments = Department::where('status','1')->get();
        $client      = Client::where('is_prospect_client', '0')->where('status','1')->get();
        $job_types   = JobType::get();
        $allsites = ClientSite::with(['state', 'potfolio'])->where('status','1')->get();
        return view('tickets.tickets-add', compact('ticket', 'portfolio', 'user', 'departments', 'client', 'job_types', 'allsites'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $tktid = Ticket::orderBy('id', 'DESC')->first()->id ?? 1;
        $ticketId = rand('000', '9999');
        $field = $request->except('_token');
        $field['ticket_id'] = 'TKT' . $ticketId . $tktid . '';
        $field['user_id']   = $request->user_id ?? auth()->user()->id;
        $field['created_by'] = auth()->user()->id;
        $ticket = Ticket::create($field);


        if($request->hasFile('ticketFile')){
            $attachmentCount = $request->file('ticketFile');
            for ($i = 0; $i < count($attachmentCount); $i++) {
                $uploadAttachment = $request->file('ticketFile')[$i] ?? null;
                $dateFolder = 'ticket' . '/' . now()->format('Y_m_d');
                $uploadAttachmentImage = ImageController::upload($uploadAttachment, $dateFolder);
                $ticketImage = [
                    'ticket_id' => $ticket->id,
                    'ticket_img' => $uploadAttachmentImage
                ];
                TicketImage::whereId($ticket->id)->insert($ticketImage);
            }
        }

        return redirect()->route('admin.ticket.index')->with('success','Ticket Created Successfully.');
        // return redirect()->route('admin.ticket.index');
    }

    /**
     * Display the specified resource.
     */
    public function ticket_view(Request $request, $id)
    {
        $ticekt = Ticket::with(['getUser','site'])->whereId($id)->first();
        $ticketImage = TicketImage::where('ticket_id', $id)->get();
        $tecketReply = TicketReply::with('getUser')->where('ticket_id',$id)->get();
        $responsible = User::whereIn('role',['staff','person'])->get();
        $departments = Department::get();
        $ticket_activity   = TicketActivity::with(['getUser','getAssignedBy','department','reply'])->where('ticket_id',$id)->get();
        // dd($ticket_activity);
        return view('tickets.tickets-view', compact('ticekt', 'ticketImage','tecketReply','responsible','ticket_activity','departments'));
    }

    public function delete_document(Request $request)
    {
        $ticket_id = $request->input('ticket_id');
        return  TicketImage::where('id', $ticket_id)->delete();
    }

    public function assign_ticket(Request $request, $ticket_id)
    {
        $type = $request->input('type');
        $status = Ticket::where('id',$ticket_id)->first()->status;
        if($type == '1'){
            // $ticket_id = $request->input('ticket_id');
            return TicketActivity::create([
                'ticket_id'     =>   $ticket_id,
                'user_id'       =>   auth()->user()->id,
                'assigned_by'   =>   auth()->user()->id,
                'status'        =>   'Assign',
            ]);
        }
        elseif($type == '2'){
            $department_id = $request->input('department_id');
            $user_id = $request->input('user_id');
            $assign = TicketActivity::create([
                'ticket_id'     =>   $ticket_id,
                'user_id'       =>   $user_id,
                'department_id' =>   $department_id,
                'assigned_by'   =>   auth()->user()->id,
                'status'        =>   'Assign',
            ]);
            if($assign){
                return redirect()->route('ticket.view', ['id' => $ticket_id])->with('success','Ticket Assigned Successfully!');
            }
        }

    }

    public function reply_ticket(Request $request , $ticket_id)
    {
        $ticket_reply = TicketReply::create([
            'ticket_id'     =>  $ticket_id,
            'user_id'       =>  auth()->user()->id,
            'message'       =>  $request->message,
        ]);

        if($ticket_reply){
            $assign = TicketActivity::create([
                'ticket_id'     =>   $ticket_id,
                'reply_from'    =>   auth()->user()->id,
                'assigned_by'   =>   auth()->user()->id,
                'status'        =>   'Reply',
            ]);
            return redirect()->route('ticket.view', ['id' => $ticket_id])->with('success','Ticket Reply Submited Successfully.');
        }

    }

    public function change_status(Request $request , $ticket_id)
    {
        $ticket_status = Ticket::where('id',$ticket_id)->update(['status'=>$request->status]);

        if($ticket_status){
            $assign = TicketActivity::create([
                'ticket_id'     =>   $ticket_id,
                'assigned_by'   =>   auth()->user()->id,
                'status'        =>   $request->status,
            ]);
            return redirect()->route('ticket.view', ['id' => $ticket_id])->with('success','Ticket Status Updated Successfully.');
        }

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
