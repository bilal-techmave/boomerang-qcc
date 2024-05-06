<?php

namespace App\Http\Controllers;

use App\Models\ManageStorage;
use App\Http\Requests\StoreManageStorageRequest;
use App\Http\Requests\UpdateManageStorageRequest;
use App\Models\GeoCity;
use App\Models\GeoState;
use Illuminate\Http\Request;
use App\Models\{User, StorageItem, StorageItemsHistory};
use App\Models\ManageItemAddon;
use App\Models\ManageItem;
use App\Models\MovementStorage;
use DB;

class ManageStorageController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:storage-view')->only(['index', 'show']);
        $this->middleware('role:storage-create')->only(['create', 'store']);
        $this->middleware('role:storage-edit')->only(['edit', 'update']);
        $this->middleware('role:storage-movement')->only(['storage_movement']);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allstroage = ManageStorage::with('storageItems')->orderBy('id','DESC')->get();
        return view('stroage-managements.storage',compact('allstroage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supervisors    = User::where('role','staff')->orWhere('role','person')->get();
        $cities         = GeoCity::get();
        $states         = GeoState::get();
        return view('stroage-managements.storage-add',compact('supervisors','cities','states'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManageStorageRequest $request)
    {
        $field = $request->except('_token');
        ManageStorage::create($field);
        // $allstroage = ManageStorage::all();
        return redirect()->route('storage.storage.index')->with('success','Storage Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ManageStorage $manageStorage,$id)
    {
        $manageStorage=ManageStorage::whereId($id)->with(['getUserDetail','city','state'])->first();
        $items_history = StorageItemsHistory::with(['formStore', 'toStore', 'user'])->where('storage_id', $id)->get();
        $items = StorageItem::where('storage_id',$id)
                ->join('manage_items', 'manage_items.id', '=', 'storage_items.item_id')
                ->select('manage_items.barcode', 
                         'manage_items.name', 
                         'manage_items.manufacturer', 
                         'manage_items.type',
                         'manage_items.attachment',
                         'storage_items.user_id', 
                         'storage_items.storage_id',
                         'storage_items.storage_form',  
                         'storage_items.storage_to', 
                         'storage_items.action', 
                         'storage_items.qty',
                         'storage_items.created_at',)
                ->get();
        return view('stroage-managements.storage-view',compact('manageStorage','items', 'items_history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($manageStorage)
    {
        $manageStorage=ManageStorage::whereId($manageStorage)->first();
        $supervisors    = User::where('role','staff')->get();
        $cities         = GeoCity::get();
        $states         = GeoState::get();
        return view('stroage-managements.storage-edit',compact('manageStorage','cities','states','supervisors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManageStorageRequest $request, ManageStorage $manageStorage,$id)
    {
        $field = $request->except('_method','_token');
        if($request->is_fixed_storage !=''){
            $field['is_fixed_storage'] = '1';
        }else{
            $field['is_fixed_storage'] = '0';
        }
        ManageStorage::whereId($id)->update($field);
        return redirect()->route('storage.storage.index')->with('success','Storage Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManageStorage $manageStorage)
    {
        //
    }

    public function storage_movement(){
        $manageStorage=ManageStorage::get();
        $manageItem= ManageItem::get();
        return view('stroage-managements.storage-movement',compact('manageStorage','manageItem'));
    }

    public function deleteItems(Request $request)
    {
        $id=$request->input('itemId');
        $deleteData=ManageItemAddon::whereId($id)->delete();
        if($deleteData)
        {
            return response()->json([
                        'success'=>'200',
                        'message'=>'Item Delete  successfully.',
                    ]);
        }
    }



}