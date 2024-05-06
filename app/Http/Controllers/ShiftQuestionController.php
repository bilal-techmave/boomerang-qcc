<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShiftQuestionRequest;
use App\Http\Requests\UpdateShiftQuestionRequest;
use App\Models\ClientSite;
use App\Models\ShiftQuestion;
use App\Models\ShiftQuestionsReason;
use Illuminate\Http\Request;

class ShiftQuestionController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:shift-question-view')->only(['index', 'show']);
        $this->middleware('role:shift-question-add')->only(['create', 'store']);
        $this->middleware('role:shift-question-edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shiftQuestion = ShiftQuestion::with(['site'])->orderBy('id','DESC')->get();
        return view('questions.list',compact('shiftQuestion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sites = ClientSite::with(['state'])->where('status','1')->get();
        return view('questions.add',compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'inputs' => 'required|array',
            'inputs.*' => 'required'
        ]);

        $ques = ShiftQuestion::create(['question'=>$request->question,'client_site_id'=>$request->client_site_id]);

        $question_input = [];
        if($request->inputs){
            foreach($request->inputs as $inpt){
                $question_input[] =[
                    'shift_question_id' => $ques->id,
                    'reson_option' => $inpt
                ];
            }
        }

        if($question_input && !empty($question_input)){
            ShiftQuestionsReason::insert($question_input);
        }
        return redirect()->route('question.question.index')->with('success','Shift question created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShiftQuestion $shiftQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($shiftQuestion)
    {
        $sites = ClientSite::with(['state'])->get();
        $shiftQuestion = ShiftQuestion::with(['nooptions'])->whereId($shiftQuestion)->first();
        return view('questions.edit',compact('shiftQuestion','sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $shiftQuestion)
    {
        $this->validate($request, [
            'question' => 'required',
            'inputs' => 'required|array',
            'inputs.*' => 'required'
        ]);

        ShiftQuestion::whereId($shiftQuestion)->update(['question'=>$request->question,'client_site_id'=>$request->client_site_id]);

        if($request->inputs){
            ShiftQuestionsReason::where('shift_question_id',$shiftQuestion)->update(['status'=>0]);

            foreach($request->inputs as $inpt){
                if(ShiftQuestionsReason::where(['shift_question_id'=>$shiftQuestion,'reson_option' => $inpt])->exists()){
                    $question_input =[
                        'shift_question_id' => $shiftQuestion,
                        'reson_option' => $inpt
                    ];
                    ShiftQuestionsReason::create($question_input);
                }
                else{
                    $question_input =[
                        'shift_question_id' => $shiftQuestion,
                        'reson_option' => $inpt
                    ];
                    ShiftQuestionsReason::create($question_input);
                }
            }
            ShiftQuestionsReason::where(['shift_question_id'=>$shiftQuestion,'status'=>0])->delete();
        }
        return redirect()->route('question.question.index')->with('success','Shift question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShiftQuestion $shiftQuestion)
    {
        //
    }

    public function unique_check(Request $request){
        if($request->colname){
            $siteVal = $request->site_id??0;
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(ShiftQuestion::where($request->colname, urldecode($request->colvalue))->where('client_site_id','0')->exists()){
                return response()->json([
                    "status" => false,
                    "message"=> "Please fill unique data. It's already exists."
                ]);
            }elseif(ShiftQuestion::where($request->colname, urldecode($request->colvalue))->where('client_site_id',$siteVal)->exists()){
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
