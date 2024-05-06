<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Common\ImageController;
use App\Models\Client;
use App\Models\MainCompany;
use App\Models\User;
use App\Models\Role;
use App\Models\Comment;
use App\Http\Requests\UpdateClientRequest;
use App\Models\BaseAddress;
use App\Models\BaseContact;
use App\Models\ClientPortfolio;
use App\Models\GeoCity;
use App\Models\GeoState;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:client-view')->only(['index', 'show']);
        $this->middleware('role:client-create')->only(['create', 'store','getContact','getUser','saveAddress','deleteAddress']);
        $this->middleware('role:client-edit')->only(['edit', 'update','getContact','getUser','saveAddress','deleteAddress']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        Comment::with('user')->where(['user_id'=>auth()->user()->id,'data_id'=>'0','type'=>'client'])->delete();
        $clients = Client::orderBy('id','DESC')->get();
        if(auth()->user()->role == 'admin' && !auth()->user()->is_client){
            $clients = Client::where('is_prospect_client','0')->orderBy('id','DESC')->get();
        }else{
            $clients = Client::where('is_prospect_client','0')->where('client_id',auth()->user()->id)->orderBy('id','DESC')->get();
        }
        return view('clients.client',compact('clients'));
    }


    function validationData($request,$userData=null)
    {
        $validData = null;
        $validator = Validator::make($request->all(), [
            'business_name'=>'required',
            'trading_name'=>'required',
            'abn'=>'nullable',
            'acn'=>'nullable',
            'phone_number'=>'required',
            'second_number'=>'nullable',
            'mobile_number'=>'nullable',
            'fax_number'=>'nullable',
            'client_type'=>'required',
            'website'=>'required',
            'comapny_id'=>'required',
            'is_prospect_client'=>'nullable',
            'is_direct_client'=>'nullable',
            'notes'=>'nullable'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'basic_info');
            $validData = $validator->errors();
            return $validData;
        }

        $validator = Validator::make($request->all(), [
            'unit' => 'nullable',
            'address_number' => 'required|array',
            'address_number.*'=>'required',
            'street_address' => 'required|array',
            'street_address.*' => 'required',
            'suburb' => 'required|array',
            'suburb.*' => 'required',
            'city' => 'nullable',
            'state' => 'nullable',
            'zipcode' => 'required|array',
            'zipcode.*' => 'required',
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
            'portfolio' => 'nullable'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'portfolio');
            $validData = $validator->errors();
            return $validData;
        }

        $validator = Validator::make($request->all(), [
            'comments' => 'nullable'
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'comments');
            $validData = $validator->errors();
            return $validData;
        }

        $validator = Validator::make($request->all(), [
            'facebook'=>'nullable',
            'twitter'=>'nullable',
            'instagram'=>'nullable',
            'linkedin'=>'nullable',
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'social_media');
            $validData = $validator->errors();
            return $validData;
        }


        if($userData && $userData->email != $request->email && $userData->email ==$request->team_player_role){
            if(User::where(['email'=>$request->email,'role'=>$request->team_player_role])->exists()){
                $validator->errors()->add('email', 'Email Already Exists.');
                $validData = $validator->errors();
                return $validData;
            }
        }elseif(!$userData && User::where(['email'=>$request->email,'role'=>$request->team_player_role])->exists()){
            $validator->errors()->add('email', 'Email Already Exists --.');
            $validData = $validator->errors();
            return $validData;
        }
        return $validData;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $companies = MainCompany::where('status','1')->get();
        $cities = GeoCity::get();
        $states = GeoState::get();
        $alluser = User::whereIn('role',['person','staff'])->where('status','1')->get();
        $client_portfolios = ClientPortfolio::get();
        return view('clients.client-add',compact('companies','cities','states','client_portfolios','alluser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validationData = $this->validationData($request);

        // if ($validationData) {
        //     return  redirect()->back()->withInput()->withErrors($validationData);
        // }

        $clientData = [
            'business_name'=>$request->business_name ?? null,
            'trading_name'=>$request->trading_name ?? null,
            'abn'=>$request->abn ?? null,
            'acn'=>$request->acn ?? null,
            'phone_number'=>$request->phone_number ?? null,
            'second_number'=>$request->second_number ?? null,
            'mobile_number'=>$request->mobile_number ?? null,
            'fax_number'=>$request->fax_number ?? null,
            'client_type'=>$request->client_type ?? null,
            'website'=>$request->website ?? null,
            'facebook'=>$request->facebook ?? null,
            'twitter'=>$request->twitter ?? null,
            'instagram'=>$request->instagram ?? null,
            'linkedin'=>$request->linkedin ?? null,
            'comapny_id'=>$request->comapny_id ?? null,
            'is_prospect_client'=>$request->is_prospect_client??0 ,
            'is_direct_client'=>$request->is_direct_client??0 ,
            'notes'=>$request->notes ?? null,
            'client_id'=>$request->client_id ?? null
        ];

        if($request->client_id){
            User::where('id',$request->client_id)->update(['is_client'=>1]);
        }

        $clientNew = Client::create($clientData);

        $client_id = $clientNew->id;

        $user_contact = [];
        if($request->user_id){
            foreach($request->user_id as $kk=>$user){
                $user_contact[] = [
                    'contact_type' => 'client',
                    'data_id' => $client_id,
                    'user_id'=>$user,
                    'user_type' => $request->contact_type[$kk],
                    'status' => 1
                ];
            }
            BaseContact::insert($user_contact);
        }

        $baseAddress = [];
        if ($request->address_number && !empty($request->address_number)) {
            foreach ($request->address_number as $kk => $add_num) {
                $baseAddress[] = [
                    'type' => 'client',
                    'data_id' => $client_id,
                    'unit' => $request->unit[$kk] ?? null,
                    'address_number' => $add_num ?? null,
                    'street_address' => $request->street_address[$kk] ?? null,
                    'suburb' => $request->suburb[$kk] ?? null,
                    'geo_city_id' => $request->city[$kk] ?? null,
                    'geo_state_id' => $request->state[$kk] ?? null,
                    'zipcode' => $request->zipcode[$kk] ?? null,
                    'is_this_main_address' => $request->is_main_address[$kk] ?? 0,
                    'is_this_mail_address' => $request->is_mail_address[$kk] ?? 0,
                    'status' => 'active',
                    'imported_address' => $request->imported_address[$kk] ?? null,
                ];
            }
        }
        if ($baseAddress && !empty($baseAddress)) {
            BaseAddress::insert($baseAddress);
        }

        if($request->portfolio){
            ClientPortfolio::whereIn('id',$request->portfolio)->update(['client_id'=>$client_id]);
        }

        Comment::where(['user_id'=>auth()->user()->id,'data_id'=>'0','type'=>'client'])->update(['data_id'=>$client_id]);


        return redirect()->route('client.client.index')->with('success','Client created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $company = MainCompany::where('id',$client->comapny_id)->first()->business_name ?? '';
        $client_portfolios = ClientPortfolio::where('client_id',$client->id)->get();
        $addresses = BaseAddress::with(['city','state'])->where('data_id',$client->id)->where('type','client')->get();
        $comments = Comment::with(['client'])->where('data_id',$client->id)->where('type','client')->get();
        $client_contact = BaseContact::with(['user'])->where(['contact_type'=>'client','data_id'=>$client->id])->get();
        $users = User::select('users.*','client_contacts.user_id','client_contacts.contact_type')->leftJoin('client_contacts','client_contacts.user_id','=','users.id')->where('client_contacts.client_id',$client->id)->get();
        return view('clients.client-view',compact('client','users','addresses','comments','company','client_contact','client_portfolios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {

        $client_portfolios = ClientPortfolio::where('client_id',$client->id)->get();
        $client_portfolios_not = ClientPortfolio::get();
        $companies = MainCompany::get();
        $cities = GeoCity::get();
        $states = GeoState::get();
        $alluser = User::whereIn('role',['person','staff'])->get();
        $client_contact = BaseContact::with(['user'])->where(['contact_type'=>'client','data_id'=>$client->id])->get();
        $addresses = BaseAddress::with(['city','state'])->where('data_id',$client->id)->where('type','client')->get();
        $comments = Comment::with(['client'])->where('data_id',$client->id)->where('type','client')->get();
        $users = User::select('users.*','client_contacts.user_id','client_contacts.contact_type')->leftJoin('client_contacts','client_contacts.user_id','=','users.id')->where('client_contacts.client_id',$client->id)->get();
        return view('clients.client-edit',compact('client','companies','users','client_contact','cities','states','addresses','alluser','comments','client_portfolios','client_portfolios_not'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        // $validationData = $this->validationData($request);

        // if ($validationData) {
        //     return  redirect()->back()->withInput()->withErrors($validationData);
        // }
        $oldclient = Client::where('id',$client->id)->first();
        $clientData = [
            'business_name'=>$request->business_name ?? null,
            'trading_name'=>$request->trading_name ?? null,
            'abn'=>$request->abn ?? null,
            'acn'=>$request->acn ?? null,
            'phone_number'=>$request->phone_number ?? null,
            'second_number'=>$request->second_number ?? null,
            'mobile_number'=>$request->mobile_number ?? null,
            'fax_number'=>$request->fax_number ?? null,
            'client_type'=>$request->client_type ?? null,
            'website'=>$request->website ?? null,
            'facebook'=>$request->facebook??null,
            'twitter'=>$request->twitter??null,
            'instagram'=>$request->instagram??null,
            'linkedin'=>$request->linkedin??null,
            'comapny_id'=>$request->comapny_id ?? null,
            'is_prospect_client'=>$request->is_prospect_client??0,
            'is_direct_client'=>$request->is_direct_client??0,
            'notes'=>$request->notes ?? null,
            'created_by'=>auth()->user()->id,
            'client_id'=>$request->client_id
        ];


        $clients = Client::where('id',$client->id)->update($clientData);
        if($request->client_id && $clients && $oldclient->client_id && $oldclient->client_id != $request->client_id){
            if($oldclient->client_id && !Client::where('client_id',$oldclient->client_id)->exists()){
                User::where('id',$oldclient->client_id)->update(['is_client'=>0]);
            } 
        }
        User::where('id',$request->client_id)->update(['is_client'=>1]);

        $baseAddress = [];
        if ($request->address_number && !empty($request->address_number)) {
            foreach ($request->address_number as $kk => $add_num) {
                $baseAddress[] = [
                    'type' => 'client',
                    'data_id' => $client->id,
                    'unit' => $request->unit[$kk] ?? null,
                    'address_number' => $add_num ?? null,
                    'street_address' => $request->street_address[$kk] ?? null,
                    'suburb' => $request->suburb[$kk] ?? null,
                    'geo_city_id' => $request->city[$kk] ?? null,
                    'geo_state_id' => $request->state[$kk] ?? null,
                    'zipcode' => $request->zipcode[$kk] ?? null,
                    'is_this_main_address' => $request->is_main_address[$kk] ?? 0,
                    'is_this_mail_address' => $request->is_mail_address[$kk] ?? 0,
                    'status' => 'active',
                    'imported_address' => $request->imported_address[$kk] ?? null,
                ];
            }
        }
        if ($baseAddress && !empty($baseAddress)) {
            BaseAddress::insert($baseAddress);
        }

        $user_contact = [];
        if($request->user_id){
            foreach($request->user_id as $kk=>$user){
                $user_contact[] = [
                    'contact_type' => 'client',
                    'data_id' => $client->id,
                    'user_id'=>$user,
                    'user_type' => $request->contact_type[$kk],
                    'status' => 1
                ];
            }
            BaseContact::insert($user_contact);
        }

        if ($request->portfolio && !empty($request->portfolio)) {
            ClientPortfolio::where(['client_id' => $client->id])->update(['client_id' => null]);
            ClientPortfolio::whereIn('id',$request->portfolio)->update(['client_id'=>$client->id]);
        }


        if($clients){
            return redirect()->route('client.client.index')->with('success','Client Updated successfully');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }

    public function getContact(Request $request){
        if($request->contact_type !=""){
            $role_id = Role::where('role_type',$request->contact_type)->first()->id;
            $usersIds = DB::table('users_roles')->where('role_id',$role_id)->get()->pluck('user_id');
            $data = User::whereIn('id',$usersIds)->get()->toArray();
            $html = '<select class="form-control" onchange="getUser(this)">';
            $html.= '<option value="">Select Contact</option>';
            foreach($data as $row){
                $html .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
            $html .='</select>';
            return $html;
        }
    }

    public function getUser(Request $request){
        if($request->user_id !=""){
            $data = User::where('id',$request->user_id)->first();
            return $data;
        }
    }



    public function saveAddress(Request $request){
        $fields = $request->except('_token');
        $address = BaseAddress::create($fields);
        if($address){
          return $address;
        }
        else{
            return false;
        }
    }



    public function deleteAddress(Request $request){
        return BaseAddress::where('id',$request->id)->delete();
    }



    public function deactivate(Request $request) {

    }

    public function saveComment(Request $request){
        if($request->file('file')!=''){
            $image = $request->file('file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/document/comment'), $new_name);
            $file_path = 'document/comment/'.$new_name;
        }
        $comment = Comment::create([
            'type'=>'client',
            'data_id'=>$request->data_id,
            'comment_type'=>$request->comment_type,
            'comment'=>$request->comment,
            'file'=>$file_path,
        ]);
        $comment->created_date = $comment->created_at->format('d/m/Y H:i:s');
        return $comment;
    }


    public function addComment(Request $request){
        $is_liveType = 1;
        if($request->data_id == 0){
            $is_liveType = 0;
        }

        $docs_image_imageupload = null;
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $docs_image = $request->file('file');
            $dateFolder = 'client/comment';
            $docs_image_imageupload = ImageController::upload($docs_image,$dateFolder);
        }

        if($docs_image_imageupload){
            $comment = Comment::create(['type'=>$request->type,'data_id'=>$request->data_id,'user_id'=>auth()->user()->id,'comment_type'=>$request->comment_type,'comment'=>$request->comment,'file'=>$docs_image_imageupload,'is_live'=>$is_liveType]);
        }else{
            $comment = Comment::create(['type'=>$request->type,'data_id'=>$request->data_id,'user_id'=>auth()->user()->id,'comment_type'=>$request->comment_type,'comment'=>$request->comment,'is_live'=>$is_liveType]);
        }

        if($comment){
            $user = User::whereId(auth()->user()->id)->select('name','surname')->first();
            $comment->created_date = $comment->created_at->format('d/m/Y H:i:s');
            return ['data'=>$comment,'user'=>($user->name??'-').($user->surname??'-'),'status'=>true];
        }else{
            return ['data'=>'','status'=>false];
        }

    }

    public function deleteComment(Request $request){
        $comment = Comment::where('id',$request->id)->first();
        $file = $comment->file ?? null;
        if($file && file_exists(public_path('assets/'.$file))){
            unlink(public_path('assets/'.$file));
        }
        return Comment::where('id',$request->id)->delete();
    }

}
