<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Common\ImageController;
use App\Http\Controllers\Controller;
use App\Models\CleanerInduction;
use App\Models\CleanerInductionSubmission;
use App\Models\ClientSite;
use App\Models\ClientSiteCleanerRequest;
use App\Models\ClientSiteShift;
use App\Models\ClientSiteShiftsDay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CleanerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function siteRequest(Request $request){
        $validator = Validator::make($request->all(), [
            'site_code' => 'required',
            'request_body' => 'required',
            'date_time'=>'required'
        ]);
        if ($validator->fails()) {
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 422);
        }
        $site_data  = ClientSite::where('internal_code',$request->site_code)->first();
        $cleaner_id = auth()->user()->id;

        $date = Carbon::now();
        $dayname = strtolower($date->format('l'));
        if ($date->isWeekday()) {
            $dataweek =  "weekdays";
        } else {
            $dataweek =  "weekends";
        }

        if(!$site_data){
            return  response()->json([
                'status' => false,
                'message' => 'Invalid Input.'
            ], 422);
        }
        // elseif(!ClientSiteShift::where(['client_site_id'=>$site_data->id,'cleaner_id'=>$cleaner_id])->exists()){
        //     return  response()->json([
        //         'status' => false,
        //         'message' => 'Invalid Input. ----1'
        //     ], 422);
        // }

        $site_shift = ClientSiteShift::where(['client_site_id'=>$site_data->id,'cleaner_id'=>$cleaner_id])->first();
        // if(!ClientSiteShiftsDay::where('client_site_id',$site_data->id)->where('client_site_shifts_id',$site_shift->id)->where('day_type',$dayname)->OrWhere('day_type','everyday')->OrWhere('day_type',$dataweek)->exists()){
        // if(!ClientSiteShiftsDay::where('client_site_id',$site_data->id)->where('client_site_shifts_id',$site_shift->id)->exists()){
        //     return  response()->json([
        //         'status' => false,
        //         'message' => 'Invalid Input.'
        //     ], 422);
        // }else
        // if(!ClientSiteShift::where('client_site_id',$site_data->id)->where('cleaner_id',$cleaner_id)->where('avaliable_end_time', '>=', date('H:i'))->exists()){
        //     return  response()->json([
        //         'status' => false,
        //         'message' => 'Shift Avaliable From '.$site_shift->avaliable_start_time.' to '.$site_shift->avaliable_end_time.'.'
        //     ], 422);
        // }else{
            $request_datetime = (isset($request->date_time) && $request->date_time) ? date("Y-m-d H:i:s", strtotime($request->date_time)) : date("Y-m-d H:i:s");
            $data = [
                "cleaner_id" => $cleaner_id,
                "client_site_id"=>$site_data->id,
                "request_body" => $request->request_body,
                "create_date_time"=>$request_datetime
            ];

            if(ClientSiteCleanerRequest::create($data)){
                return  response()->json([
                    'status' => true,
                    'message' => 'Request Submitted Successfully.'
                ], 200);
            }
            return  response()->json([
                'status' => false,
                'message' => 'Something Wrong.'
            ], 422);
        // }
    }

    public function allRequested(){
       $allrequests = ClientSiteCleanerRequest::with(['site','site.city','site.state'])->where('cleaner_id',auth()->user()->id)->orderBy('id','DESC')->get();
       return  response()->json([
            'status' => true,
            'data' => $allrequests
        ], 200);
    }


    public function cleanerInduction(){
        $cleaner_id = auth()->user()->id;
        $inductions = CleanerInduction::with(['signature'=>function ($query) use ($cleaner_id) {
            $query->where('cleaner_id',$cleaner_id);
        }])->where('status','1')->get();
        return  response()->json([
            'status' => true,
            'data' => $inductions
        ], 200);
    }

    public function cleanerInductionUpload(Request $request,$id){
        $cleaner_id = auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'signature' => 'required|image|max:2048'
        ]);
        if ($validator->fails()) {
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 422);
        }

        $signature_image = $request->file('signature');
        $dateFolder = 'cleaner/induction';
        $signature_image_imageupload = ImageController::upload($signature_image,$dateFolder);

        CleanerInductionSubmission::updateOrCreate(['cleaner_induction_id'=>$id,'cleaner_id'=>$cleaner_id],['signature'=>$signature_image_imageupload]);
        return  response()->json([
            'status' => true,
            'data' => 'Induction Submitted Successfully !'
        ], 200);

    }




}
