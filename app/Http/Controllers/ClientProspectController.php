<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Common\ImageController;
use App\Models\ClientProspect;
use App\Http\Requests\StoreClientProspectRequest;
use App\Http\Requests\UpdateClientProspectRequest;
use App\Models\BaseAddress;
use App\Models\BaseContact;
use App\Models\Client;
use App\Models\GeoCity;
use App\Models\GeoState;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;


class ClientProspectController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:client-view')->only(['index', 'show']);
        $this->middleware('role:cleaner-create-prospect')->only(['create', 'store','getContact','getUser','saveAddress','deleteAddress']);
        $this->middleware('role:client-edit')->only(['edit', 'update','getContact','getUser','saveAddress','deleteAddress']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client_prospect = Client::where('is_prospect_client',1)->orderBy('id','DESC')->get();
        return view('clients.prospect.client-prospect',compact('client_prospect'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = GeoCity::get();
        $states = GeoState::get();
        return view('clients.prospect.new-prospect-client',compact('cities','states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client_data = [
            "business_name"=>$request->business_name,
            "abn" => $request->abn,
            "acn" => $request->acn,
            "created_by" => auth()->user()->id,
            "client_entry_point" => $request->client_entry_point == "other" ? "other : ".$request->client_entry_point_other : $request->client_entry_point,
            "contacted_by" => $request->contacted_by,
            "notes" => $request->notes,
            "is_prospect_client"=>1
        ];
        if($client_data && !empty($client_data)) {

            if($request->hasFile('file')){
                $image = $request->file('file');
                $dateFolder = 'clients/profile'.'/' . now()->format('Y_m_d');
                $imageupload = ImageController::upload($image, $dateFolder);
                $client_data['profile_image'] = $imageupload;
            }

            $client_prospects = Client::create($client_data);

            $address_client_data = [
                "data_id" => $client_prospects->id,
                "unit" => $request->unit,
                "address_number" => $request->address_number,
                "street_address" => $request->street_address,
                "suburb" => $request->suburb,
                "geo_city_id" => $request->city_id,
                "geo_state_id" => $request->state_id,
                "zipcode" => $request->zipcode,
                "type"=>'client'
            ];
            if($address_client_data && !empty($address_client_data)) BaseAddress::create($address_client_data);

            $userData = [
                "name"=>$request->contact_name,
                "surname" => $request->contact_surname,
                "email"=>$request->contact_email,
                "phone_number" => $request->phone_number
            ];
            if($userData && !empty($userData)){
                $usertb = User::create($userData);

                $contact_client_data = [
                    "contact_type" => 'client',
                    "data_id"=>$client_prospects->id,
                    "user_id"=>$usertb->id,
                    "user_type"=>$request->contact_type,
                    "status"=>0
                ];
                if($contact_client_data && !empty($contact_client_data)) BaseContact::create($contact_client_data);
            }


        }
        if($client_prospects){
            return redirect()->route('client.prospect.index')->with('success','Client Prospect Added Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');

    }

    /**
     * Display the specified resource.
     */
    public function show(ClientProspect $prospect)
    {
        $data['prospect']=$prospect;
        return view('clients.portfolio.portfolio-client-view',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientProspect $prospect)
    {
        $cities = GeoCity::get();
        $states = GeoState::get();
        $user   = User::get();
        $roles  = Role::get();
        return view('clients.prospect.prospect-client-edit',compact('cities','states','prospect','user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientProspectRequest $request, ClientProspect $prospect)
    {
        $fields = $request->except(['_token','_method']);
        $prospect = ClientProspect::where('id',$prospect->id)->update($fields);
        if($prospect){
            return redirect()->route('client.prospect.index')->with('success','Client Prospect Updated successfully');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientProspect $prospect)
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
            }elseif(Client::where($request->colname, urldecode($request->colvalue))->exists()){
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
