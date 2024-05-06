<?php

namespace App\Http\Controllers;

use App\Models\ManageItem;
use App\Http\Requests\UpdateManageItemRequest;
use App\Http\Controllers\Common\ImageController;
use App\Models\{ItemMaintenance, MainCompany};
use App\Models\ManageItemAddon;
use App\Models\{MovementStorage, StorageItem, StorageItemsHistory, ManageStorage};
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ManageItemController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:storage-item-view')->only(['index', 'show']);
        $this->middleware('role:storage-item-create')->only(['create', 'store','addItem']);
        $this->middleware('role:storage-item-edit')->only(['edit', 'update','removeItem']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = '';
        $manufacturer = '';
        $type = '';
        $product_code = '';
        $allitems = ManageItem::orderBy('id', 'DESC')->get();
        return view('stroage-managements.items.item', compact('allitems', 'name', 'manufacturer', 'type', 'product_code'));
    }


    public function itemFilter(Request $request)
    {
        $query = ManageItem::orderBy('id', 'DESC');

        $name         = $request->input('name');
        $manufacturer = $request->input('manufacturer');
        $type         = $request->input('type');
        $product_code = $request->input('product_code');

        if ($name) {
            $query = $query->where('name', $name);
        }
        if ($manufacturer) {
            $query = $query->where('manufacturer', $manufacturer);
        }
        if ($type) {
            $query = $query->where('type', $type);
        }
        if ($product_code) {
            $query = $query->where('product_code', $product_code);
        }


        $allitems = $query->get();
        return view('stroage-managements.items.item', compact('allitems', 'name', 'manufacturer', 'type', 'product_code'));
    }
    /**}
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ManageItemAddon = ManageItemAddon::orderBy('id', 'DESC')->get();
        $suppliers = Supplier::where(['status' => '1'])->get();
        $companies = MainCompany::get();
        return view('stroage-managements.items.item-add', compact('ManageItemAddon', 'suppliers', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->except(['_token', 'uploadAttachment']);
        if ($request->hasFile('uploadAttachment')) {
            $uploadAttachment = $request->file('uploadAttachment');
            $dateFolder = 'items/addone';
            $uploadAttachment_imageupload = ImageController::upload($uploadAttachment, $dateFolder);
            $field['attachment'] = $uploadAttachment_imageupload;
        }

        $itemsdata = ManageItem::create($field);
        return redirect()->route('storage.items.index')->with('success', 'Basic Info Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ManageItem $manageItem, $id)
    {
        $items = ManageItem::with('supplier', 'company')->whereId($id)->first();
        $ItemAddon = ManageItemAddon::where('manage_item_id',$id)->orderBy('id', 'DESC')->get();
        $maintenances = ItemMaintenance::with(['user'])->where('manage_item_id',$id)->orderBy('id', 'DESC')->get();
        return view('stroage-managements.items.item-view', compact('items', 'ItemAddon','maintenances',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($manageItem)
    {
        $items = ManageItem::with('company')->whereId($manageItem)->first();
        $companies = MainCompany::get();
        $suppliers = Supplier::where(['status' => '1'])->get();
        $ItemAddon = ManageItemAddon::where('manage_item_id',$manageItem)->orderBy('id', 'DESC')->get();
        return view('stroage-managements.items.item-edit',compact('items','ItemAddon','suppliers', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $manageItem)
    {
        $items_data = [
            "name" => $request->name,
            "type"=>$request->type,
            "serial"=>$request->serial,
            "supplier_id"=>$request->supplier_id,
            "manufacturer"=>$request->manufacturer,
            "price_cost"=>$request->price_cost,
            "barcode"=>$request->barcode,
            "product_code"=>$request->product_code,
            "expire_date"=>$request->expire_date,
            "description"=>$request->description,
            "observation"=>$request->observation,
            "company_id"=>$request->company_id,
            "website"=>$request->website,
        ];
        if ($request->hasFile('uploadAttachment')) {
            $uploadAttachment = $request->file('uploadAttachment');
            $dateFolder = 'items/addone';
            $uploadAttachment_imageupload = ImageController::upload($uploadAttachment, $dateFolder);
            $items_data['attachment'] = $uploadAttachment_imageupload;
        }
        ManageItem::whereId($manageItem)->update($items_data);

        $manageItemData = [];
        if($request->item_type && !empty($request->item_type)){
            foreach ($request->item_type as $key => $value) {
                if($request->has('documentImages') && $request->file('documentImages')[$key]){
                    $uploadAttachment = $request->file('documentImages')[$key];
                    $dateFolder = 'items/addone';
                    $uploadAttachmentImage= ImageController::upload($uploadAttachment,$dateFolder);
                    $manageItemData[] =[
                        "manage_item_id" => $manageItem,
                        "item_type" => $value,
                        "image" => $uploadAttachmentImage
                    ];
                }else{
                    $manageItemData[] =[
                        "manage_item_id" => $manageItem,
                        "item_type" => $value
                    ];
                }

            }
        }

        if($manageItemData && !empty($manageItemData)){
            ManageItemAddon::insert($manageItemData);
        }
        return redirect()->route('storage.items.index')->with('success', 'Item Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManageItem $manageItem)
    {
        return response()->json([
            'success' => '200',
            'message' => 'Done',
        ]);
    }

    public function addItem(Request $request)
    {
        // die;
        Artisan::call('cache:clear');
        $itemId     = $request->input('itemId');
        $qty        = $request->input('qty');
        $storage_id = $request->input('storageId');
        
        MovementStorage::where(['storage_id' => $storage_id, 'item_id' => $itemId])->delete();
        MovementStorage::insert(array('storage_id' => $storage_id, 'item_id' => $itemId, 'qty' => $qty));
        $datas = MovementStorage::where(['storage_id' => $storage_id, 'movement_storage' => '1'])->pluck('item_id')->toArray();
        $dummyData = ManageItem::whereIn('id', $datas)->with('getItemQty')->get();
        return response()->json([
            'success' => '200',
            'message' => 'Item Added Successfully',
            'data' => $dummyData
        ]);
    }

    public function removeItem(Request $request)
    {
        Artisan::call('cache:clear');
        $itemId = $request->input('itemId');
        MovementStorage::where('item_id', $itemId)->delete();
        return response()->json([
            'success' => '200',
            'message' => 'Item Deleted Successfully',
        ]);
    }

    public function removeDummyItem(Request $request)
    {
        Artisan::call('cache:clear');
        $addItemId = $request->input('addItemId');
        MovementStorage::where('item_id', $addItemId)->delete();
        return response()->json([
            'success' => '200',
            'message' => 'Store Item Deleted Successfully',
        ]);
    }

    public function addMovement(Request $req)
    {
        // dd($req->all());
        try {
            $dataArray = json_decode($req->input('table_data'), true);
            $documentType = "";
            if ($req->hasFile("documentType")) {
                $files = $req->file("documentType");
                $destinationPath = "public/assets/storage/movement";
                $file_name = md5(uniqid()) . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
                $documentType = "$destinationPath/".$file_name;
            }

            $recordsToInsert = [];

            foreach ($dataArray as $item) {

                $record = [
                    'storage_id'        => $req->storage_id,
                    'item_id'           => $item['item_id'],
                    'qty'               => $item['qty'],
                    'document_ref_no'   => $req->documentReferenceNumber,
                    'referalDocument'   => $documentType,
                    'user_id'           => auth()->user()->id,
                    'action'            => $req->action,
                    'reason'            => $req->p_reason,
                ];

                $recordsToInsert[] = $record;

                $exists = StorageItem::where('storage_id', $req->storage_id)->where('item_id', $item['item_id'])->exists();

                if($exists){

                    $qty = StorageItem::where('storage_id', $req->storage_id)->where('item_id', $item['item_id'])->first('qty');
                    $qty = StorageItem::where('storage_id', $req->storage_id)->where('item_id', $item['item_id'])->update(
                        [
                            'qty'              => $qty->qty+$item['qty'],
                            'user_id'        => auth()->user()->id,
                        ]);
                }else{

                    StorageItem::insert($record);
                }
            }
            // Insert the records into the database using the create() function
            StorageItemsHistory::insert($recordsToInsert);

            return redirect()->route('storage.movement')->with('success', 'Movement Added Successfully');
        }catch (\Exception $e){
            return redirect()->route('storage.movement')->with('error', 'Something went wrong try again!');
        }
    }

    public function updateMovement(Request $req)
    {
        try {
            $dataArray = json_decode($req->input('table_data'), true);
            // dd($dataArray[0]);
            $recordsToInsert = [];
            $recordsToInsert_history = [];
            
            foreach ($dataArray as $item) {
                $storageItem = StorageItem::find($item['storage_item_id']);
            
                if ($storageItem) {
                    $updatedQty = $storageItem->qty - $item['qtyMov'];
            
                    if ($updatedQty > 0) {
                        $storageItem->update(['qty' => $updatedQty]);
                    } else {
                        $storageItem->delete();
                    }
            
                    $record = [
                        'storage_id'       => $req->storage_transfer,
                        'storage_form'     => $req->storage_id,
                        'storage_to'       => $req->storage_transfer,
                        'item_id'          => $storageItem->item_id,
                        'document_ref_no'  => $storageItem->document_ref_no,
                        'referalDocument'  => $storageItem->referalDocument,
                        'qty'              => $item['qtyMov'],
                        'user_id'          => auth()->user()->id,
                        'action'           => $req->action == 'MANUAL_TRANSFER' ? 'MANUAL TRANSFER' : $req->action,
                        'reason'           => $req->t_reason,
                        'status'           => '0',
                    ];
            
                    $record_history = array_merge($record, [
                        'storage_id'   => $req->storage_id,
                        'storage_form' => $req->storage_id,
                        'status'       => '0',
                    ]);
            
                    $recordsToInsert[] = $record;
                    $recordsToInsert_history[] = $record_history;
                }
            }
                StorageItem::insert($recordsToInsert);
                StorageItemsHistory::insert($recordsToInsert_history);

            return redirect()->route('storage.movement')->with('success', 'Items Transferred Successfully.');
        }catch (\Exception $e){
            return redirect()->route('storage.movement')->with('error', 'Something went wrong try again!');
        }
    }

    public function updateMovementFinished(Request $req)
    {
        try {
            // dd($req->all());
            $dataArray = json_decode($req->input('table_data'), true);
            $recordsToInsert = [];

            foreach ($dataArray as $item) {
                if(($item['qty'] - $item['qtyMov']) > 0 ){
                    StorageItem::where('id', $item['storage_item_id'])->update(['qty' => ($item['qty'] - $item['qtyMov']), 'action' => $req->action, 'status' => '2']);
                }else{
                    StorageItem::where('id', $item['storage_item_id'])->delete();
                }

                $record = [
                    'storage_id'  => $req->storage_id,
                    'storage_to'  => $req->storage_transfer,
                    'item_id'     => $item['item_id'],
                    'qty'         => $item['qtyMov'],
                    'user_id'     => auth()->user()->id,
                    'action'      => $req->action,
                    'reason'      => $req->t_reason,
                    'status'      => '2',
                ];

                $recordsToInsert[] = $record;
            }
            StorageItemsHistory::insert($recordsToInsert);

            return redirect()->route('storage.movement')->with('success', 'Items Finished Successfully.');
        }catch (\Exception $e){
            return redirect()->route('storage.movement')->with('error', 'Something went wrong try again!');
        }
    }



    public function maintenance(Request $request, $manageItem)
    {
        ItemMaintenance::create([
            'manage_item_id'=> $manageItem,
            'user_id'       => auth()->user()->id,
            'comment'       => $request->reason,
        ]);

        return redirect()->back()->with('success', 'Item Moved To Maintenance Successfully');

    }

    public function getStorageItems(Request $request)
    {
        try {
        // $items = StorageItem::where('storage_id', $request->storage_id)->get();
        $items = StorageItem::where('storage_items.storage_id', $request->storage_id)
                ->where(function ($query) {
                    $query->where('storage_items.status', '1')
                        ->orWhere('storage_items.status', '2')->orWhere('storage_items.status', '0');
                })
                ->join('manage_items', 'manage_items.id', '=', 'storage_items.item_id')
                ->select('manage_items.barcode', 
                         'manage_items.name', 
                         'manage_items.manufacturer', 
                         'manage_items.type', 
                         'storage_items.id as storage_item_id', // Alias for storage_items.id
                         'storage_items.storage_id', 
                         'storage_items.item_id', 
                         'storage_items.qty', 
                         'storage_items.document_ref_no', 
                         'storage_items.referalDocument', 
                         'storage_items.storage_to', 
                         'storage_items.user_id', 
                         'storage_items.action', 
                         'storage_items.reason')
                ->get();

        if($items->count() > 0){
            $data = view('stroage-managements.manualTransferHtml', compact('items'))->render();
        }else{
            $data = '';
        }
        // dd($data);
        return response()->json([
            'success' => '200',
            'message' => 'Success',
            'data' => $data,
        ]);

    }catch (\Exception $e){
        return redirect()->route('storage.movement')->with('success', 'Something went wrong try again!');
    }
    }

    public function addItemsHtml(Request $request)
    {
        try {
            
            $items = $request->data;
            if(count($items) > 0){
                $data = view('stroage-managements.addItemsHtml', compact('items'))->render();
            }else{
                $data = '';
            }
            return response()->json([
                'success' => '200',
                'message' => 'Success',
                'data' => $data,
            ]);

        }catch (\Exception $e){
            return redirect()->route('storage.movement')->with('success', 'Something went wrong try again!');
        }
    }

    public function itemUniqueCheck(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(ManageItem::where($request->colname, urldecode($request->colvalue))->exists()){
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