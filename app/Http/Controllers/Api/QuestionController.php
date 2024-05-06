<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientSite;
use App\Models\ClientSiteShift;
use App\Models\ShiftQuestion;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');//login, register methods won't go through the api guard
    }


    public function allSiteQuestions()
    {
        $cleaner_id = auth()->user()->id;
        $allsites = ClientSiteShift::where(['cleaner_id'=>$cleaner_id])->get()->pluck('client_site_id')->toArray();

        $questionData = null;

        $siteQuestion = ClientSite::with('question')->whereIn('id',$allsites)->select('id','internal_code')->get()->toArray();
        $fixQuestion = ShiftQuestion::where('client_site_id','0')->select('id','question')->get()->toArray();


        $questionData['fixQuestion'] =  $fixQuestion;
        $questionData['siteQuestion'] =  $siteQuestion;


        return  response()->json([
            'status' => true,
            'data' => $questionData
        ], 200);
    }

}
