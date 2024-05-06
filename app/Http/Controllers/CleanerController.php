<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientSite;
use App\Models\ClientSiteShift;
use App\Models\User;
use App\Models\{WorkOrder, WorkOrderSubmission};
use App\Models\{WorkOrderCleaner, ClientPortfolio};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\ImageController;
use App\Http\Controllers\Common\ListController;
use App\Http\Controllers\Controller;
use App\Models\AppApihit;
use App\Models\ClientSiteShiftCleanerImage;
use App\Models\ClientSiteShiftCleanerSubmissions;
use App\Models\ClientSiteShiftsDay;
use App\Models\ShiftQuestion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class CleanerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->check()) return redirect()->route('login');

        if(auth()->user()->role == 'admin' || !auth()->user()->is_client){
            $cleaners = User::where('role', 'CLEANER')->where('status','!=','2')->get();
        }else{
            $clients = Client::where('client_id',auth()->user()->id)->get();
            $allSites = ClientSite::whereIn('client_id',$clients->pluck('id')->toArray())->get();
            $allcleaner = ClientSiteShift::whereIn('client_site_id',$allSites->pluck('id')->toArray())->get();
            $cleaners = User::where('role', 'CLEANER')->whereIn('id',$allcleaner->pluck('cleaner_id')->toArray())->get();
        }

        
        return view('pages.cleaners',compact('cleaners'));
        // return view('pages.cleaners');
    }

   
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
    // public function destroy(string $id)
    // {
    //     //
    // }
    public function dashboard(){
        $cleaner_id = auth()->user()->id;
        $allsites = ClientSiteShift::where(['cleaner_id' => $cleaner_id])->get()->pluck('client_site_id')->toArray();
        $sites = ClientSite::with(['city','state','client_site_shift'=>function ($query) use ($cleaner_id) {
            $query->with(['shift_days','shift_submit'=>function($query){
                $query->where('cleaner_id',auth()->user()->id)->where('shift_start',date('Y-m-d'));
            }])->where('cleaner_id', $cleaner_id);
        },'shift_submit'=>function ($query) use ($cleaner_id) {
            $query->where('cleaner_id', $cleaner_id)->where('shift_start','>=',date('Y-m-d 00:00:00'));
        },'shift_submit.before_image','shift_submit.after_image'])->whereIn('id', $allsites)->get();

        return view('cleaners.dashboard',compact('sites'));
    }

    public function myJob(){
        $cleaner_id = auth()->user()->id;
        $allworkOrder = WorkOrderCleaner::where('cleaner_id',auth()->user()->id)->get()->pluck('work_order_id')->toArray();
        $work_orders = WorkOrder::with(['client','site','jobtype','subjobtype','portfolio','client_work','cleaner_work', 'today_work' => function ($query) use ($cleaner_id) {
            $query->where('cleaner_id', $cleaner_id);
        },'work_order_submit_time' => function ($query) use ($cleaner_id) {
            $query->where('cleaner_id', $cleaner_id)->where('shift_start', '>=', date('Y-m-d 00:00:00'));
        },'work_order_submit_time.before_image','work_order_submit_time.after_image'])->whereIn('id',$allworkOrder)->orderBy('completion_date','DESC')->orderBy('schedule_date','DESC')->get();
        // dd($work_orders);

        return view('cleaners.my-jobs',compact('work_orders'));
    }

    public function updateJob(Request $request, $id){
        
    }

    public function startShift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_code' => 'required|exists:client_sites,internal_code',
            'selfie_taken' => 'required|image|max:2048'
        ]);
        $site_data  = ClientSite::where('internal_code', $request->site_code)->first();
        $cleaner_id = auth()->user()->id;

        if($site_data->latitude && $site_data->longitude){
            $distance = ListController::getDistance($request->latitude, $request->longitude, $site_data->latitude??0, $site_data->longitude??0) ?? null;
        }else{
            $distance = 0;
        }
            $site_shift = ClientSiteShift::where(['client_site_id' => $site_data->id, 'cleaner_id' => $cleaner_id])->first();
            if(ClientSiteShiftCleanerSubmissions::where(['cleaner_id' => $cleaner_id,'client_site_shift_id' => $site_shift->id,'shift_start'=> date('Y-m-d',strtotime($request->shift_start)),'status'=>'started'])->exists()){
                return redirect()->back()->with('success','Shift Already Started');

            }

            $image = $request->file('selfie_taken');
            $dateFolder = 'shifts/' . date('Y_m_d',strtotime($request->shift_start));
            $imageupload = ImageController::upload($image, $dateFolder);
            $data = [
                'cleaner_id' => $cleaner_id,
                'client_site_id' => $site_data->id,
                'client_site_shift_id' => $site_shift->id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'selfie_taken' => $imageupload,
                'shift_start' => $request->shift_start,
                'start_distance' => $distance,
                'status'=>'started'
            ];

            $submit = ClientSiteShiftCleanerSubmissions::create($data);

            if ($submit) {
                return redirect()->back()->with('success','Shift Started Successfully.');
            }
            return redirect()->back()->with('success','Shift Started Successfully.');
    }

    public function beforeImage(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'before_image' => 'required|image|max:2048'
        ]);

        $dateFolder = 'shifts/' . date('Y_m_d',strtotime($request->shift_end));
        $shiftImages = null;
        foreach ($request->file('before_image') as $before_image) {
            $before_image_imageupload = ImageController::upload($before_image, $dateFolder);
            $shiftImages[] = ['image_tbl' => 'shift', 'shift_submission_id' => $request->submit_id, 'image_type' => 'before', 'shift_images' => $before_image_imageupload];
        }
        if ($shiftImages != null) {
            if ($shiftImages) ClientSiteShiftCleanerImage::insert($shiftImages);
            return redirect()->back()->with('success', 'Befor Image Uploaded Successfully.');
        }
        return redirect()->back()->with('success', 'Something went wrong!');   
    }
    
    public function afterImage(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'after_image' => 'required|image|max:2048'
        ]);

        $dateFolder = 'shifts/' . date('Y_m_d',strtotime($request->shift_end));
        $shiftImages = null;
        foreach ($request->file('after_image') as $after_image) {
            $after_image_imageupload = ImageController::upload($after_image, $dateFolder);
            $shiftImages[] = ['image_tbl' => 'shift', 'shift_submission_id' => $request->submit_id, 'image_type' => 'after', 'shift_images' => $after_image_imageupload];
        }
        if ($shiftImages != null) {
            if ($shiftImages) ClientSiteShiftCleanerImage::insert($shiftImages);
            return redirect()->back()->with('success', 'After Image Uploaded Successfully.');
        }
        return redirect()->back()->with('success', 'Something went wrong!');  
    }

    public function endShift(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'site_code' => 'required|exists:client_sites,internal_code',
            'finish_salfie_taken' => 'required|image|max:2048',
            'latitude' => 'required',
            'longitude' => 'required',
            'shift_end' => 'nullable',
        ]);

        $site_data  = ClientSite::where('internal_code', $request->site_code)->first();
        $cleaner_id = auth()->user()->id;
        if (!$site_data) {
            return redirect()->back()->with('success','Something went worng!');
        }
        $site_shift = ClientSiteShift::where(['client_site_id' => $site_data->id, 'cleaner_id' => $cleaner_id])->first();
        if(ClientSiteShiftCleanerSubmissions::where(['cleaner_id' => $cleaner_id,'client_site_shift_id' => $site_shift->id,'shift_end'=> $request->shift_end,'status' => 'submitted'])->exists()){
            return redirect()->back()->with('success','Job Finished successfully.');
        }else{
        $distance = ListController::getDistance($request->latitude, $request->longitude, $site_data->latitude??0, $site_data->longitude??0) ?? null;
            $finish_salfie_taken = $request->file('finish_salfie_taken');
            $dateFolder = 'shifts/' . date('Y_m_d',strtotime($request->shift_end));
            $finish_salfie_taken_imageupload = ImageController::upload($finish_salfie_taken, $dateFolder);

            $data = [
                'finish_salfie_taken' => $finish_salfie_taken_imageupload,
                'shift_end' =>$request->shift_end,
                'status' => 'submitted',
                'end_latitude' => $request->latitude ?? null,
                'end_longitude' => $request->longitude ?? null,
                'end_distance' => $distance,
            ];
            $cleanerShift = ClientSiteShiftCleanerSubmissions::where(['id' => $request->submit_id, 'cleaner_id' => $cleaner_id])->first();

            $submit = ClientSiteShiftCleanerSubmissions::where(['id' => $request->submit_id, 'cleaner_id' => $cleaner_id])->update($data);
            if (strtotime(date('Y-m-d ' . $site_shift->avaliable_start_time)) > strtotime($cleanerShift->shift_start) || strtotime(date('Y-m-d ' . $site_shift->avaliable_end_time)) < strtotime($cleanerShift->shift_end)) {
                ClientSiteShiftCleanerSubmissions::where('id',$request->submit_id)->update([
                    'is_approval_boards' => 1,'status'=>'under analysis'
                ]);
            }
            if ($submit) {
                return redirect()->back()->with('success','Job Finished successfully.');
            }
            return redirect()->back()->with('success','Something went worng!');

        }
    }

    public function startWorkShift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'work_order_id' => 'required',
            'site_code' => 'required|exists:client_sites,internal_code',
            'latitude' => 'required',
            'longitude' => 'required',
            'selfie_taken' => 'required|image|max:2048',
            'shift_start' => 'required',
        ]);
        // dd($request->all());

        $site_data  = ClientSite::where('internal_code', $request->site_code)->first();
        $cleaner_id = auth()->user()->id;

        $distance = ListController::getDistance($request->latitude, $request->longitude, $site_data->latitude, $site_data->longitude) ?? null;

        $work_order_data = WorkOrder::whereId($request->work_order_id)->first();
        $managerId = null;

        if ($work_order_data->client_portfolio_id) {
            $managerData = ClientPortfolio::whereId($work_order_data->client_portfolio_id)->first() ?? null;
            if ($managerData) {
                $managerId = $managerData->manager_id;
            }
        }
    
        $image = $request->file('selfie_taken');
        $dateFolder = 'work-order/' . date('Y_m_d', strtotime($request->shift_start));
        $imageupload = ImageController::upload($image, $dateFolder);
        $data = [
            'cleaner_id' => $cleaner_id,
            'site_id' => $work_order_data->client_site_id,
            'work_order_id' => $request->work_order_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'selfie_taken' => $imageupload,
            'shift_start' => date('Y-m-d H:i', strtotime($request->shift_start)),
            'start_distance' => $distance,
            'client_portfolio_id' => $work_order_data->client_portfolio_id ?? null,
            'manager_id' => $managerId
        ];
    
        $submit = WorkOrderSubmission::create($data);
        if ($submit) {
            return redirect()->back()->with('success','Work Order Started successfully.');

        }
        return redirect()->back()->with('success','Something Went Wrong. Please Try Again.');
    }

    public function workBeforeImage(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'before_image' => 'required|image|max:2048'
        ]);

        $dateFolder = 'shifts/' . date('Y_m_d',strtotime($request->shift_end));
        $shiftImages = null;
        foreach ($request->file('before_image') as $before_image) {
            $before_image_imageupload = ImageController::upload($before_image, $dateFolder);
            $shiftImages[] = ['image_tbl' => 'work-order', 'shift_submission_id' => $request->submit_id, 'image_type' => 'before', 'shift_images' => $before_image_imageupload];
        }
        if ($shiftImages != null) {
            if ($shiftImages) ClientSiteShiftCleanerImage::insert($shiftImages);
            return redirect()->back()->with('success', 'Befor Image Uploaded Successfully.');
        }
        return redirect()->back()->with('success', 'Something went wrong!');   
    }
    
    public function workAfterImage(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'after_image' => 'required|image|max:2048'
        ]);

        $dateFolder = 'shifts/' . date('Y_m_d',strtotime($request->shift_end));
        $shiftImages = null;
        foreach ($request->file('after_image') as $after_image) {
            $after_image_imageupload = ImageController::upload($after_image, $dateFolder);
            $shiftImages[] = ['image_tbl' => 'work-order', 'shift_submission_id' => $request->submit_id, 'image_type' => 'after', 'shift_images' => $after_image_imageupload];
        }
        if ($shiftImages != null) {
            if ($shiftImages) ClientSiteShiftCleanerImage::insert($shiftImages);
            return redirect()->back()->with('success', 'After Image Uploaded Successfully.');
        }
        return redirect()->back()->with('success', 'Something went wrong!');  
    }

    public function endWorkShift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_code' => 'required|exists:client_sites,internal_code',
            'finish_salfie_taken' => 'required|image|max:2048',
            'latitude' => 'required',
            'longitude' => 'required',
            'shift_end' => 'required',
        ]);
        
        if (WorkOrderSubmission::where(['id' => $request->work_order_id, 'shift_end' => date('Y-m-d H:i', strtotime($request->shift_end)), 'status' => 'submitted'])->exists()) {
            return redirect()->back()->with('success','Work Order Submitted successfully.');
        } else {

            $site_data  = ClientSite::where('internal_code', $request->site_code)->first();
            $cleaner_id = auth()->user()->id;
            $distance = ListController::getDistance($request->latitude, $request->longitude, $site_data->latitude, $site_data->longitude) ?? null;
            
            $finish_salfie_taken = $request->file('finish_salfie_taken');
            $dateFolder = 'work-order/' . date('Y_m_d', strtotime($request->shift_end));
            $finish_salfie_taken_imageupload = ImageController::upload($finish_salfie_taken, $dateFolder);
            $data = [
                'finish_salfie_taken' => $finish_salfie_taken_imageupload,
                'shift_data' => $request->shift_questions ?? null,
                'shift_end' => date('Y-m-d H:i', strtotime($request->shift_end)),
                'status' => 'submitted',
                'end_latitude' => $request->latitude ?? null,
                'end_longitude' => $request->longitude ?? null,
                'end_distance' => $distance,
            ];
            $submit = WorkOrderSubmission::where(['id' => $request->work_order_id, 'cleaner_id' => $cleaner_id])->update($data);
            if ($submit) {
                return redirect()->back()->with('success','Work Order Submitted successfully.');
            }
                return redirect()->back()->with('success','Something Went Wrong. Please Try Again.');
        }
    }

}