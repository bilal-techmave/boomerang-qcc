<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:faq-view')->only(['index', 'show']);
        $this->middleware('role:faq-create')->only(['create', 'store']);
        $this->middleware('role:faq-edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();
        return view('pages.faq',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('work-orders.work-order-add');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $fields = $request->except('_token');
        $faqCreate = Faq::create($fields);
        if($faqCreate){
            return redirect()->route('faqs.index')->with('success','FAQ  Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $faqEdit=Faq::find($id);
        return response()->json(['faqedit' => $faqEdit],200);

    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $id = $request->postId;
        $data = [
            'question'=>$request->question,
            'answer'=>$request->answer,
            ];
        $updatePost = Faq::whereId($id)->update($data);
        // if ($updatePost == true) {
        //     return response()->json(["message" => "Successfully Updated",], 201);
        // } else {
        //     return response()->json(["message" => "Error Updating Post",], 403);
        // }
        if($updatePost){
            return redirect()->route('faqs.index')->with('success','FAQ  Updated Successfully.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(WorkOrder $workOrder)
    // {
    //     //
    // }

    public function unique_check(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(Faq::where($request->colname, urldecode($request->colvalue))->exists()){
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
