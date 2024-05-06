<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // dd(Auth::user());
        $this->middleware('role:role-list', ['only' => ['index','show']]);
        $this->middleware('role:role-create', ['only' => ['create','store']]);
        $this->middleware('role:role-edit', ['only' => ['edit','update']]);
        $this->middleware('role:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $roles = Role::where('slug','!=','admin')->orderBy('id', 'DESC')->get();
        return view('users.roles.role', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $permission_arr = $this->getPermission();
        return view('users.roles.role-add', compact('permission_arr'),);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'nullable',
            'internal_code'=>'required'
        ]);

        $fields = $request->except(['_token','permission']);
        $fields['slug'] = Str::slug($fields['name']);
        $role = Role::create($fields);
        $role_id= DB::table('roles')->latest()->first()->id;
        // $role->syncPermissions($request->input('permission'));
        if($request->permission){
            $count = count($request->permission);
            for ($i=0; $i < $count; $i++) {
                $permission['role_id'] = $role_id;
                $permission['permission_id'] = $request->permission[$i];
                DB::table('roles_permissions')->insert($permission);
            }
        }
        return redirect()->route('user.roles.index')->with('success', 'Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("roles_permissions", "roles_permissions.permission_id", "=", "permissions.id")
            ->where("roles_permissions.role_id", $id)
            ->get();
        return view('users.roles.role', compact('role', 'rolePermissions'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $permission_arr = $this->getPermission();
        $role = Role::find($id);
        $role_permission = DB::table('roles_permissions')->where('role_id',$id)->get()->pluck('permission_id')->toArray();
        return view('users.roles.role-edit', compact('role', 'role_permission','permission_arr'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        DB::table('roles_permissions')->where('role_id',$id)->delete();
        if($request->permission){
            foreach($request->permission as $permission){
                DB::table('roles_permissions')->insert(['role_id'=>$id,'permission_id'=>$permission]);
            }
        }
        return redirect()->route('user.roles.index')->with('success', 'Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('user.roles.index')->with('success', 'Role deleted successfully');
    }

    public function getPermission(){
        $permission = Permission::get();
        $permission_arr = [];
        // dd($permission);
        foreach ($permission as $permission_data) {

            if(!isset($permission_arr[$permission_data->title])){
                $permission_arr[$permission_data->title]["fields"][] =$permission_data->type;
                $permission_arr[$permission_data->title]['mainname'][] = $permission_data->name;
                foreach($permission_arr[$permission_data->title]["fields"] as $kk=>$fields){
                    if($fields == $permission_data->type){
                        $permission_arr[$permission_data->title]['name'][$permission_data->name][$kk] = [
                            'id' => $permission_data->id,
                            'slug' => $permission_data->slug,
                            'type' => $permission_data->type
                        ];
                    }elseif(!isset($permission_arr[$permission_data->title]['name'][$permission_data->name][$kk])){
                        $permission_arr[$permission_data->title]['name'][$permission_data->name][$kk]=null;
                    }
                }

            }else{
                if(!in_array($permission_data->type,$permission_arr[$permission_data->title]['fields'])){
                    $permission_arr[$permission_data->title]['fields'][] = $permission_data->type;
                }
                if(!in_array($permission_data->name,$permission_arr[$permission_data->title]['mainname'])){
                    $permission_arr[$permission_data->title]['mainname'][] = $permission_data->name;
                }
                foreach($permission_arr[$permission_data->title]["fields"] as $kk=>$fields){
                    if($fields == $permission_data->type){
                        $permission_arr[$permission_data->title]['name'][$permission_data->name][$kk] = [
                            'id' => $permission_data->id,
                            'slug' => $permission_data->slug,
                            'type' => $permission_data->type
                        ];
                    }elseif(!isset($permission_arr[$permission_data->title]['name'][$permission_data->name][$kk])){
                        $permission_arr[$permission_data->title]['name'][$permission_data->name][$kk]=null;
                    }
                }
            }

        }
        return $permission_arr;
    }

    public function unique_check(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(Role::where($request->colname, urldecode($request->colvalue))->exists()){
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
