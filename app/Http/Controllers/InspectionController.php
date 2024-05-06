<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Common\ImageController;
use Illuminate\Http\UploadedFile;
use App\Models\{Inspection, InspectionField, InspectionAction};


class InspectionController extends Controller
{
    public function index()
    {
        return view('inspection.inspections');
    }

    public function create()
    {
        return view('inspection.start-inspection');
    }

    public function store(Request $request)
    {
        try{
            $data = request()->all();
            // dd($data);
            $nonNullCount = count(array_filter($data, function($value) {
                return !is_null($value);
            }));
            $totalFields = isset($data['question']) && is_array($data['question']) ? count($data['question']) : 0;
            $percentage = ($totalFields > 0) ? ($nonNullCount / $totalFields) * 100 : 0;
            $percentage = round($percentage);
            // dd($percentage);

            $inspection = Inspection::create([
                    'template_id'  => 1,
                    'score'        => $percentage,
                    'conducted'    => date('Y-m-d H:i:s'),
                    'completed'    => null,
                ]);

            $all_action_records = [];

            foreach ($data['question'] as $key => $value) {
                reset($value);
            
                $firstKey = key($value);
                $firstValue = current($value);
            
                if (isset($value['media']) && $value['media'] && $value['media']->isValid()) {
                    $file = $value['media'];
                    $dateFolder = 'inspection/uploads';
                    $uploadAttachment_imageupload = ImageController::upload($file, $dateFolder);
                    $value['attachment'] = $uploadAttachment_imageupload;
                } else {
                    $value['attachment'] = null;
                }
            // dd($firstValue);
                $inspection_field = InspectionField::create([
                    'inspection_id'  => $inspection->id,
                    'filed_name'     => $firstKey,  
                    'filed_data'     => $firstValue,
                ]);

                $action_records = [
                    'inspection_id'         => $inspection->id,
                    'inspection_field_id'   => $inspection_field->id,
                    'note'                  => $value['note'] ?? null,
                    'media'                 => $value['attachment'] ?? null,
                    'action'                => isset($value['action']) ? json_encode($value['action']) : null,
                ];

                $all_action_records[] = $action_records;
            }

            $inspection_action = InspectionAction::insert($all_action_records);
            if($inspection && $inspection_field && $inspection_action){
                return redirect()->back()->with('success','Inspection completed successfuly.');
            }
        }catch(Exception $e){
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
