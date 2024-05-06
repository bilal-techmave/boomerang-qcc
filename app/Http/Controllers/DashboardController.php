<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Common\ImageController;
use App\Models\ItDashboard;
use App\Models\Ticket;
use App\Models\WorkOrder;
use App\Models\WorkOrderSubmission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->check()) return redirect()->route('login');

        // WorkOrder By Status Graph Data
        $WorkOrderStatus = ['To Schedule', 'Schedule', 'On hold', 'In progress', 'Completed', 'To invoice'];
        $statuses = WorkOrder::groupBy('status')->whereIn('status',$WorkOrderStatus)->selectRaw('status, count(*) as count')->get();
        // Initialize data array with zeros
        $workcount = [
            'labels' => $WorkOrderStatus,
            'data' => array_fill(0, count($WorkOrderStatus), 0),
        ];

        // Update data with count if the status exists in the result
        foreach ($statuses as $status) {
            $index = array_search($status->status, $WorkOrderStatus);
            if ($index !== false) {
                $workcount['data'][$index] = ($status->count > 0) ? $status->count : 0;
            }
        }

        //Ticket By Status Graph Data
        $TicketStatus = ['Open', 'In progress', 'Solved'];
        $tickets = Ticket::groupBy('status')->whereIn('status',$TicketStatus)->selectRaw('status, count(*) as count')->get();
        // Initialize data array with zeros
        $ticket_count = [
            'labels' => $TicketStatus,
            'data' => array_fill(0, count($TicketStatus), 0),
        ];

        // Update data with count if the status exists in the result
        foreach ($tickets as $ticket) {
            $index = array_search($ticket->status, $TicketStatus);
            if ($index !== false) {
                $ticket_count['data'][$index] = ($ticket->count > 0) ? $ticket->count : 0;
            }
        }

        //Ticket By Person Graph Data


        $tickets_user = Ticket::with(['getUser'])->has('getUser')->groupBy('user_id')->selectRaw('user_id, count(*) as count')
        ->get();
        // Initialize data array with zeros
        $ticket_count_user = [
              // Generate labels and data dynamically
                'labels' => $tickets_user->pluck('getUser.name')->toArray(),
                'data' => $tickets_user->pluck('count')->toArray(),

        ];
        // dd($workcount,$ticket_count,$ticket_count_user);
        return view('welcome',compact('workcount','ticket_count','ticket_count_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function itDashboard()
    {
        $Form = ItDashboard::where('type', 'Forms')->orderBy('id','DESC')->get();
        $Training = ItDashboard::where('type', 'Traning')->orderBy('id','DESC')->get();
        $Refresh = ItDashboard::where('type', 'Refresh')->orderBy('id','DESC')->get();
        return view('pages.it-dashboard',['forms'=>$Form,'tranings'=>$Training,'refreshs'=>$Refresh]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function itStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'doc_file' => 'file',
        ]);
        $dataupload = [
            "name" => $request->name,
            "type" => $request->type,
            "uploaded_by" => Auth::id(),
        ];
        if ($request->hasFile('doc_file')) {
            $image = $request->file('doc_file');
            $dateFolder = 'IT_Dashboard/' . now()->format('Y_m_d');
            $imageupload = ImageController::upload($image, $dateFolder);
            $dataupload['doc_file'] = $imageupload;
        }
        $data = ItDashboard::create($dataupload);
        if($data){
            return redirect()->back()->with('message','Data saved successfully');
        }

    }
    /**
     * Display the specified resource.
     */

    public function itDestroy($id)
    {
        $data = ItDashboard::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        // Delete the data
        $data->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }


    public function show(string $id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }

}
