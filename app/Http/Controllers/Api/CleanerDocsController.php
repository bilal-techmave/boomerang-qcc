<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Common\ImageController;
use App\Http\Controllers\Controller;
use App\Models\BaseDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CleanerDocsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function cleanerDocs(){
        $all_docs = BaseDocument::where(['user_id'=>auth()->user()->id,'doc_upload_type'=>'request'])->orderBy('status','ASC')->get();
        return  response()->json([
            'status' => true,
            'data' => $all_docs
        ], 200);
    }

    public function cleanerDocsUpload(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'reference_number' =>'required',
            'expire_date'=>'required|date',
            'docs_image' => 'nullable',
        ]);
        if ($validator->fails()) {
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 422);
        }
        $docs_image_imageupload = BaseDocument::whereId($id)->pluck('docs_image')->first()??null;
        if($request->hasFile('docs_image')){
            $docs_image = $request->file('docs_image');
            $dateFolder = 'cleaner/docs';
            $docs_image_imageupload = ImageController::upload($docs_image,$dateFolder);
        }

        $submitdata= BaseDocument::whereId($id)->update(['docs_image'=>$docs_image_imageupload,'reference_number'=>$request->reference_number,'expire_date'=>$request->expire_date,'status'=>'submitted']);
        if($submitdata){
            return  response()->json([
                'status' => true,
                'data' => 'Your Document Submitted Successfully.'
            ], 200);
        }

        return  response()->json([
            'status' => false,
            'data' => "Something Went Wrong."
        ], 422);
    }
}
