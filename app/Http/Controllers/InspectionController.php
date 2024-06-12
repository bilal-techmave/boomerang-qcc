<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Common\ImageController;
use Illuminate\Http\UploadedFile;
use App\Models\{Inspection, InspectionField, InspectionAction, TemplateField, TemplateInspectionField, TemplateInspection, Template};
use Storage;
use DB;


class InspectionController extends Controller
{
    public function index()
    {
        return view('inspection.inspections');
    }

    public function create(Request $request)
    {

        $apiKey = env('GOOGLE_MAPS_API_KEY');

        $template = Template::where('id', decrypt($request->id))->first();
        $templateData = $template->toArray();
        unset($templateData['id']);
        $template_inspection = TemplateInspection::create($templateData);

        $fields = TemplateField::where('template_id', decrypt($request->id))->get();
        $fieldsArray = $fields->map(function ($field) use ($template_inspection) {
            $field->template_id = $template_inspection->id;
            return $field->toArray();
        })->toArray();

        TemplateInspectionField::insert($fieldsArray);

        // Return the view with the necessary data
        return view('inspection.start-inspection', compact('fields', 'apiKey'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try{
            $data = $request->all();
            $nonNullCount = count(array_filter($data, function ($value) {
                return !is_null($value);
            }));
            $totalFields = isset($data['question']) && is_array($data['question']) ? count($data['question']) : 0;
            $percentage = ($totalFields > 0) ? ($nonNullCount / $totalFields) * 100 : 0;
            $percentage = round($percentage);

            $inspection = Inspection::create([
                    'template_id'  => 1,
                    'score'        => $percentage,
                    'conducted'    => date('Y-m-d H:i:s'),
                    'completed'    => null,
                ]);

            $all_action_records = [];

            foreach ($data['question'] as $key => $fields) {
                $inspection_field_id = null;
    
                foreach ($fields as $fieldKey => $fieldValue) {
                    // Handle file uploads
                    if ($request->hasFile("question.$key.$fieldKey") && $fieldKey != 'media') {
                        $file = $request->file("question.$key.$fieldKey");
                        $dateFolder = 'inspection/uploads';
                        $fieldValue = ImageController::upload($file, $dateFolder);
                    }
    
                    if ($fieldKey == 'media' && isset($fields['media']) && $fields['media']->isValid()) {
                        $file = $fields['media'];
                        $dateFolder = 'inspection/uploads';
                        $uploadAttachment_imageupload = ImageController::upload($file, $dateFolder);
                        $fields['attachment'] = $uploadAttachment_imageupload;
                    } else {
                        $fields['attachment'] = null;
                    }
    
                    // Create the InspectionField record
                    if (!in_array($fieldKey, ['media', 'note', 'action'])) {
                        $inspection_field = InspectionField::create([
                            'inspection_id' => $inspection->id,
                            'filed_name'    => $fieldKey,
                            'filed_data'    => is_array($fieldValue) ? json_encode($fieldValue) : $fieldValue,
                        ]);
    
                        // Store the inspection_field_id to be used in action records
                        $inspection_field_id = $inspection_field->id;
                    }
                }
    
                // Prepare the action records
                $action_records = [
                    'inspection_id'       => $inspection->id,
                    'inspection_field_id' => $inspection_field_id,
                    'note'                => $fields['note'] ?? null,
                    'media'               => $fields['attachment'],
                    'action'              => isset($fields['action']) ? json_encode($fields['action']) : null,
                ];
    
                $all_action_records[] = $action_records;
            }

            $inspection_action = InspectionAction::insert($all_action_records);
            if($inspection && $inspection_field && $inspection_action){
                return redirect()->back()->with('success','Inspection completed successfuly.');
            }
        }catch(\Exception $e){
            $data = [
                $e->getMessage(),
                $e->getLine(),
                $e->getFile(),
            ];
            return $data;
        }
             
    }

    public function edit()
    {
        return view('inspection.start-inspection');
    }
    public function viewReport()
    {
        return view('inspection.inspection-report-view');
    }

    public function viewHistory()
    {
        return view('inspection.inspection-history');
    }
}
