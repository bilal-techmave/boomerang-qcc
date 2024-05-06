<?php

namespace App\Http\Controllers\Cron;


use App\Http\Controllers\Controller;
use App\Models\ClientSite;
use App\Models\ClientSiteShift;
use App\Models\ClientSiteShiftCleanerSubmissions;
use App\Models\ClientSiteShiftsDay;
use App\Models\MissedClean;
use Carbon\Carbon;

class MissedClenController extends Controller
{

    public function store(){
        $dayName = Carbon::now()->dayName;
        $currentDateTime = Carbon::now();
        $allShiftsSites =  ClientSiteShift::leftJoin('client_site_shifts_days','client_site_shifts_days.client_site_shifts_id','client_site_shifts.id')->where(['client_site_shifts_days.shift_type'=>'shift','client_site_shifts_days.day_type'=>$dayName])->where('client_site_shifts.avaliable_end_time','<',$currentDateTime->format('H:i:s'))->orderBy('client_site_shifts.id','ASC')->select('client_site_shifts.*')->get()->toArray();
        // dd($allShiftsSites,$currentDateTime->format('H:i:s'));
        if($allShiftsSites){
            $allSitesIds = array_unique(array_column($allShiftsSites,'client_site_id'));

            $allWorkingSite = ClientSite::whereIn('id',$allSitesIds)->where('show_missed_clean','1')->get()->pluck('id');

            // dd($allSitesIds,$allWorkingSite,$allShiftsSites);
            $missedDate = [];
            if($allWorkingSite){
                foreach($allWorkingSite as $sites){
                    foreach($allShiftsSites as $siteShirt){
                        if($siteShirt['client_site_id'] == $sites){
                            if(!MissedClean::where(['date_missed'=>$currentDateTime->format('Y-m-d'),'client_site_shift_id'=>$siteShirt['id']])->exists()){
                                if(!ClientSiteShiftCleanerSubmissions::where('client_site_shift_id',$siteShirt['id'])->where('shift_start',$currentDateTime->format('Y-m-d'))->exists()){
                                    $missedDate[] = [
                                        'date_missed'=> date('Y-m-d'),
                                        'site_id' => $sites,
                                        'client_site_shift_id'=>$siteShirt['id']
                                    ];
                                }
                            }
                        }
                    }
                }
            }
            if($missedDate && !empty($missedDate)) MissedClean::insert($missedDate);
        }

        dd('--');


    }

}
