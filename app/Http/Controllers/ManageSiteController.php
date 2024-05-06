<?php

namespace App\Http\Controllers;

use App\Models\BaseContact;
use App\Models\Client;
use App\Models\ClientPortfolio;
use App\Models\ClientSite;
use App\Models\ClientSiteCleanerRequest;
use App\Models\ClientSiteMonetization;
use App\Models\ClientSiteShift;
use App\Models\ClientSiteShiftCleanerSubmissions;
use App\Models\ClientSiteShiftsDay;
use App\Models\ClientSiteShiftsReceivable;
use App\Models\Comment;
use App\Models\ClientPortfolioSite;
use App\Models\Contractor;
use App\Models\GeoCity;
use App\Models\GeoState;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\MonetizationService;
use Illuminate\Support\Facades\DB;
use QrCode;

class ManageSiteController extends Controller
{

    protected $monetizationService;
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:site-view')->only(['index', 'show']);
        $this->middleware('role:site-create')->only(['create', 'store']);
        $this->middleware('role:site-edit')->only(['edit', 'update']);

        $this->monetizationService = new MonetizationService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        $supervisors = User::where('role', 'staff')->get();
        $cities = GeoCity::get();
        $states = GeoState::get();

        
        

        if(auth()->user()->role == 'admin' && !auth()->user()->is_client){
            $client_portfolios = ClientPortfolio::get();
            $clients = Client::orderBy('id', 'DESC')->get();
        }else{
            $clients = Client::where('client_id',auth()->user()->id)->orderBy('id', 'DESC')->get();
            $client_portfolios = ClientPortfolio::where('client_id',auth()->user()->id)->get();
        }

        $client       =  $request->input('client');
        $portfolio    =  $request->input('portfolio');
        $cleaner      =  $request->input('cleaner');
        $building     =  $request->input('building');
        $supervisor   =  $request->input('supervisor');
        $state        =  $request->input('state');
        $city         =  $request->input('city');
        $regular_Site =  $request->input('regular_Site');


        // $sites_data = ClientSite::with(['client', 'potfolio']);
        $sites_data = DB::table('client_sites')
        ->select('client_sites.*','client_portfolios.full_name','clients.business_name')
        ->leftJoin('clients', 'client_sites.client_id', '=', 'clients.id')
        ->leftJoin('client_portfolios', 'client_sites.portfolio_id', '=', 'client_portfolios.id')
        ->when($clients && !$clients->isEmpty(), function ($query) use ($clients) {
            $query->whereIn('client_sites.client_id', $clients->pluck('id')->toArray());
        })
        ->when($client, function ($query) use ($client) {
            $query->where('client_sites.client_id', $client);
        })
        ->when($portfolio, function ($query) use ($portfolio) {
            $query->where('client_sites.portfolio_id', $portfolio);
        })
        ->when($building, function ($query) use ($building) {
            $query->where('client_sites.reference', $building);
        })
        ->when($supervisor, function ($query) use ($supervisor) {
            $query->where('client_sites.supervisor_id', $supervisor);
        })
        ->when($state, function ($query) use ($state) {
            $query->where('client_sites.geo_state_id', $state);
        })
        ->when($city, function ($query) use ($city) {
            $query->where('client_sites.geo_city_id', $city);
        })
        ->when($regular_Site, function ($query) use ($regular_Site) {
            $query->where('client_sites.is_regular_site', $regular_Site);
        })
        ->orderBy('client_sites.id', 'DESC')
        ->get();

        

        if(auth()->user()->role == 'admin' && !auth()->user()->is_client){
            $cleaners = User::where('role', 'cleaner')->get();
        }else{
            $allcleaner = ClientSiteShift::whereIn('client_site_id',$sites_data->pluck('id')->toArray())->get();
            $cleaners = User::where('role', 'cleaner')->whereIn('id', $allcleaner->pluck('id')->toArray())->get();
        }
        

        Comment::with('user')->where(['user_id' => auth()->user()->id, 'data_id' => '0', 'type' => 'site'])->delete();
        return view('clients.site-manage.site', compact('clients', 'client_portfolios', 'cleaners', 'supervisors', 'states', 'cities', 'sites_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(auth()->user()->is_client){
            $clients = Client::where('status', 1)->where('client_id',auth()->user()->id)->get();
        }else{
            $clients = Client::where('status', 1)->get();
        }

        $client_portfolios = ClientPortfolio::whereIn('client_id',$clients->pluck('id')->toArray())->get();
        $contractors = Contractor::get();
        $cities = GeoCity::get();
        $states = GeoState::get();
        $supervisors = User::get();
        $cleaners = User::where('role', 'cleaner')->get();
        $alluser = User::whereIn('role', ['person', 'staff'])->get();
        return view('clients.site-manage.site-add', compact('clients', 'alluser', 'client_portfolios', 'contractors', 'cities', 'states', 'supervisors', 'cleaners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->client_id) {
            $internal_code = ClientSite::max('internal_code') ?? 10000;
            $client_site = [
                'internal_code' => $internal_code + 1,
                'client_id' => $request->client_id,
                'portfolio_id' => $request->portfolio_id,
                'site_type' => $request->site_type,
                'reference' => $request->reference_building ?? null,
                'contractor_id' => $request->contractor_id,
                'unit' => $request->unit,
                'address_number' => $request->address_number,
                'street_address' => $request->street_address,
                'suburb' => $request->suburb,
                'geo_city_id' => $request->city_id,
                'geo_state_id' => $request->state_id,
                'zip_code' => $request->zipcode,
                'supervisor_id' => $request->supervisor_id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'distance_gps' => $request->distance_allowed_gps,
                'variation_allowed_minutes' => $request->variation_allowed_min,
                'is_regular_site' => $request->is_regular_site ?? 0,
                'is_overnight_shift' => $request->is_overnight_shift ?? 0,
                'show_missed_clean' => $request->in_missed_clean ?? 0,
                'is_high_risk' => $request->is_high_risk ?? 0,
                'note' => $request->notes,
                'scope_of_work' => $request->scope_of_work
            ];
            $sitedata =  ClientSite::create($client_site);

            if($sitedata){
                ClientPortfolioSite::updateOrCreate(['client_portfolio_id'=>$request->portfolio_id,'client_site_id'=>$sitedata->id],['client_site_id'=>$sitedata->id]);
                $user_contact = [];
                if ($request->user_id) {
                    foreach ($request->user_id as $kk => $user) {
                        $user_contact[] = [
                            'contact_type' => 'site',
                            'data_id' => $sitedata->id,
                            'user_id' => $user,
                            'user_type' => $request->contact_type[$kk],
                            'status' => 1
                        ];
                    }
                    BaseContact::insert($user_contact);
                }



            if ($request->shiftCleaner) {
                foreach ($request->shiftCleaner as $kk => $scleaner) {
                    $shift_cleaner = [
                        'client_site_id' => $sitedata->id,
                        'cleaner_id' => $scleaner,
                        'shift_type' => $request->shiftType[$kk],
                        'hourly_rate' => $request->shifthourlyRate[$kk] ?? 0,
                        'avaliable_start_time' => $request->shiftavaliableStartTime[$kk],
                        'avaliable_end_time' => $request->shiftavaliableEndTime[$kk],
                        'total_hours' => $request->shifttotalHours[$kk] ?? 0,
                        'status' => 'active'
                    ];
                    $client_site_shift = ClientSiteShift::create($shift_cleaner);

                    $alldaysData = [
                        $request->shiftSunday,
                        $request->shiftMonday,
                        $request->shiftTuesday,
                        $request->shiftWednesday,
                        $request->shiftThursday,
                        $request->shiftFriday,
                        $request->shiftSaturday,
                    ];
                    $shiftdays = array_column($alldaysData, $kk);

                    $frequencySite = 0;
                    if (!empty($shiftdays)) {
                        foreach ($shiftdays as $days) {
                            if ($days) {
                                $frequencySite += 1;
                                $client_site_shift_day = [
                                    'client_site_shifts_id' => $client_site_shift->id,
                                    'client_site_id' => $sitedata->id,
                                    'shift_type' => 'shift',
                                    'day_type'=>$days
                                ];
                                ClientSiteShiftsDay::create($client_site_shift_day);
                            }
                        }
                    }
                    $frequency = $frequencySite;
                    if($frequency > 0){
                        ClientSiteShift::whereId($client_site_shift->id)->update(['frequency'=>$frequency]);
                    }

                }
            }

            if ($request->avaliableStartTime) {
                foreach ($request->avaliableStartTime as $kk => $startime) {
                    $shift_receivable_cleaner = [
                        'client_site_id' => $sitedata->id,
                        'avaliable_start_time' => $startime,
                        'avaliable_end_time' => $request->avaliableEndTime[$kk],
                        'total_hours' => $request->totalHours[$kk] ?? 0,
                        'hourly_rate_receivable' => $request->hourlyRateReceivable[$kk] ?? 0
                    ];
                    $client_site_shift = ClientSiteShiftsReceivable::create($shift_receivable_cleaner);

                    $alldaysData = [
                        $request->inputSunday,
                        $request->inputMonday,
                        $request->inputTuesday,
                        $request->inputWednesday,
                        $request->inputThursday,
                        $request->inputFriday,
                        $request->inputSaturday,
                    ];
                    $shiftdays_receivable = array_column($alldaysData, $kk);

                    $frequencySiteRece = 0;
                    if (!empty($shiftdays_receivable)) {
                        foreach ($shiftdays_receivable as $days) {
                            if ($days) {
                                $frequencySiteRece += 1;
                                $client_site_shift_day = [
                                    'client_site_shifts_id' => $client_site_shift->id,
                                    'client_site_id' => $sitedata->id,
                                    'shift_type' => 'receivable',
                                    'day_type'=>$days
                                ];
                                ClientSiteShiftsDay::create($client_site_shift_day);
                            }
                        }
                    }
                    $frequency = $frequencySiteRece;
                    if($frequency > 0){
                        ClientSiteShiftsReceivable::whereId($client_site_shift->id)->update(['frequency'=>$frequency]);
                    }
                }
            }

            Comment::where(['type' => 'site', 'user_id' => auth()->user()->id])->update(['data_id' => $sitedata->id]);

                $receivableCal = ClientSiteShiftsReceivable::where('client_site_id',$sitedata->id)->select('total_hours','hourly_rate_receivable as hourly_rate','frequency')->get()->toArray();
                $shiftCal = ClientSiteShift::where('client_site_id',$sitedata->id)->select('total_hours','hourly_rate','frequency')->get()->toArray();
                if($shiftCal) $receivableCalMonz = $this->monetizationService->MonetizationForClient($shiftCal);
                if($receivableCal) $shiftCalMonz = $this->monetizationService->MonetizationForCleaner($receivableCal);


                $site_monetization = [
                    'client_site_id' => $sitedata->id,
                    'client_yearly' =>  $request->client_yearly ?? ($shiftCalMonz['yearlyIncome']??null) ,
                    'client_monthly' =>  $request->client_monthly ?? ($shiftCalMonz['monthlyIncome']??null) ,
                    'client_fortnightly' =>  $request->client_fortnightly ?? ($shiftCalMonz['fortnightlyIncome']??null) ,
                    'client_time_allocated' =>  $request->client_time_allocated ?? ($shiftCalMonz['timeAllocated']??null) ,
                    'client_hourly_rate'=>  $request->client_hourly_rate ?? ($shiftCalMonz['hourlyRate']??null) ,
                    'client_service_cost'=>  $request->client_service_cost ?? ($shiftCalMonz['serviceCost']??null) ,
                    'client_frequency'=>  $request->client_frequency ?? ($shiftCalMonz['frequency']??null) ,
                    'cleaner_frequency'=>  $request->cleaner_frequency ?? ($receivableCalMonz['frequency']??null) ,
                    'cleaner_yearly'=> $request->cleaner_yearly ?? ($receivableCalMonz['yearlyIncome']??null) ,
                    'cleaner_monthly'=> $request->cleaner_monthly ?? ($receivableCalMonz['monthlyIncome']??null) ,
                    'cleaner_fortnightly'=> $request->cleaner_fortnightly ?? ($receivableCalMonz['fortnightlyIncome']??null) ,
                    'cleaner_time_allocated'=> $request->cleaner_time_allocated ?? ($receivableCalMonz['timeAllocated']??null) ,
                    'cleaner_hourly_rate'=> $request->cleaner_hourly_rate ?? ($receivableCalMonz['hourlyRate']??null) ,
                    'cleaner_service_cost'=> $request->cleaner_service_cost ?? ($receivableCalMonz['serviceCost']??null)
                ];
                ClientSiteMonetization::create($site_monetization);

        }
            return redirect()->route('client.site.index')->with('success', 'Site Created Successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($manageSite)
    {
        $manageSite = ClientSite::with(['client', 'potfolio', 'contractor', 'city', 'state', 'supervisor'])->whereId($manageSite)->first();
        $qrcodedata = QrCode::size(100)->generate($manageSite->internal_code);
        $site_shift = ClientSiteShift::with(['shift_days'])->where(['client_site_id' => $manageSite->id])->get();
        $site_shift_reciabale = ClientSiteShiftsReceivable::with(['shift_days'])->where(['client_site_id' => $manageSite->id])->get();
        $site_monetization = ClientSiteMonetization::where(['client_site_id' => $manageSite->id])->first();
        $site_contact = BaseContact::with(['user'])->where(['contact_type' => 'site', 'data_id' => $manageSite->id])->get();
        $site_comment = Comment::with('user')->where(['user_id' => auth()->user()->id, 'data_id' => $manageSite->id, 'type' => 'site'])->get();

        $site_tickets = Ticket::where('client_site_id', $manageSite->id)->get();
        $purchase_orders = Ticket::where('client_site_id', $manageSite->id)->whereIn('type', ['General Material Order', 'Consumables Order', 'Material Request Through Client'])->get();
        $site_complains = ClientSiteCleanerRequest::with(['cleaner'])->where(['client_site_id' => $manageSite->id])->orderBy('create_date_time','DESC')->get();
        $timeAttendance = ClientSiteShiftCleanerSubmissions::with(['clientsiteshift','cleaner','site','site.potfolio','site.client'])->where('client_site_id',$manageSite->id)->orderBy('id','DESC')->get();
        $cleaners = User::where('role', 'cleaner')->get();
        // dd($timeAttendance);
        return view('clients.site-manage.site-view', compact('qrcodedata','manageSite', 'site_shift', 'site_shift_reciabale', 'site_monetization', 'site_contact', 'cleaners', 'site_comment', 'site_complains', 'site_tickets', 'purchase_orders','timeAttendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($manageSite)
    {
        $manageSite = ClientSite::with(['client', 'potfolio'])->where('id', $manageSite)->first();
        $site_shift = ClientSiteShift::with(['shift_days'])->where(['client_site_id' => $manageSite->id])->get();
        $site_shift_reciabale = ClientSiteShiftsReceivable::with(['shift_days'])->where(['client_site_id' => $manageSite->id])->get();
        $site_monetization = ClientSiteMonetization::where(['client_site_id' => $manageSite->id])->first();
        $site_comment = Comment::with('user')->where(['user_id' => auth()->user()->id, 'data_id' => $manageSite->id, 'type' => 'site'])->get();

        $site_contact = BaseContact::with(['user'])->where(['contact_type' => 'site', 'data_id' => $manageSite->id])->get();

        $clients = Client::where('status', 1)->get();
        $client_portfolios = ClientPortfolio::get();
        $contractors = Contractor::get();
        $cities = GeoCity::get();
        $states = GeoState::get();
        $supervisors = User::where('role', 'staff')->get();
        $cleaners = User::where('role', 'cleaner')->get();
        $alluser = User::whereIn('role', ['person', 'staff'])->get();
        return view('clients.site-manage.site-edit', compact('manageSite', 'clients', 'alluser', 'client_portfolios', 'contractors', 'cities', 'states', 'supervisors', 'cleaners', 'site_shift', 'site_shift_reciabale', 'site_monetization', 'site_comment', 'site_contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $manageSite)
    {
        // dd($request->all());
        $manageSite = ClientSite::with(['client', 'potfolio'])->where('id', $manageSite)->first();
        if ($request->client_id) {
            $client_site = [
                'client_id' => $request->client_id,
                'portfolio_id' => $request->portfolio_id,
                'site_type' => $request->site_type,
                'reference' => $request->reference_building ?? null,
                'contractor_id' => $request->contractor_id,
                'unit' => $request->unit,
                'address_number' => $request->address_number,
                'street_address' => $request->street_address,
                'suburb' => $request->suburb,
                'geo_city_id' => $request->city_id,
                'geo_state_id' => $request->state_id,
                'zip_code' => $request->zipcode,
                'supervisor_id' => $request->supervisor_id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'distance_gps' => $request->distance_allowed_gps,
                'variation_allowed_minutes' => $request->variation_allowed_min,
                'is_regular_site' => $request->is_regular_site ?? 0,
                'is_overnight_shift' => $request->is_overnight_shift ?? 0,
                'show_missed_clean' => $request->in_missed_clean ?? 0,
                'is_high_risk' => $request->is_high_risk ?? 0,
                'note' => $request->notes,
                'scope_of_work' => $request->scope_of_work
            ];
            // dd($client_site,$request->all());
            ClientSite::where('id', $manageSite->id)->update($client_site);

            if ($request->user_id) {
                foreach ($request->user_id as $kk => $user) {
                    BaseContact::updateOrCreate(['contact_type' => 'site', 'data_id' => $manageSite->id, 'user_id' => $user], ['user_type' => $request->contact_type[$kk], 'status' => 1]);
                }
            }
            ClientPortfolioSite::updateOrCreate(['client_portfolio_id'=>$request->portfolio_id,'client_site_id'=>$manageSite->id],['client_site_id'=>$manageSite->id]);
            if ($request->shiftCleaner) {
                foreach ($request->shiftCleaner as $kk => $scleaner) {
                    $shift_cleaner = [
                        'shift_type' => $request->shiftType[$kk],
                        'hourly_rate' => $request->shifthourlyRate[$kk] ?? 0,
                        'avaliable_start_time' => $request->shiftavaliableStartTime[$kk],
                        'avaliable_end_time' => $request->shiftavaliableEndTime[$kk],
                        'total_hours' => $request->shifttotalHours[$kk] ?? 0,
                        'status' => 'active',
                        'client_site_id' => $manageSite->id,
                        'cleaner_id' => $scleaner
                    ];

                    $client_site_shift = ClientSiteShift::create($shift_cleaner);
                    $alldaysData = [
                        $request->shiftSunday,
                        $request->shiftMonday,
                        $request->shiftTuesday,
                        $request->shiftWednesday,
                        $request->shiftThursday,
                        $request->shiftFriday,
                        $request->shiftSaturday,
                    ];
                    $shiftdays = array_column($alldaysData, $kk);

                    $frequencySite = 0;
                    if (!empty($shiftdays)) {
                        foreach ($shiftdays as $days) {
                            if ($days) {
                                $frequencySite += 1;
                                $client_site_shift_day = [
                                    'client_site_shifts_id' => $client_site_shift->id,
                                    'shift_type' => 'shift',
                                    'client_site_id'=>$manageSite->id,
                                    'day_type'=>$days
                                ];
                                ClientSiteShiftsDay::create($client_site_shift_day);
                            }
                        }
                    }
                    $frequency = $frequencySite;
                    if($frequency > 0){
                        ClientSiteShift::whereId($client_site_shift->id)->update(['frequency'=>$frequency]);
                    }
                }
            }

            if($request->avaliableStartTime){
                foreach($request->avaliableStartTime as $kk=>$startime){
                    $shift_receivable_cleaner = [
                        'avaliable_start_time' => $startime,
                        'avaliable_end_time' => $request->avaliableEndTime[$kk],
                        'total_hours' => $request->totalHours[$kk]??0,
                        'hourly_rate_receivable' => $request->hourlyRateReceivable[$kk]??0,
                        'client_site_id'=>$manageSite->id
                    ];
                    $client_site_shift = ClientSiteShiftsReceivable::create($shift_receivable_cleaner);

                    $alldaysData = [
                        $request->inputSunday,
                        $request->inputMonday,
                        $request->inputTuesday,
                        $request->inputWednesday,
                        $request->inputThursday,
                        $request->inputFriday,
                        $request->inputSaturday,
                    ];
                    $shiftdays_receivable = array_column($alldaysData,$kk);

                    $frequencySiteRece = 0;
                    if(!empty($shiftdays_receivable)){
                        foreach($shiftdays_receivable as $days){
                            if($days){
                                $frequencySiteRece += 1;
                                $client_site_shift_day = [
                                    'client_site_shifts_id' => $client_site_shift->id,
                                    'shift_type' => 'receivable',
                                    'client_site_id',$manageSite->id,
                                    'day_type'=>$days
                                ];
                                ClientSiteShiftsDay::create($client_site_shift_day);
                            }
                        }
                    }

                    $frequency = $frequencySiteRece;
                    if($frequency > 0){
                        ClientSiteShiftsReceivable::whereId($client_site_shift->id)->update(['frequency'=>$frequency]);
                    }
                }
            }

            Comment::where(['type' => 'site', 'user_id' => auth()->user()->id])->update(['data_id' => $manageSite->id]);

                $receivableCal = ClientSiteShiftsReceivable::where('client_site_id',$manageSite->id)->select('total_hours','hourly_rate_receivable as hourly_rate','frequency')->get()->toArray();
                $shiftCal = ClientSiteShift::where('client_site_id',$manageSite->id)->select('total_hours','hourly_rate','frequency')->get()->toArray();
                if($shiftCal) $receivableCalMonz = $this->monetizationService->MonetizationForClient($shiftCal);
                if($receivableCal) $shiftCalMonz = $this->monetizationService->MonetizationForCleaner($receivableCal);
                $site_monetization = [
                    'client_yearly' =>  $request->client_yearly ?? ($shiftCalMonz['yearlyIncome'] ?? null) ,
                    'client_monthly' =>  $request->client_monthly ?? ($shiftCalMonz['monthlyIncome']??null) ,
                    'client_fortnightly' =>  $request->client_fortnightly ?? ($shiftCalMonz['fortnightlyIncome']??null) ,
                    'client_time_allocated' =>  $request->client_time_allocated ?? ($shiftCalMonz['timeAllocated']??null) ,
                    'client_hourly_rate'=>  $request->client_hourly_rate ?? ($shiftCalMonz['hourlyRate']??null) ,
                    'client_service_cost'=>  $request->client_service_cost ?? ($shiftCalMonz['serviceCost']??null) ,
                    'client_frequency'=>  $request->client_frequency ?? ($shiftCalMonz['frequency']??null) ,
                    'cleaner_frequency'=>  $request->cleaner_frequency ?? ($receivableCalMonz['frequency']??null) ,
                    'cleaner_yearly'=> $request->cleaner_yearly ?? ($receivableCalMonz['yearlyIncome']??null) ,
                    'cleaner_monthly'=> $request->cleaner_monthly ?? ($receivableCalMonz['monthlyIncome']??null) ,
                    'cleaner_fortnightly'=> $request->cleaner_fortnightly ?? ($receivableCalMonz['fortnightlyIncome']??null) ,
                    'cleaner_time_allocated'=> $request->cleaner_time_allocated ?? ($receivableCalMonz['timeAllocated']??null) ,
                    'cleaner_hourly_rate'=> $request->cleaner_hourly_rate ?? ($receivableCalMonz['hourlyRate']??null) ,
                    'cleaner_service_cost'=> $request->cleaner_service_cost ?? ($receivableCalMonz['serviceCost']??null)
                ];

                ClientSiteMonetization::updateOrCreate(['client_site_id'=>$manageSite->id],$site_monetization);


            return redirect()->route('client.site.index')->with('success', 'Site Updated Successfully.');
        }
    }


    public function monetizationCalculator($data){
        $totalHours = 0;
        $hourlyRate = 0;
        $serviceCost = 0;
        $frequency = 0;

        // Loop through the data and perform calculations
        foreach ($data as $entry) {
            $totalHours += $entry['total_hours'];
            $hourlyRate = $entry['hourly_rate'];
            $serviceCost += $entry['total_hours'] * $entry['hourly_rate'];
            $frequency += $entry['frequency']; // Assuming Frequency Days is an array of selected days
        }

        $returnData = [];
        $returnData['yearlyIncome'] = ($totalHours * $hourlyRate) * $frequency;
        $returnData['monthlyIncome'] = $returnData['yearlyIncome'] / 12;
        $returnData['fortnightlyIncome'] = $returnData['yearlyIncome'] / 26;
        $returnData['timeAllocated'] = $totalHours;
        $returnData['hourlyRate'] = $hourlyRate;
        $returnData['serviceCost'] = $serviceCost;
        $returnData['frequency'] = $frequency;

        return $returnData;

    }


    public function unique_check(Request $request){
        if($request->colname){
            $siteVal = $request->site_id??0;
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(ClientSite::where($request->colname, urldecode($request->colvalue))->exists()){
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
