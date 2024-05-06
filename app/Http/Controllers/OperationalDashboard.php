<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientPortfolio;
use App\Models\ClientSite;
use App\Models\ClientSiteShift;
use App\Models\ClientSiteShiftCleanerSubmissions;
use App\Models\GeoCity;
use App\Models\GeoState;
use App\Models\MissedClean;
use App\Models\User;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationalDashboard extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:approval-board-approve')->only(['approvalBoardChangeStatus']);
        $this->middleware('role:approval-board-deny')->only(['approvalBoardChangeStatus']);
        $this->middleware('role:approval-board-view')->only(['portfolioStracture']);

    }

    public function workOrderDashboard()
    {
        // WorkOrder By Status Graph Data
        $po_req = WorkOrder::with(['portfolio'])->has('portfolio')->groupBy('client_portfolio_id')->where('status','PO Required')->selectRaw('client_portfolio_id, count(*) as count')->get();
        // Initialize data array with zeros

            $po_required = [
                'labels' => $po_req->pluck('portfolio.manager.name')->toArray(),
                'data' => $po_req->pluck('count')->toArray(),
            ];

        $to_sch = WorkOrder::with(['portfolio'])->has('portfolio')->groupBy('client_portfolio_id')->where('status','To Schedule')->selectRaw('client_portfolio_id, count(*) as count')->get();
        // Initialize data array with zeros

            $to_schedule = [
                'labels' => $to_sch->pluck('portfolio.manager.name')->toArray(),
                'data' => $to_sch->pluck('count')->toArray(),
            ];

        $sch = WorkOrder::with(['portfolio'])->has('portfolio')->groupBy('client_portfolio_id')->where('status','Scheduled')->selectRaw('client_portfolio_id, count(*) as count')->get();
        // Initialize data array with zeros
        // dd($sch);

            $schedule = [
                'labels' => $sch->pluck('portfolio.manager.name')->toArray(),
                'data' => $sch->pluck('count')->toArray(),
            ];

        $comp = WorkOrder::with(['portfolio'])->has('portfolio')->groupBy('client_portfolio_id')->where('status','Completed')->selectRaw('client_portfolio_id, count(*) as count')->get();
        // Initialize data array with zeros

            $complete = [
                'labels' => $comp->pluck('portfolio.manager.name')->toArray(),
                'data' => $comp->pluck('count')->toArray(),
            ];

            // dd($po_required,$to_schedule,$schedule,$complete);

        return view('dashboard.operational.work-order-dashboard',compact('po_required','to_schedule','schedule','complete'));
    }

    public function portfolioStracture()
    {
        $portfolio_managers_data = User::with(['portfolio_managers','portfolio_managers.siteprotfolios'])->has('portfolio_managers')->get();
        return view('dashboard.operational.portfolio-structure',compact('portfolio_managers_data'));
    }

    public function missedClean(Request $request)
    {
        $missedClean = DB::table('missed_cleans')
        ->leftJoin('client_sites', 'missed_cleans.site_id', '=', 'client_sites.id')
        ->leftJoin('client_portfolios', 'client_sites.portfolio_id', '=', 'client_portfolios.id')
        ->leftJoin('users', 'client_portfolios.manager_id', '=', 'users.id')
        ->leftJoin('clients', 'client_sites.client_id', '=', 'clients.id')
        ->leftJoin('geo_states', 'client_sites.geo_state_id', '=', 'geo_states.id')
        ->leftJoin('client_site_shifts', 'missed_cleans.client_site_shift_id', '=', 'client_site_shifts.id')
        ->leftJoin('users as cleaner', 'client_site_shifts.cleaner_id', '=', 'cleaner.id')
        ->where(function($query) use ($request) {
            if($request->client){
                $query->where('clients.id', $request->client);
            }
            if($request->portfolio){
                $query->where('client_portfolios.id', $request->portfolio);
            }
            if($request->site){
                $query->where('client_sites.id', $request->site);
            }
            if($request->manager){
                $query->where('users.id', $request->manager);
            }
        })
        ->when($request->date_from, function($query, $date_from) {
            return $query->whereDate('missed_cleans.date_missed', '>=', $date_from);
        })
        ->when($request->date_to, function($query, $date_to) {
            return $query->whereDate('missed_cleans.date_missed', '<=', $date_to);
        })
        ->orderBy('missed_cleans.id', 'DESC')->select('clients.business_name','client_portfolios.full_name','users.name','client_sites.reference','geo_states.state_name','client_site_shifts.avaliable_start_time','client_site_shifts.avaliable_end_time','missed_cleans.*','cleaner.name AS cleaner_fname','cleaner.surname AS AS cleaner_sname')
        ->get();


        $client_portfolios   = ClientPortfolio::get();
        $clients      = Client::get();
        $clientSite  = ClientSite::get();
        $portfolioManagers  = User::whereHas('portfolio_manager')->get();
        
        return view('dashboard.operational.missed-clean',compact('client_portfolios','clients','clientSite','portfolioManagers','missedClean'));
    }

    public function approvalBoard(Request $request)
    {
        $query = ClientSiteShiftCleanerSubmissions::with(['clientsiteshift','cleaner','site','site.potfolio','site.client'])->where(['is_approval_boards'=>'1','status'=>'under analysis'])->orderBy('id','DESC');

        // dd($query->get());
        //Filter Section From
        $cities             = GeoCity::get();
        $states             = GeoState::get();
        $clients            = Client::get();
        $portfolios         = ClientPortfolio::get();
        $sites              = ClientSite::get();
        $cleaners           = User::where('role', 'cleaner')->where('status','1')->get();

        $client_id          = $request->input('client_id');
        $protfolio_id       = $request->input('protfolio_id');
        $site_id            = $request->input('site_id');
        $cleaner_id         = $request->input('cleaner_id');
        $city_id            =  $request->input('city_id');
        $state_id           =  $request->input('state_id');


        $client_selected_id = [];
        if ($site_id) {
            array_push($client_selected_id,$site_id);
        }
        if ($cleaner_id) {
            $query->where('cleaner_id', $cleaner_id);
        }
        if ($client_id) {
            $client_site = ClientSite::where('client_id',$client_id)->first()->id;
            array_push($client_selected_id,$client_site);
        }
        if ($protfolio_id) {
            $client_portfolio = ClientSite::where('portfolio_id',$protfolio_id)->first()->id;
            array_push($client_selected_id,$client_portfolio->toArray());
        }
        if ($city_id) {
            $client_city_id = ClientSite::where('geo_city_id',$city_id)->get()->pluck('id');
            array_merge($client_selected_id,$client_city_id->toArray());
        }
        if ($state_id) {
            $client_state_id = ClientSite::where('geo_state_id',$state_id)->get()->pluck('id');
            array_merge($client_selected_id,$client_state_id->toArray());
        }
        if($client_selected_id && !empty($client_selected_id))  $query->whereIn('client_site_id', array_unique($client_selected_id));
        $submissions = $query->get();
        // dd($submissions);
        // filter Section End

        return view('dashboard.operational.approval-board',compact('submissions','cities','states','clients','portfolios','cleaners','sites'));
    }

    public function approvalBoardView($id){
        $approvalboard = ClientSiteShiftCleanerSubmissions::with(['clientsiteshift','cleaner','site','site.potfolio','site.client'])->where('id',$id)->first();
        $question01 = trim(str_replace('\\','',$approvalboard->shift_data),'"');
        $question = json_decode($question01);
        return view('dashboard.operational.approval-view',compact('approvalboard','question'));;
    }

    public function approvalBoardChangeStatus(Request $request){
        
        if($request->id !=""){
            $id = explode(',',$request->id);
        }else{
            $id = [];
        }
        $status = $request->status;
        $description = $request->description;
        // print_r($id);die;
        if(count($id) < 0){
            return '0';
        }
        elseif(count($id) > 0){
            $change = ClientSiteShiftCleanerSubmissions::whereIn('id',$id)->update(['approval_board_reason'=>$description,'approval_date'=>date('Y-m-d h:s:i'),'approved_by'=>auth()->user()->id,'status'=>$status]);
            if($change){
                return '1';
            }
            else{
                return '0';
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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
    public function destroy(string $id)
    {
        //
    }
}
