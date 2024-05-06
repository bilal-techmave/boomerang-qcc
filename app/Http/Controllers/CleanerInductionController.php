<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Common\ImageController;
use App\Models\CleanerInduction;
use Illuminate\Http\Request;

class CleanerInductionController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:induction-view')->only(['index', 'show']);
        $this->middleware('role:induction-add')->only(['create', 'store']);
        $this->middleware('role:induction-edit')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $allinduction = CleanerInduction::orderBy('id','DESC')->get();
    //     return view('induction.index',compact('allinduction'));
    // }

    public function index(Request $request)
    {
        $status = $request->input('status');

        $query = CleanerInduction::query();

        if ($status == '1') {
            $query->where('status', $status);
        }elseif ($status == '0') {
            $query->where('status', $status);
        }
        $allinduction = $query->orderBy('id','DESC')->get();
        return view('induction.index',compact('allinduction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('induction.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required|in:0,1',
            'docs_image'=>'required'
        ]);
        $fields = $request->except('_token');

        $docs_image = $request->file('docs_image');
        $fields['docs_image'] =null;
        if($docs_image){
            $dateFolder = 'cleaner/docs_image';
            $docs_image_imageupload = ImageController::upload($docs_image,$dateFolder);
            $fields['docs_image'] = $docs_image_imageupload;
        }
        // dd($fields);
        $cleaner_induction = CleanerInduction::create($fields);
        if($cleaner_induction){
            return redirect()->route('induction.induction.index')->with('success','Induction Added Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $cleanerInduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cleanerInduction)
    {
        $cleanerInduction = CleanerInduction::whereId($cleanerInduction)->first();
        return view('induction.edit',compact('cleanerInduction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $cleanerInduction)
    {
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required|in:0,1',
            'docs_image'=>'nullable|mimes:pdf,doc,docx,jpeg,jpg,png,webp'
        ]);

        $fields = $request->except(['_token','_method']);
        $docs_image = $request->file('docs_image');
        if($docs_image){
            $dateFolder = 'cleaner/docs_image';
            $docs_image_imageupload = ImageController::upload($docs_image,$dateFolder);
            $fields['docs_image'] = $docs_image_imageupload;
        }
        $cleaner_induction = CleanerInduction::whereId($cleanerInduction)->update($fields);
        if($cleaner_induction){
            return redirect()->route('induction.induction.index')->with('success','Induction Updated Successfully.');
        }
        return redirect()->back()->with('error','Please Check Required Fields.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CleanerInduction $cleanerInduction)
    {
        //
    }

    public function unique_check(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(CleanerInduction::where($request->colname, urldecode($request->colvalue))->exists()){
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
