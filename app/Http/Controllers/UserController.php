<?php
namespace App\Http\Controllers;

use App\Helpers\DataTableHelper;
use App\Http\Controllers\Common\ImageController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\WebSiteMail;
use App\Models\BaseAddress;
use App\Models\BaseDocument;
use App\Models\CleanerInduction;
use App\Models\Contractor;
use App\Models\Department;
use App\Models\GeoCity;
use App\Models\GeoCountry;
use App\Models\GeoState;
use App\Models\Role;
use App\Models\User;
use App\Models\UserContractor;
use App\Models\UserDepartment;
use App\Models\UsersRole;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::with('rolename')->orderBy('id','DESC')->whereNotIn('role',['admin'])->where('status','!=','2')->get();
        // dd($users);
        return view('human-resources.teamplayer.teamplayer',compact('users'));
    }


    public function indexAjax(Request $request)
    {
        $columnMapping = [
            'id' => 'id',
            'Name' => 'name',
            'Email' => 'email',
            'Team Player Type' => 'role',
            'Status' => 'status',
            'Action' => 'id',
        ];
        $relations = ['rolename'];
        $pageStr = "user_table";
        $query = User::with($relations)->whereNotIn('role',['admin']);
        return DataTableHelper::getData($request, $query, $columnMapping,$pageStr);
    }




    function validationData($request,$userData=null)
    {
        $validData = null;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email',
            'dateofbirth' => 'nullable|date',
            'phone_number' => 'required|min:8|max:13',
            'second_number' => 'nullable|min:8|max:13',
            'country' => 'nullable',
            'tfn' => 'nullable',
            'abn'=>'nullable',
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
            'address_number.*'=>'required',
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

        if(!$userData){
            $validator = Validator::make($request->all(), [
                'team_player_role' => 'nullable',
                'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'nullable|min:6',
                'is_multipal_shift' => 'nullable'
            ]);
        }else{
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $counties = GeoCountry::get();
        $cities = GeoCity::get();
        $states = GeoState::get();
        $allroles = Role::where('slug','!=','admin')->get();
        $contractors = Contractor::where('status','1')->get();
        $departments = Department::where('status','1')->get();
        return view('human-resources.teamplayer.teamplayer-add',compact('allroles','counties','cities','states','contractors','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all(),$request->file());
        // $validationData = $this->validationData($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email',
            'dateofbirth' => 'nullable|date',
            'phone_number' => 'required|min:8|max:13',
            'second_number' => 'nullable|min:8|max:13',
            'country' => 'nullable',
            'tfn' => 'nullable',
            'abn'=>'nullable',
            'notes' => 'nullable'
        ]);
        $validData = null;
        if ($validator->fails()) {
            $validator->errors()->add('tab_name', 'basic_info');
            $validData = $validator->errors();
        }
        if ($validData) {
            return  redirect()->back()->withInput()->withErrors($validData);
        }

        $teamPlayerData = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'dateofbirth' => $request->dateofbirth,
            'phone_number' => $request->phone_number,
            'second_number' => $request->second_number,
            'geo_country' => $request->country,
            'tfn' => $request->tfn,
            'role'=>$request->team_player_role??'staff',
            'abn'=>$request->abn,
            'notes' => $request->notes,
            'password'=>Hash::make($request->password) ?? null,
            'login_status'=>$request->login_status ?? 0,
            'status'=>1,
            'is_multipal_shift' => $request->is_multipal_shift ?? 0
        ];
        $userNew = User::create($teamPlayerData);

        if($request->team_player_mainrole){
            UsersRole::updateOrCreate(['user_id'=>$userNew->id],['role_id'=>$request->team_player_mainrole]);
        }

        $user_id = $userNew->id;

        $baseAddress = [];
        if ($request->address_number && !empty($request->address_number)) {
            foreach ($request->address_number as $kk => $add_num) {
                $baseAddress[] = [
                    'type' => $request->team_player_role??'staff',
                    'data_id' => $user_id,
                    'unit' => $request->unit[$kk] ?? null,
                    'address_number' => $add_num ?? null,
                    'street_address' => $request->street_address[$kk] ?? null,
                    'suburb' => $request->suburb[$kk] ?? null,
                    'geo_city_id' => $request->city[$kk] ?? null,
                    'geo_state_id' => $request->state[$kk] ?? null,
                    'zipcode' => $request->zipcode[$kk] ?? null,
                    'po_box' => $request->po_box[$kk]??null,
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

        $contractorUsers = [];
        if ($request->contractor && !empty($request->contractor)) {
            foreach ($request->contractor as $kk => $contract) {
                $contractorUsers[] = [
                    'contractor_id' => $contract,
                    'user_id' => $user_id
                ];
            }
        }
        if ($contractorUsers && !empty($contractorUsers)) {
            UserContractor::insert($contractorUsers);
        }

        $departmentUsers = [];
        if ($request->department && !empty($request->department)) {
            foreach ($request->department as $kk => $contract) {
                $departmentUsers[] = [
                    'department_id' => $contract,
                    'user_id' => $user_id
                ];
            }
        }
        if ($departmentUsers && !empty($departmentUsers)) {
            UserDepartment::insert($departmentUsers);
        }

        $userDocuments = [];
        if ($request->document_type && !empty($request->document_type)) {
            foreach ($request->document_type as $kk => $docs) {
                if($request->hasFile($request->file('documentImages')[$kk])){
                    $image = $request->file('documentImages')[$kk];
                    $dateFolder = $request->team_player_role.'/' . now()->format('Y_m_d');
                    $imageupload = ImageController::upload($image, $dateFolder);
                    $userDocuments[] = [
                        'docs_type' => $docs,
                        'reference_number' => $request->reference_number[$kk],
                        'expire_date' => $request->expireDate[$kk],
                        'user_id' => $user_id,
                        'docs_image' => $imageupload,
                        'user_type' => $request->team_player_role??'staff',
                        'doc_upload_type'=>'docs'
                    ];
                }
            }
        }
        if ($userDocuments && !empty($userDocuments)) {
            BaseDocument::insert($userDocuments);
        }

        $reqDocsUsers = [];
        if ($request->request_document_type && !empty($request->request_document_type)) {
            foreach ($request->request_document_type as $kk => $doctype) {
                $reqDocsUsers[] = [
                    'docs_type' => $doctype,
                    'user_id' => $user_id,
                    'user_type' => $request->team_player_role??'staff',
                    'doc_upload_type'=>'request'
                ];
            }
        }

        if ($reqDocsUsers && !empty($reqDocsUsers)) {
            BaseDocument::insert($reqDocsUsers);
        }


        Mail::to($request->email)->send(new WebSiteMail('new_user','Lost Password',['NAME'=>$request->name,'NEW_PASSWORD'=>$request->password,'LINK_BOOMERANG'=>str_replace('https://','',route('login'))]));

        return redirect()->route('hr.team-player.index')->with('success','Team Player Created Successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::with('country')->whereId($id)->first();
        // dd($user->id);
        $userAddress = BaseAddress::with(['city', 'state'])->where(['data_id' => $user->id, 'type' => $user->role])->get();
        $userDepartment = UserDepartment::with('department')->where(['user_id' => $user->id])->get();
        $userContractor = UserContractor::with('contarctor')->where(['user_id' => $user->id])->get();

        $userDocuments = BaseDocument::where(['user_type' => $user->role, 'user_id' => $user->id,'doc_upload_type' => 'docs'])->get();
        $reqDocuments = BaseDocument::where(['user_id'=>$user->id,'doc_upload_type'=>'request','user_type' => $user->role])->get();
        $cleanerInduction = CleanerInduction::with(['signature'=>function($query) use($id){
            $query->where('cleaner_id',$id)->get();
        }])->get();
        return view('human-resources.teamplayer.teamplayer-view',compact('user','userAddress','userDepartment','userContractor','userDocuments','reqDocuments','cleanerInduction'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($team_player) : View
    {
        $counties = GeoCountry::get();
        $cities = GeoCity::get();
        $states = GeoState::get();
        $allroles = Role::where('slug','!=','admin')->get();
        $contractors = Contractor::where('status','1')->get();
        $departments = Department::where('status','1')->get();
        $user = User::with(['roledata'])->whereId($team_player)->first();
        $userRole = $user->roles->pluck('name','name')->all();
        $userAddress = BaseAddress::with(['city', 'state'])->where(['data_id' => $user->id, 'type' => $user->role])->get();
        $userDepartment = UserDepartment::with('department')->where(['user_id' => $user->id])->get();
        $userContractor = UserContractor::with('contarctor')->where(['user_id' => $user->id])->get();
        $userDocuments = BaseDocument::where(['user_type' => $user->role, 'user_id' => $user->id,'doc_upload_type' => 'docs'])->get();
        $reqDocuments = BaseDocument::where(['user_id'=>$user->id,'doc_upload_type'=>'request','user_type' => $user->role])->get();

        return view('human-resources.teamplayer.teamplayer-edit',compact('user','allroles','userRole','counties','cities','states','contractors','departments','userAddress','userDocuments','reqDocuments','userContractor','userDepartment'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $team_player): RedirectResponse
    {
        
        if($request->password !=""){
            $password = Hash::make($request->password) ?? $team_player->password;
        }
        else{
            $password = $team_player->password;
        }
        $teamPlayerData = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'dateofbirth' => $request->dateofbirth,
            'phone_number' => $request->phone_number,
            'second_number' => $request->second_number,
            'geo_country' => $request->country,
            'tfn' => $request->tfn,
            'role'=>$request->team_player_role??'staff',
            'abn'=>$request->abn,
            'notes' => $request->notes,
            'password'=>$password,
            'login_status'=>$request->login_status ?? 0,
            'is_multipal_shift' => $request->is_multipal_shift ?? 0
        ];
        User::whereId($team_player->id)->update($teamPlayerData);

        $user_id = $team_player->id;
        if($request->team_player_mainrole){
            if(UsersRole::where(['user_id'=>$user_id])->exists()){
                UsersRole::where(['user_id'=>$user_id])->update(['role_id'=>$request->team_player_mainrole]);
            }else{
                UsersRole::create(['user_id'=>$user_id,'role_id'=>$request->team_player_mainrole]);
            }

        }

        $baseAddress = [];
        if ($request->address_number && !empty($request->address_number)) {
            foreach ($request->address_number as $kk => $add_num) {
                $baseAddressNew = [
                    'type' => $request->team_player_role??'staff',
                    'data_id' => $user_id,
                    'unit' => $request->unit[$kk] ?? null,
                    'address_number' => $add_num ?? null,
                    'street_address' => $request->street_address[$kk] ?? null,
                    'suburb' => $request->suburb[$kk] ?? null,
                    'geo_city_id' => $request->city[$kk] ?? null,
                    'geo_state_id' => $request->state[$kk] ?? null,
                    'zipcode' => $request->zipcode[$kk] ?? null,
                    'po_box' => $request->po_box[$kk]??null,
                    'is_this_main_address' => $request->is_main_address[$kk] ?? 0,
                    'is_this_mail_address' => $request->is_mail_address[$kk] ?? 0,
                    'status' => 'active',
                    'imported_address' => $request->imported_address[$kk] ?? null,
                ];
                $baseAddress[] = $baseAddressNew;
            }
        }
        if ($baseAddress && !empty($baseAddress)) {
            BaseAddress::insert($baseAddress);
        }

        $contractorUsers = [];
        if ($request->contractor && !empty($request->contractor)) {
            foreach ($request->contractor as $kk => $contract) {
                $contractorUsersNew = [
                    'contractor_id' => $contract,
                    'user_id' => $user_id
                ];
                $contractorUsers[] = $contractorUsersNew;
            }
        }
        if ($contractorUsers && !empty($contractorUsers)) {
            UserContractor::insert($contractorUsers);
        }

        $departmentUsers = [];
        if ($request->department && !empty($request->department)) {
            foreach ($request->department as $kk => $contract) {
                $departmentUsersNew = [
                    'department_id' => $contract,
                    'user_id' => $user_id
                ];
                $departmentUsers[] = $departmentUsersNew;
            }
        }
        if ($departmentUsers && !empty($departmentUsers)) {
            UserDepartment::insert($departmentUsers);
        }

        $userDocuments = [];
        if ($request->document_type && !empty($request->document_type)) {
            foreach ($request->document_type as $kk => $docs) {
                $image = $request->file('documentImages')[$kk]??null;
                $dateFolder = $request->team_player_role.'/' . now()->format('Y_m_d');
                if($image){
                    $imageupload = ImageController::upload($image, $dateFolder);
                }
                if(isset($imageupload)){
                    $userDocumentsNew = [
                        'docs_type' => $docs,
                        'reference_number' => $request->reference_number[$kk]??null,
                        'expire_date' => $request->expireDate[$kk],
                        'user_id' => $user_id,
                        'docs_image' => $imageupload,
                        'user_type' => $request->team_player_role??'staff',
                        'doc_upload_type'=>'docs'
                    ];
                    $userDocuments[] = $userDocumentsNew;
                }
            }
        }
        if ($userDocuments && !empty($userDocuments)) {
            BaseDocument::insert($userDocuments);
        }

        $reqDocsUsers = [];
        if ($request->request_document_type && !empty($request->request_document_type)) {
            foreach ($request->request_document_type as $kk => $doctype) {
                $reqDocsUsers[] = [
                    'docs_type' => $doctype,
                    'user_id' => $user_id,
                    'status'=>0,
                    'user_type' => $request->team_player_role??'staff',
                    'doc_upload_type'=>'request'
                ];
            }
        }

        if ($reqDocsUsers && !empty($reqDocsUsers)) {
            BaseDocument::insert($reqDocsUsers);

        }

        return redirect()->route('hr.team-player.index')->with('success','User updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('hr.team-player.index')->with('success','User deleted successfully');
    }


    public function waiting_approval(){
        $cleaners = User::where(['role'=>'cleaner','status'=>0])->orderBy('id','DESC')->get();
        return view('human-resources.waiting-approval',compact('cleaners'));
    }

    public function approval_view($id): View
    {
        $user = User::with('country')->whereId($id)->first();
        $userAddress = BaseAddress::with(['city', 'state'])->where(['data_id' => $user->id, 'type' => $user->role])->get();
        $userDepartment = UserDepartment::with('department')->where(['user_id' => $user->id])->get();
        $userContractor = UserContractor::with('contarctor')->where(['user_id' => $user->id])->get();
        $userDocuments = BaseDocument::where(['user_type' => $user->role, 'user_id' => $user->id,'doc_upload_type' => 'docs'])->get();
        $reqDocuments = BaseDocument::where(['user_id'=>$user->id,'doc_upload_type'=>'request','user_type' => $user->role])->get();
        return view('human-resources.approval-view',compact('user','userAddress','userDepartment','userContractor','userDocuments','reqDocuments'));
    }


    public function profile(Request $request){
        $user_data = auth()->user();
        if($request->isMethod('POST')){

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'surname' => 'required',
                'dateofbirth' => 'nullable|date',
                'phone_number' => 'required',
                'second_number' => 'nullable',
                'oldpassword' => 'nullable',
                'password' => 'nullable|min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'nullable|min:6'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->oldpassword && !Hash::check($request->oldpassword, $user_data->password)) {
                return redirect()->back()->withErrors($validator)->withInput();
            }else{
                $userdata = [
                    'name'=> $request->name ??  $user_data->name,
                    'surname'=> $request->surname ??  $user_data->surname,
                    'dateofbirth'=> $request->dateofbirth ??  $user_data->dateofbirth,
                    'phone_number'=> $request->phone_number ??  $user_data->phone_number,
                    'second_number'=> $request->second_number ??  $user_data->second_number
                ];
                if($request->password){
                    $userdata['password'] = Hash::make($request->password);
                }

                User::whereId($user_data->id)->update($userdata);
                return redirect()->back()->with('success','User data updated successfully.');
            }
        }
        return view('pages.profile',compact('user_data'));
    }



    public function unique_check(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(User::where($request->colname, urldecode($request->colvalue))->exists()){
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
