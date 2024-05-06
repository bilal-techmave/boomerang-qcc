<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Common\ImageController;
use App\Http\Controllers\Common\ListController;
use App\Http\Controllers\Controller;
use App\Models\ClientPortfolio;
use App\Models\ClientSite;
use App\Models\ClientSiteShiftCleanerImage;
use App\Models\WorkOrder;
use App\Models\WorkOrderCleaner;
use App\Models\WorkOrderSubmission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function workOrder()
    {
        $cleaner_id = auth()->user()->id;

        $allworkOrder = WorkOrderCleaner::where('cleaner_id', auth()->user()->id)->get()->pluck('work_order_id')->toArray();
        $allsubmittedWorkOrder = WorkOrderSubmission::where('cleaner_id', auth()->user()->id)->whereIn('status', ['submitted', 'completed'])->pluck('work_order_id')->toArray();
        $allsubmittedWorkOrder = $allsubmittedWorkOrder ? array_unique($allsubmittedWorkOrder) : [];
        $workOrders = array_diff($allworkOrder, $allsubmittedWorkOrder);
        $work_orders = WorkOrder::with(['site', 'site.city', 'site.state', 'client_work', 'cleaner_work', 'today_work' => function ($query) use ($cleaner_id) {
            $query->where('cleaner_id', $cleaner_id);
        }])->whereIn('id', $workOrders)->whereHas('cleaner_work', function ($query) use ($cleaner_id) {
            $query->where('cleaner_id', $cleaner_id)->where('date_attendance', date('Y-m-d'));
        })->where('status', 'To Schedule')->whereDate('completion_date', '>=', date('Y-m-d'))->select('work_orders.id', 'work_orders.client_site_id', 'work_orders.requester', 'work_orders.schedule_date', 'work_orders.completion_date', 'work_orders.start_time', 'work_orders.schedule_date', 'work_orders.priority', 'work_orders.description')->orderBy('work_orders.schedule_date', 'ASC')->get()->toArray();

        $work_ordersHistory = WorkOrder::with(['site', 'site.city', 'site.state', 'client_work', 'cleaner_work', 'work_order_submit'])->has('work_order_submit')->whereIn('work_orders.id', $allworkOrder)->leftJoin('work_order_submissions', 'work_order_submissions.work_order_id', 'work_orders.id')->where('work_order_submissions.cleaner_id', $cleaner_id)->select('work_orders.id', 'work_orders.client_site_id', 'work_orders.requester', 'work_orders.schedule_date', 'work_orders.completion_date', 'work_orders.start_time', 'work_orders.schedule_date', 'work_orders.priority', 'work_orders.description')->orderBy('work_order_submissions.id', 'DESC')->get()->toArray();


        return  response()->json([
            'status' => true,
            'data' => $work_orders,
            'history' => $work_ordersHistory
        ], 200);
    }

    public function startWorkOrderShift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'work_order_id' => 'required',
            'site_code' => 'required|exists:client_sites,internal_code',
            'latitude' => 'required',
            'longitude' => 'required',
            'selfie_taken' => 'required|image|max:2048',
            'shift_start' => 'required',
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





        $allcheck = $this->allshiftchecks($site_data, $request->work_order_id);
        $distance = ($site_data->latitude && $site_data->longitude) ? ListController::getDistance($request->latitude, $request->longitude, $site_data->latitude, $site_data->longitude) : null;

        if ($allcheck == "data") {
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
                'manager_id' => $managerId,
                'device_from_start'=>$request->device_from_start
            ];

            $submit = WorkOrderSubmission::create($data);
            if ($submit) {
                return  response()->json([
                    'status' => true,
                    'message' => 'Work Order Started.'
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

    public function endWorkOrderShift(Request $request, $id)
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
            'shift_end' => 'required',
        ]);
        if ($validator->fails()) {
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 422);
        }

        if (WorkOrderSubmission::where(['id' => $id, 'status' => 'submitted'])->exists()) {
            return  response()->json([
                'status' => true,
                'message' => 'Work Order Submitted.'
            ], 200);
        } else {


            $work_order_id =  WorkOrderSubmission::whereId($id)->first()->work_order_id;

            $site_data  = ClientSite::where('internal_code', $request->site_code)->first();
            $cleaner_id = auth()->user()->id;
            $distance = ($site_data->latitude && $site_data->longitude) ? ListController::getDistance($request->latitude, $request->longitude, $site_data->latitude, $site_data->longitude) : null;
            $allcheck = $this->allshiftchecks($site_data, $work_order_id);
            if ($allcheck == "data") {
                $finish_salfie_taken = $request->file('finish_salfie_taken');
                $dateFolder = 'work-order/' . date('Y_m_d', strtotime($request->shift_end));

                $shiftImages = null;
                foreach ($request->file('before_image') as $before_image) {
                    $before_image_imageupload = ImageController::upload($before_image, $dateFolder);
                    $shiftImages[] = ['image_tbl' => 'work-order', 'shift_submission_id' => $id, 'image_type' => 'before', 'shift_images' => $before_image_imageupload];
                }

                foreach ($request->file('after_image') as $after_image) {
                    $after_image_imageupload = ImageController::upload($after_image, $dateFolder);
                    $shiftImages[] = ['image_tbl' => 'work-order', 'shift_submission_id' => $id, 'image_type' => 'after', 'shift_images' => $after_image_imageupload];
                }
                $finish_salfie_taken_imageupload = ImageController::upload($finish_salfie_taken, $dateFolder);


                $data = [
                    'finish_salfie_taken' => $finish_salfie_taken_imageupload,
                    'shift_data' => $request->shift_questions ?? null,
                    'shift_end' => date('Y-m-d H:i', strtotime($request->shift_end)),
                    'status' => 'submitted',
                    'end_latitude' => $request->latitude ?? null,
                    'end_longitude' => $request->longitude ?? null,
                    'end_distance' => $distance,
                    'device_from_end'=>$request->device_from_end
                ];

                $submit = WorkOrderSubmission::where(['id' => $id, 'cleaner_id' => $cleaner_id])->update($data);
                if ($submit) {
                    if ($shiftImages) ClientSiteShiftCleanerImage::insert($shiftImages);
                    return  response()->json([
                        'status' => true,
                        'message' => 'Work Order Submitted.'
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
    }

    public function runningWorkOrderShift()
    {
        $cleaner_id = auth()->user()->id;
        $running_shift = WorkOrderSubmission::with(['site:id,internal_code,portfolio_id', 'site.potfolio:id,full_name'])->where('cleaner_id', $cleaner_id)->where('status', 'started')->get();
        return  response()->json([
            'status' => true,
            'data' => $running_shift
        ], 200);
    }

    public function allshiftchecks($site_data, $work_order_id = null)
    {
        $cleaner_id = auth()->user()->id;

        if (!$site_data) {
            return  response()->json([
                'status' => false,
                'message' => 'Invalid Input.'
            ], 422);
        } elseif (!WorkOrder::where(['client_site_id' => $site_data->id])->exists()) {
            return  response()->json([
                'status' => false,
                'message' => 'Invalid Input.'
            ], 422);
        } elseif (!WorkOrderCleaner::where(['work_order_id' => $work_order_id])->exists()) {
            return  response()->json([
                'status' => false,
                'message' => 'Invalid Work Order Input.'
            ], 422);
        }

        // $workorder = WorkOrder::where(['client_site_id'=>$site_data->id,'cleaner_id'=>$cleaner_id])->first();
        // if(WorkOrder::where('id',$work_order_id)->where('schedule_date', '>=', date('Y-m-d'))->exists()){
        //     return  response()->json([
        //         'status' => false,
        //         'message' => 'Work Order Avaliable From Date '.$workorder->schedule_date.'.'
        //     ], 422);
        // }else{
        return "data";
        // }
    }
}
