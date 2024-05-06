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
use App\Models\ShiftQuestion;
use App\Models\WorkOrder;
use App\Models\WorkOrderCleaner;
use App\Models\WorkOrderSubmission;
use Illuminate\Http\Request;

class OfflineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api'); //login, register methods won't go through the api guard
    }


    public function allOfflineData()
    {
        $cleaner_id = auth()->user()->id;
        $allsites = ClientSiteShift::where(['cleaner_id' => $cleaner_id])->get()->pluck('client_site_id')->toArray();

        $offlineData = null;

        $siteQuestion = ClientSite::with(['question', 'question.nooptions'])->whereIn('id', $allsites)->select('id', 'internal_code')->get()->toArray();
        $allsitesData = ClientSite::with(['potfolio:id,full_name', 'state','client_site_shift'=>function ($query) use($cleaner_id) {
            $query->where('cleaner_id',$cleaner_id);
        },'client_site_shift.shift_days:id,client_site_shifts_id,day_type'])->whereIn('id', $allsites)->get()->toArray();
        $fixQuestion = ShiftQuestion::with(['nooptions'])->where('status', '1')->where('client_site_id', '0')->select('id', 'question')->get()->toArray();

        $offlineData['allsites'] = $allsitesData;
        $offlineData['questions']['fix'] =  $fixQuestion;
        $offlineData['questions']['site'] =  $siteQuestion;


        // $allworkOrder = WorkOrderCleaner::where('cleaner_id', auth()->user()->id)->get()->pluck('work_order_id')->toArray();

        // $work_orders = WorkOrder::with(['site', 'site.question', 'site.question.nooptions', 'site.city', 'site.state', 'client_work', 'cleaner_work'=>function($query) use ($cleaner_id) {
        //     $query->where('cleaner_id', $cleaner_id);
        // }, 'today_work' => function ($query) use ($cleaner_id) {
        //     $query->where('cleaner_id', $cleaner_id);
        // }])->whereIn('id', $allworkOrder)->where('status', 'To Schedule')->whereDate('completion_date', '>=', date('Y-m-d'))->select('work_orders.id', 'work_orders.client_site_id', 'work_orders.requester', 'work_orders.schedule_date', 'work_orders.completion_date', 'work_orders.start_time', 'work_orders.schedule_date', 'work_orders.priority', 'work_orders.description','work_orders.status')->orderBy('work_orders.schedule_date', 'ASC')->get();

        // $work_ordersHistory = WorkOrder::with(['site', 'site.city', 'site.state', 'client_work', 'cleaner_work', 'work_order_submit'])->has('work_order_submit')->whereIn('work_orders.id', $allworkOrder)->leftJoin('work_order_submissions', 'work_order_submissions.work_order_id', 'work_orders.id')->where('work_order_submissions.cleaner_id', $cleaner_id)->select('work_orders.id', 'work_orders.client_site_id', 'work_orders.requester', 'work_orders.schedule_date', 'work_orders.completion_date', 'work_orders.start_time', 'work_orders.schedule_date', 'work_orders.priority', 'work_orders.description')->orderBy('work_order_submissions.id', 'DESC')->get();


        $allworkOrder = WorkOrderCleaner::where('cleaner_id',auth()->user()->id)->get()->pluck('work_order_id')->toArray();
        $allsubmittedWorkOrder = WorkOrderSubmission::where('cleaner_id',auth()->user()->id)->whereIn('status',['submitted','completed'])->pluck('work_order_id')->toArray();
        $allsubmittedWorkOrder = $allsubmittedWorkOrder ? array_unique($allsubmittedWorkOrder) : [];
        $workOrders = array_diff($allworkOrder, $allsubmittedWorkOrder);
        $work_orders = WorkOrder::with(['site','site.city','site.state','client_work','cleaner_work','today_work'=>function ($query) use($cleaner_id) {
            $query->where('cleaner_id',$cleaner_id);
        }])->whereIn('id',$workOrders)->whereHas('cleaner_work',function ($query) use($cleaner_id) {
            $query->where('cleaner_id',$cleaner_id)->where('date_attendance',date('Y-m-d'));
        })->where('status','To Schedule')->whereDate('completion_date','>=',date('Y-m-d'))->select('work_orders.id','work_orders.client_site_id','work_orders.requester','work_orders.schedule_date','work_orders.completion_date','work_orders.start_time','work_orders.schedule_date','work_orders.priority','work_orders.description')->orderBy('work_orders.schedule_date','ASC')->get()->toArray();

        $work_ordersHistory = WorkOrder::with(['site','site.city','site.state','client_work','cleaner_work','work_order_submit'])->has('work_order_submit')->whereIn('work_orders.id',$allworkOrder)->leftJoin('work_order_submissions','work_order_submissions.work_order_id','work_orders.id')->where('work_order_submissions.cleaner_id',$cleaner_id)->select('work_orders.id','work_orders.client_site_id','work_orders.requester','work_orders.schedule_date','work_orders.completion_date','work_orders.start_time','work_orders.schedule_date','work_orders.priority','work_orders.description')->orderBy('work_order_submissions.id','DESC')->get()->toArray();



        $offlineData['workorder']['current'] = $work_orders;
        $offlineData['workorder']['history'] = $work_ordersHistory;

        return  response()->json([
            'status' => true,
            'data' => $offlineData
        ], 200);
    }


    public function submitShift(Request $request)
    {
        $cleaner_id = auth()->user()->id;
        AppApihit::create(['api_data' => json_encode($request->all()) ?? null, 'api_file_data' => json_encode($request->file()) ?? null, 'api_type' => 'shift_submit', 'cleaner_id' => $cleaner_id]);
        try {
            $site_data  = ClientSite::where('internal_code', $request->site_code)->first();

            if ($site_data) {
                $site_shift = ClientSiteShift::where(['client_site_id' => $site_data->id, 'cleaner_id' => $cleaner_id])->first();

                if (ClientSiteShiftCleanerSubmissions::where(['client_site_shift_id' => $site_shift->id, 'cleaner_id' => $cleaner_id, 'shift_start' => $request->shift_start])->exists()) {
                    return  response()->json([
                        'status' => true,
                        'message' => 'Shift Submitted.'
                    ], 200);
                } else {
                    // return $cleaner_id;
                    $image = $request->file('selfie_taken');
                    $dateFolder = 'shifts/' . date('Y_m_d', strtotime($request->shift_start));
                    $imageupload = ImageController::upload($image, $dateFolder);

                    $start_distance = ($site_data->longitude && $site_data->latitude) ? ListController::getDistance($request->start_latitude, $request->start_longitude, $site_data->latitude, $site_data->longitude) : null;
                    $end_distance = ($site_data->longitude && $site_data->latitude) ?  ListController::getDistance($request->end_latitude, $request->end_longitude, $site_data->latitude, $site_data->longitude): null;

                    $finish_salfie_taken = $request->file('finish_salfie_taken');
                    $dateFolder = 'shifts/' . date('Y_m_d', strtotime($request->shift_end));
                    $finish_salfie_taken_imageupload = ImageController::upload($finish_salfie_taken, $dateFolder);

                    $data = [
                        'cleaner_id' => $cleaner_id,
                        'client_site_id' => $site_data->id,
                        'client_site_shift_id' => $site_shift->id ?? null,
                        'latitude' => $request->start_latitude,
                        'longitude' => $request->start_longitude,
                        'selfie_taken' => $imageupload,
                        'shift_start' => $request->shift_start,
                        'start_distance' => $start_distance,
                        'finish_salfie_taken' => $finish_salfie_taken_imageupload,
                        'shift_data' => $request->shift_questions ?? null,
                        'shift_end' => $request->shift_end,
                        'status' => 'submitted',
                        'end_latitude' => $request->end_latitude ?? null,
                        'end_longitude' => $request->end_longitude ?? null,
                        'end_distance' => $end_distance,
                        'device_from_start'=>$request->device_from_start,
                        'device_from_end'=>$request->device_from_end
                    ];

                    $validateTime = $site_data->variation_allowed_minutes ?? 0;
                    $startValidTime = strtotime($request->shift_start . '+'.$validateTime.' minutes');
                    $endValidTime = strtotime($request->shift_start . '+'.$validateTime.' minutes');


                    $submit = ClientSiteShiftCleanerSubmissions::create($data);

                    if ($submit) {
                        $shiftImages = null;
                        if ((strtotime(date('Y-m-d ' . $site_shift->avaliable_start_time)) > $startValidTime) || (strtotime(date('Y-m-d ' . $site_shift->avaliable_start_time)) < $endValidTime)) {
                            ClientSiteShiftCleanerSubmissions::where('id', $submit->id)->update([
                                'is_approval_boards' => 1, 'status' => 'under analysis'
                            ]);
                        }
                        if ($start_distance && $start_distance > $site_data->distance_gps || $end_distance && $end_distance > $site_data->distance_gps) {
                            ClientSiteShiftCleanerSubmissions::where('id', $submit->id)->update([
                                'is_approval_boards' => 1, 'status' => 'under analysis'
                            ]);
                        }

                        if ($request->before_image) {
                            foreach ($request->file('before_image') as $before_image) {
                                $before_image_imageupload = ImageController::upload($before_image, $dateFolder);
                                $shiftImages[] = ['image_tbl' => 'shift', 'shift_submission_id' => $submit->id, 'image_type' => 'before', 'shift_images' => $before_image_imageupload];
                            }
                        }

                        if ($request->after_image) {
                            foreach ($request->file('after_image') as $after_image) {
                                $after_image_imageupload = ImageController::upload($after_image, $dateFolder);
                                $shiftImages[] = ['image_tbl' => 'shift', 'shift_submission_id' => $submit->id, 'image_type' => 'after', 'shift_images' => $after_image_imageupload];
                            }
                        }
                        if ($shiftImages) ClientSiteShiftCleanerImage::insert($shiftImages);
                    }
                }
            }
            return  response()->json([
                'status' => true,
                'message' => 'Shift Submitted.'
            ], 200);
        } catch (\Exception $e) {
            return  response()->json([
                'status' => false,
                'message' => 'Error : ' . $e->getMessage()
            ], 200);
        }
    }


    public function submitWorkOrder(Request $request)
    {
        $cleaner_id = auth()->user()->id;

        AppApihit::create(['api_data' => json_encode($request->all()) ?? null, 'api_file_data' => json_encode($request->file()) ?? null, 'api_type' => 'workorder_submit', 'cleaner_id' => $cleaner_id]);
        try {
            $site_data  = ClientSite::where('internal_code', $request->site_code)->first();
            if ($site_data) {
                $work_order_data = WorkOrder::whereId($request->work_order_id)->first();

                if (WorkOrderSubmission::where(['cleaner_id' => $cleaner_id, 'site_id' => $work_order_data->client_site_id, 'work_order_id' => $request->work_order_id, 'shift_start' => $request->shift_start])->exists()) {
                    return  response()->json([
                        'status' => true,
                        'message' => 'Work Order Submitted.'
                    ], 200);
                } else {
                    $image = $request->file('selfie_taken');
                    $dateFolder = 'work-order/' . date('Y_m_d', strtotime($request->shift_start));
                    $imageupload = ImageController::upload($image, $dateFolder);

                    $start_distance = ListController::getDistance($request->start_latitude, $request->start_longitude, $site_data->latitude, $site_data->longitude) ?? null;
                    $end_distance = ListController::getDistance($request->end_latitude, $request->end_longitude, $site_data->latitude, $site_data->longitude) ?? null;


                    $finish_salfie_taken = $request->file('finish_salfie_taken');
                    $dateFolder = 'work-order/' . date('Y_m_d', strtotime($request->shift_end));
                    $finish_salfie_taken_imageupload = ImageController::upload($finish_salfie_taken, $dateFolder);


                    $data = [
                        'cleaner_id' => $cleaner_id,
                        'site_id' => $work_order_data->client_site_id ?? null,
                        'work_order_id' => $request->work_order_id,
                        'latitude' => $request->start_latitude,
                        'longitude' => $request->start_longitude,
                        'selfie_taken' => $imageupload,
                        'shift_start' => $request->shift_start,
                        'start_distance' => $start_distance,
                        'finish_salfie_taken' => $finish_salfie_taken_imageupload,
                        'shift_data' => $request->shift_questions ?? null,
                        'shift_end' =>  $request->shift_end,
                        'status' => 'submitted',
                        'end_latitude' => $request->end_latitude ?? null,
                        'end_longitude' => $request->end_longitude ?? null,
                        'end_distance' => $end_distance,
                        'device_from_start'=>$request->device_from_start,
                        'device_from_end'=>$request->device_from_end
                    ];

                    $submit = WorkOrderSubmission::create($data);
                    if ($submit) {

                        $shiftImages = null;
                        foreach ($request->file('before_image') as $before_image) {
                            $before_image_imageupload = ImageController::upload($before_image, $dateFolder);
                            $shiftImages[] = ['image_tbl' => 'work-order', 'shift_submission_id' => $submit->id, 'image_type' => 'before', 'shift_images' => $before_image_imageupload];
                        }

                        foreach ($request->file('after_image') as $after_image) {
                            $after_image_imageupload = ImageController::upload($after_image, $dateFolder);
                            $shiftImages[] = ['image_tbl' => 'work-order', 'shift_submission_id' => $submit->id, 'image_type' => 'after', 'shift_images' => $after_image_imageupload];
                        }
                        if ($shiftImages) ClientSiteShiftCleanerImage::insert($shiftImages);
                    }
                }
            }
            return  response()->json([
                'status' => true,
                'message' => 'Work Order Submitted.'
            ], 200);
        } catch (\Exception $e) {
            return  response()->json([
                'status' => false,
                'message' => 'Error : ' . $e->getMessage()
            ], 200);
        }
    }
}
