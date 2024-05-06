<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientPortfolioRequest;
use App\Http\Requests\UpdateClientPortfolioRequest;
use App\Models\BaseContact;
use App\Models\Client;
use App\Models\ClientPortfolio;
use App\Models\ClientPortfolioSite;
use App\Models\ClientProspect;
use App\Models\ClientSite;
use App\Models\Comment;
use App\Models\GeoCity;
use App\Models\GeoState;
use App\Models\Role;
use App\Models\User;
use App\Models\UsersRole;

use Illuminate\Http\Request;

class ClientPortfolioController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:portfolio-view')->only(['index', 'show']);
        $this->middleware('role:portfolio-create')->only(['create', 'store','getContactData']);
        $this->middleware('role:portfolio-edit')->only(['edit', 'update','getContactData']);
    }
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        if(auth()->user()->is_client){
            $clients = Client::where('status', 1)->where('client_id',auth()->user()->id)->get()->pluck('id')->toArray();
            $clientPortfolio = ClientPortfolio::with(['manager'])->where('client_id',$clients)->orderBy('id','DESC')->get();
        }else{
            $clientPortfolio = ClientPortfolio::with(['manager'])->orderBy('id','DESC')->get();
        }
        
        return view('clients.portfolio.portfolios-client',compact('clientPortfolio'));
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {

        $client_sites = ClientPortfolioSite::get()->pluck('client_site_id')->toArray();
        $clients = Client::where('status',1)->get();
        $managers = User::whereIn('role',['person','staff'])->where('status','1')->get();
        $states = GeoState::get();
        $alluser = User::where('role','!=','admin')->where('status','1')->get();
        $roles = Role::where('id','>','2')->pluck('name','name')->all();
        $allsites = ClientSite::with(['state','potfolio'])->whereNotIn('id',$client_sites)->get();
        return view('clients.portfolio.portfolio-client-add',compact('clients','managers','states','alluser','roles','allsites'));
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(StoreClientPortfolioRequest $request)
    {
        $portfolio_data = [
            'client_id' => $request->client_id,
            'full_name' => $request->full_name,
            'short_name' => $request->short_name,
            'manager_id' => $request->manager_id,
            'geo_state_id' => $request->geo_state_id,
            'status' => 1
        ];

        $portfolio = ClientPortfolio::create($portfolio_data);
        if($portfolio){
            if($request->contact_id){
                foreach ($request->contact_id as $kk=>$contact) {
                    $base_contact_data[] = [
                        "contact_type" => "portfolio",
                        "data_id" => $portfolio->id,
                        "user_type" => $request->contact_type[$kk],
                        "user_id" => $contact
                    ];
                }
                if(isset($base_contact_data) && !empty($base_contact_data)) BaseContact::insert($base_contact_data);
            }

            if($request->comment_id){
                Comment::whereIn('id',$request->comment_id)->update(['data_id'=>$portfolio->id]);
            }

            if($request->site_id){
                foreach($request->site_id as $site){
                    $site_data[] = [
                        "client_portfolio_id" => $portfolio->id,
                        "client_site_id" => $site
                    ];
                }
                if(isset($site_data) && !empty($site_data)) ClientPortfolioSite::insert($site_data);
            }
        }
        return redirect()->route('client.portfolio.index')->with('success','Client Portfolio Created Successfully.');
    }

    /**
     * Display the specified resource.
    */
    public function show($clientPortfolio)
    {
        $clientPortfolio = ClientPortfolio::with(['client','manager','state'])->whereId($clientPortfolio)->first();
        $baseContact = BaseContact::where(['data_id'=>$clientPortfolio->id,'contact_type'=>'portfolio'])->get();
        $protfolioSite = ClientPortfolioSite::with(['site'])->where('client_portfolio_id',$clientPortfolio->id)->get();
        $protfolioComment = Comment::with('user')->where('data_id',$clientPortfolio->id)->where('type','portfolio')->get();
        $alluser = User::where('role','!=','admin')->get();
        $allsites = ClientSite::with(['state','potfolio'])->get();
        return view('clients.portfolio.portfolio-client-view',compact('clientPortfolio','alluser','allsites','baseContact','protfolioSite','protfolioComment'));
    }

    /**
     * Show the form for editing the specified resource.
    */
    public function edit($clientPortfolio)
    {
        $clientPortfolio = ClientPortfolio::whereId($clientPortfolio)->first();
        $baseContact = BaseContact::where(['data_id'=>$clientPortfolio->id,'contact_type'=>'portfolio'])->get();
        $protfolioSite = ClientPortfolioSite::with(['site'])->where('client_portfolio_id',$clientPortfolio->id)->get();
        $protfolioComment = Comment::with('user')->where('data_id',$clientPortfolio->id)->where('type','portfolio')->get();

        $client_sites = ClientPortfolioSite::get()->pluck('client_site_id')->toArray();

        $clients = Client::where('status',1)->get();
        $managers = User::whereIn('role',['person','staff'])->get();
        $states = GeoState::get();
        $roles = Role::where('id','>','2')->pluck('name','name')->all();
        $alluser = User::where('role','!=','admin')->get();
        $allsites = ClientSite::with(['state','potfolio'])->get();

        // $newAllsite = ClientSite::with(['state','potfolio'])->whereIn('id',$client_sites)->get();

        return view('clients.portfolio.portfolio-client-edit',compact('clientPortfolio','protfolioComment','baseContact','protfolioSite','clients','managers','states','alluser','roles','allsites'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $clientPortfolio)
    {
        $portfolio_data = [
            'client_id' => $request->client_id,
            'full_name' => $request->full_name,
            'short_name' => $request->short_name,
            'manager_id' => $request->manager_id,
            'geo_state_id' => $request->geo_state_id,
            'status' => 1
        ];
        $portfolio = ClientPortfolio::whereId($clientPortfolio)->update($portfolio_data);
        if($portfolio){
            if($request->contact_id){
                foreach ($request->contact_id as $kk=>$contact) {
                    $base_contact_data[] = [
                        "contact_type" => "portfolio",
                        "data_id" => $clientPortfolio,
                        "user_type" => $request->contact_type[$kk],
                        "user_id" => $contact
                    ];
                }
                if(isset($base_contact_data) && !empty($base_contact_data)) BaseContact::insert($base_contact_data);
            }

            if($request->site_id){
                foreach($request->site_id as $site){
                    $site_data[] = [
                        "client_portfolio_id" => $clientPortfolio,
                        "client_site_id" => $site
                    ];
                }
                if(isset($site_data) && !empty($site_data)) ClientPortfolioSite::insert($site_data);
            }
        }

        return redirect()->route('client.portfolio.index')->with('success','Client Portfolio Updated Successfully.');;
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(ClientPortfolio $clientPortfolio)
    {
        //
    }


    public function getContactData(Request $request)
    {
        $contactId=$request->input('contactId');
        $userDetail=User::select('id','name','email','phone_number')->whereId($contactId)->first();
        $usersRole=UsersRole::select('role_id')->where('user_id',$userDetail->id)->first();
        $userDetail->ContactType=Role::select('name')->where('id',$usersRole->role_id)->first();

        return response()->json([
            'success'=>'200',
            'message'=>'Contact Detail.',
            'data'   => $userDetail
          ]);

    }

    public function unique_check(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(ClientPortfolio::where($request->colname, urldecode($request->colvalue))->exists()){
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
