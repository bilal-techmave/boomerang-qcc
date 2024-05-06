<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientPortfolio;
use App\Models\ClientSite;
use App\Models\ClientSiteShift;
use App\Models\ClientSiteShiftCleanerSubmissions;
use App\Models\Department;
use App\Models\GeoCity;
use App\Models\GeoState;
use App\Models\User;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:invoice-view')->only(['invoiceRunner','invoiceRunner_view']);
        $this->middleware('role:time-attendance-view')->only(['timeAttendance', 'timeAttendance_view']);
    }
    /**
     * Show the Time attendance Report.
     */
    public function timeAttendance(Request $request){
        $cities         = GeoCity::get();
        $states         = GeoState::get();

        if(auth()->user()->is_client){
            $clients = Client::where('client_id',auth()->user()->id)->get();
            $allSites = ClientSite::whereIn('client_id',$clients)->get();
            $cleaners = ClientSiteShift::whereIn('client_site_id',$allSites->pluck('id')->toArray())->get();
        }else{
            $clients = Client::get();
            $allSites = ClientSite::get();
            $cleaners       = User::where('role', 'cleaner')->where('status','1')->get();
        }

        // $portfolios     = ClientPortfolio::get();
        $portfolios   = ClientPortfolio::whereIn('client_id',$clients->pluck('id')->toArray())->get();
       
        
        $users          = User::whereIn('role', ['person', 'staff'])->get();
        $sites          = ClientSite::whereIn('id',$allSites->pluck('id')->toArray())->get();


        // Filter Value Start From Here
        $client_id                  =  $request->input('client_id');
        $portfolio_id               =  $request->input('portfolio_id');
        $site_id                    =  $request->input('site_id');
        $cleaner_id                 =  $request->input('cleaner_id');
        $city_id                    =  $request->input('city_id');
        $state_id                   =  $request->input('state_id');
        $approved_by                =  $request->input('approved_by');
        $start_form                 =  $request->input('start_form');
        $finish_form                =  $request->input('finish_form');
        $approved_from              =  $request->input('approved_from');
        $approved_to                =  $request->input('approved_to');

        $client_city_id = $city_id ? ClientSite::where('geo_city_id',$city_id)->get()->pluck('id') : null;
        $client_state_id = $state_id ?  ClientSite::where('geo_state_id',$state_id)->get()->pluck('id') : null;
        $client_portfolio_id = $portfolio_id ? ClientSite::where('portfolio_id',$portfolio_id)->get()->pluck('id') : null;
        
        $client_ids  = $client_id ? ClientSite::where('client_id',$client_id)->get()->pluck('id') : null;

        $timeAttendance = DB::table('client_site_shift_cleaner_submissions')
        ->select('client_site_shift_cleaner_submissions.*','client_site_shifts.avaliable_start_time','client_site_shifts.avaliable_end_time','client_site_shifts.total_hours','client_site_shifts.hourly_rate','clients.business_name','client_portfolios.full_name','client_sites.reference','client_sites.distance_gps','cleaner.name AS cname')
        ->join('client_site_shifts', 'client_site_shifts.id', '=', 'client_site_shift_cleaner_submissions.client_site_shift_id')
        ->leftJoin('client_sites', 'client_sites.id', '=', 'client_site_shift_cleaner_submissions.client_site_id')
        ->leftJoin('client_portfolios', 'client_portfolios.id', '=', 'client_sites.portfolio_id')
        ->leftJoin('clients', 'clients.id', '=', 'client_sites.client_id')
        ->leftJoin('users as cleaner', 'cleaner.id', '=', 'client_site_shift_cleaner_submissions.cleaner_id')
        ->leftJoin('users as approved_user', 'approved_user.id', '=', 'client_site_shift_cleaner_submissions.approved_by')
        ->when($site_id, function($query) use ($site_id) {
            return $query->where('client_site_shift_cleaner_submissions.client_site_id', $site_id);
        })
        ->when(auth()->user()->is_client, function($query) use ($allSites) {
            return $query->whereIn('client_site_shift_cleaner_submissions.client_site_id', $allSites->pluck('id')->toArray());
        })
        ->when($client_ids, function($query) use ($client_ids) {
            return $query->whereIn('client_site_shift_cleaner_submissions.client_site_id', $client_ids);
        })
        ->when($client_portfolio_id, function($query) use ($client_portfolio_id) {
            return $query->whereIn('client_site_shift_cleaner_submissions.client_site_id', $client_portfolio_id);
        })
        ->when($client_city_id, function($query) use ($client_city_id) {
            return $query->whereIn('client_site_shift_cleaner_submissions.client_site_id', $client_city_id);
        })
        ->when($client_state_id, function($query) use ($client_state_id) {
            return $query->whereIn('client_site_shift_cleaner_submissions.client_site_id', $client_state_id);
        })
        ->when($cleaner_id, function($query) use ($cleaner_id) {
            return $query->where('client_site_shift_cleaner_submissions.cleaner_id', $cleaner_id);
        })
        ->when($approved_by, function($query) use ($approved_by) {
            return $query->where('client_site_shift_cleaner_submissions.approved_by', $approved_by);
        })
        ->when($start_form, function($query) use ($start_form) {
            return $query->whereDate('client_site_shift_cleaner_submissions.shift_start', '>=', $start_form);
        })
        ->when($finish_form, function($query) use ($finish_form) {
            return $query->whereDate('client_site_shift_cleaner_submissions.shift_end', '<=', $finish_form);
        })
        ->when($approved_from, function($query) use ($approved_from) {
            return $query->whereDate('client_site_shift_cleaner_submissions.approval_date', '>=', $approved_from);
        })
        ->when($approved_to, function($query) use ($approved_to) {
            return $query->whereDate('client_site_shift_cleaner_submissions.approval_date', '<=', $approved_to);
        })
        ->whereNotIn('client_site_shift_cleaner_submissions.status', ['pending', 'started'])
        ->orderByDesc('client_site_shift_cleaner_submissions.id')
        ->get();


        return view('reports.time-attandance',compact('timeAttendance','cities','states','portfolios','clients','cleaners','sites','users'));
    }

    public function timeAttendance_view(Request $request, $id){
        $attendance = ClientSiteShiftCleanerSubmissions::with(['clientsiteshift','cleaner','site','site.potfolio','site.client'])->where('id',$id)->first();
        $question01 = trim(str_replace('\\','',$attendance->shift_data),'"');
        $question = json_decode($question01);
        $beforeImages = $attendance?->shift_image->where('image_type','before');
        $afterImages = $attendance?->shift_image->where('image_type','after');
        // dd($question,$attendance->shift_data);
        return view('reports.time-attandance-view',compact('attendance','question','beforeImages','afterImages'));
    }

    public function invoiceRunner(Request $request){
        $invoice_runners = WorkOrder::with(['department','site','site.state','site.city','client','portfolio','portfolio.manager','jobtype'])->where('status','To Invoice');
        $comp_date_start        =  $request->input('req_comp_date_start');
        $comp_date_finish       =  $request->input('req_comp_date_finish');
       
        if($comp_date_start ){
            $invoice_runners->whereDate('completion_date','>=',$comp_date_start);
        }

        if($comp_date_finish ){
            $invoice_runners->whereDate('completion_date','<=',$comp_date_finish);
        }

        $invoice_runners = $invoice_runners->orderBy('id','DESC')->get();
        return view('reports.invoice-runner',compact('invoice_runners'));
    }


    public function invoiceRunner_view(Request $request, $id){
        $attendance = ClientSiteShiftCleanerSubmissions::with(['clientsiteshift','cleaner','site','site.potfolio','site.client'])->where('id',$id)->first();
        $question01 = trim(str_replace('\\','',$attendance->shift_data),'"');
        $question = json_decode($question01);
        $beforeImages = $attendance?->shift_image->where('image_type','before');
        $afterImages = $attendance?->shift_image->where('image_type','after');
        // dd($question,$attendance->shift_data);
        return view('reports.time-attandance-view',compact('attendance','question','beforeImages','afterImages'));
    }


    public function kpiQccQh(){
        return view('reports.kpi-qcc-qh');
    }


    public function portfolioSite(){
        return view('reports.portfolio-site-summary');
    }

    public function clientCleaner(){
        return view('reports.client-cleaners-summary');
    }
}
