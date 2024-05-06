<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Common\ImageController;
use App\Http\Controllers\Common\ListController;
use App\Http\Controllers\Controller;
use App\Models\AppApihit;
use App\Models\ClientSite;
use App\Models\ClientSiteShift;
use App\Models\ClientSiteShiftCleanerImage;
use App\Models\ClientSiteShiftCleanerSubmissions;
use App\Models\ClientSiteShiftsDay;
use App\Models\ShiftQuestion;
use App\Models\User;
use App\Models\WorkOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class ShiftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function checkShift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_code' => 'required|exists:client_sites,internal_code'
        ],[
            'site_code.exists' => 'You are not allocated to this site.'
        ]);
        $site_data  = ClientSite::where('internal_code', $request->site_code)->first();
        if ($validator->fails()) {
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 422);
        }

        $allcheck = $this->allshiftchecks($site_data);
            //  return  response()->json([
            //     'status' => true,
            //     'message' => 'Site Exists.'
            // ], 200);


        if ($allcheck == "data") {
            return  response()->json([
                'status' => true,
                'message' => 'Site Exists.'
            ], 200);
        } else {
            return $allcheck;
        }
    }


    public function startSiteShift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_code' => 'required|exists:client_sites,internal_code',
            'latitude' => 'required',
            'longitude' => 'required',
            'shift_start' => 'required',
            'selfie_taken' => 'required|image|max:2048'
        ],[
            'site_code.exists' => 'You are not allocated to this site.'
        ]);
        if ($validator->fails()) {
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 422);
        }
        $site_data  = ClientSite::where('internal_code', $request->site_code)->first();
        $cleaner_id = auth()->user()->id;
        if ($validator->fails()) {
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 422);
        }

        $allcheck = $this->allshiftchecks($site_data);
            $distance = ($site_data->longitude && $site_data->latitude) ? ListController::getDistance($request->latitude, $request->longitude, $site_data->latitude??0, $site_data->longitude??0) : null;
        
        // print_r($distance);die;
        if ($allcheck == "data") {
            $site_shift = ClientSiteShift::where(['client_site_id' => $site_data->id, 'cleaner_id' => $cleaner_id])->first();
            if(ClientSiteShiftCleanerSubmissions::where(['cleaner_id' => $cleaner_id,'client_site_shift_id' => $site_shift->id,'shift_start'=> date('Y-m-d',strtotime($request->shift_start)),'status'=>'started'])->exists()){
                return  response()->json([
                    'status' => false,
                    'message' => 'Shift Already Started',
                ], 422);
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
                'device_from_start'=>$request->device_from_start,
                'status'=>'started'
            ];

            $submit = ClientSiteShiftCleanerSubmissions::create($data);

            if ($submit) {
                $running_shift = ClientSiteShiftCleanerSubmissions::with(['site:id,internal_code,portfolio_id,site_type,geo_state_id', 'site.potfolio:id,full_name', 'site.state'])->where('id', $submit->id)->orderBy('shift_start', 'DESC')->first();
                return  response()->json([
                    'status' => true,
                    'message' => 'Shift Started.',
                    'data' => $running_shift
                ], 200);
            }
            return  response()->json([
                'status' => false,
                'message' => 'Something Went Wrong. Please Try Again'
            ], 422);
        } else {
            return $allcheck;
        }
    }


    public function allshiftchecks($site_data)
    {
        $cleaner_id = auth()->user()->id;

        $date = Carbon::now();
        $dayname = strtolower($date->format('l'));
        $site_shift = ClientSiteShift::where(['client_site_id' => $site_data->id, 'cleaner_id' => $cleaner_id])->first();
        $cleaner_days = ClientSiteShiftsDay::where(['client_site_id'=>$site_data->id,'client_site_shifts_id'=>$site_shift->id,'shift_type'=>'shift'])->get()->pluck('day_type')->toArray();
        $cleaner_days_str = $cleaner_days ? implode(',',$cleaner_days) : null;

        if (!$site_data) {
            return  response()->json([
                'status' => false,
                'message' => 'Site Not Found.'
            ], 422);
        } elseif (!ClientSiteShift::where(['client_site_id' => $site_data->id, 'cleaner_id' => $cleaner_id])->exists()) {
            return  response()->json([
                'status' => false,
                'message' => 'You are not allocated to this site.'
            ], 422);
        }

        
        if(!ClientSiteShiftsDay::where(['client_site_id'=>$site_data->id,'client_site_shifts_id'=>$site_shift->id,'shift_type'=>'shift','day_type'=>$dayname])->exists()){
            return  response()->json([
                'status' => false,
                'message' => 'Your shift allowed days are '.$cleaner_days_str
            ], 422);
        }
        // else
        // if(!ClientSiteShift::where('client_site_id',$site_data->id)->where('cleaner_id',$cleaner_id)->where('avaliable_start_time', '<=', date('H:i'))->where('avaliable_end_time', '>=', date('H:i'))->exists()){
        //     return  response()->json([
        //         'status' => false,
        //         'message' => 'Shift Avaliable From '.$site_shift->avaliable_start_time.' to '.$site_shift->avaliable_end_time.'.'
        //     ], 422);
        // }
        else{
            return "data";
        }
    }

    public function runningSiteShift()
    {
        $cleaner_id = auth()->user()->id;
        $running_shift = ClientSiteShiftCleanerSubmissions::with(['site:id,internal_code,portfolio_id,site_type,geo_state_id', 'site.potfolio:id,full_name', 'site.state'])->where('cleaner_id', $cleaner_id)->where('status', 'started')->orderBy('shift_start', 'DESC')->get();
        return  response()->json([
            'status' => true,
            'data' => $running_shift
        ], 200);
    }


    public function endSiteShift(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'site_code' => 'required|exists:client_sites,internal_code',
            'before_image' => 'required',
            'before_image.*' => 'image|max:2048',
            'after_image' => 'required',
            'after_image.*' => 'image|max:2048',
            'shift_questions' => 'nullable',
            'finish_salfie_taken' => 'required|image|max:2048',
            'latitude' => 'required',
            'longitude' => 'required',
            'shift_end' => 'nullable'
        ],[
            'site_code.exists' => 'You are not allocated to this site.'
        ]);
        if ($validator->fails()) {
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 422);
        }


        // ClientSiteShiftCleanerImage::create()

        $site_data  = ClientSite::where('internal_code', $request->site_code)->first();
        $cleaner_id = auth()->user()->id;
        if (!$site_data) {
            return  response()->json([
                'status' => false,
                'message' => 'Invalid Site Code',
            ], 422);
        }
        $site_shift = ClientSiteShift::where(['client_site_id' => $site_data->id, 'cleaner_id' => $cleaner_id])->first();
        if(ClientSiteShiftCleanerSubmissions::where(['cleaner_id' => $cleaner_id,'id' => $id])->where('status','!=','started')->exists()){
            return  response()->json([
                'status' => true,
                'message' => 'Shift Submitted.'
            ], 200);
        }else{
        // $allcheck = $this->allshiftchecks($site_data);
        $distance = ($site_data->longitude && $site_data->latitude) ? ListController::getDistance($request->latitude, $request->longitude, $site_data->latitude??0, $site_data->longitude??0) : null;
        // if ($allcheck == "data") {
            $finish_salfie_taken = $request->file('finish_salfie_taken');
            $dateFolder = 'shifts/' . date('Y_m_d',strtotime($request->shift_end));

            $shiftImages = null;
            foreach ($request->file('before_image') as $before_image) {
                $before_image_imageupload = ImageController::upload($before_image, $dateFolder);
                $shiftImages[] = ['image_tbl' => 'shift', 'shift_submission_id' => $id, 'image_type' => 'before', 'shift_images' => $before_image_imageupload];
            }

            foreach ($request->file('after_image') as $after_image) {
                $after_image_imageupload = ImageController::upload($after_image, $dateFolder);
                $shiftImages[] = ['image_tbl' => 'shift', 'shift_submission_id' => $id, 'image_type' => 'after', 'shift_images' => $after_image_imageupload];
            }
            $finish_salfie_taken_imageupload = ImageController::upload($finish_salfie_taken, $dateFolder);


            $data = [
                'finish_salfie_taken' => $finish_salfie_taken_imageupload,
                'shift_data' => $request->shift_questions ?? null,
                'shift_end' =>$request->shift_end,
                'status' => 'submitted',
                'end_latitude' => $request->latitude ?? null,
                'end_longitude' => $request->longitude ?? null,
                'end_distance' => $distance,
                'device_from_end'=>$request->device_from_end
            ];
            $cleanerShift = ClientSiteShiftCleanerSubmissions::where(['id' => $id, 'cleaner_id' => $cleaner_id])->first();

            $validateTime = $site_data->variation_allowed_minutes ?? 0;
            $startValidTime = strtotime($request->shift_start . '+'.$validateTime.' minutes');
            $endValidTime = strtotime($request->shift_start . '+'.$validateTime.' minutes');
            $start_distance = $cleanerShift->start_distance ?? null;

            $submit = ClientSiteShiftCleanerSubmissions::where(['id' => $id, 'cleaner_id' => $cleaner_id])->update($data);
            if ((strtotime(date('Y-m-d ' . $site_shift->avaliable_start_time)) > $startValidTime) || (strtotime(date('Y-m-d ' . $site_shift->avaliable_start_time)) < $endValidTime)) {
                ClientSiteShiftCleanerSubmissions::where('id',$id)->update([
                    'is_approval_boards' => 1, 'status' => 'under analysis'
                ]);
            }
            if ($start_distance && $start_distance > $site_data->distance_gps || $distance && $distance > $site_data->distance_gps) {
                ClientSiteShiftCleanerSubmissions::where('id', $id)->update([
                    'is_approval_boards' => 1, 'status' => 'under analysis'
                ]);
            }
            if ($submit) {
                if ($shiftImages) ClientSiteShiftCleanerImage::insert($shiftImages);
                return  response()->json([
                    'status' => true,
                    'message' => 'Shift Submitted.'
                ], 200);
            }
            return  response()->json([
                'status' => false,
                'message' => 'Something Went Wrong. Please Try Again'
            ], 422);
        }
    }


    public function shiftQuestions(Request $request)
    {
        $site_id = ['0', $request->site_id];
        $allquestion = ShiftQuestion::with(['nooptions'])->where('status', '1')->whereIn('client_site_id', $site_id)->select('id', 'question')->get();
        return  response()->json([
            'status' => true,
            'data' => $allquestion
        ], 200);
    }




}
