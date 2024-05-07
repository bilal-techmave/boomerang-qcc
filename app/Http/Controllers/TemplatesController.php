<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Template, TemplateField};
use Carbon\Carbon;

class TemplatesController extends Controller
{
    public function index()
    {
        $currentDateTime = Carbon::now();
        $templates = Template::orderBy('id', 'desc')->get();

        foreach ($templates as $template) {
            $minutesDifference = $currentDateTime->diffInMinutes($template->created_at);
            if ($minutesDifference < 60) 
            {
                $template->timeDisplay = $minutesDifference . ' minutes ago';
            }elseif($minutesDifference < 1440){

                $hoursDifference = $currentDateTime->diffInHours($template->created_at);
                $template->timeDisplay = $hoursDifference . ' hours ago';
            }elseif($minutesDifference < 20160){

                $daysDifference = $currentDateTime->diffInDays($template->created_at);
                $template->timeDisplay = $daysDifference . ' days ago';
            }else{
                $template->timeDisplay = $template->created_at->format('d M Y');
            }
        }
        return view('templates.templates', compact('templates'));
    }



    public function create()
    {
        return view('templates.template-add');
    }

    public function store(Request $request)
    {
        // $count = 0;
        // foreach ($request->all() as $key => $value) {
        //     if (strpos($key, 'question_') === 0) {
        //         $count++;
        //     }
        // }
        // dd($count);

        dd($request->all());
        try {
            $i = 0;
            $recordsToInsert = [];
            $template = Template::create($request->all());
            foreach($request->question as $data){
                $record = [
                    'template_id'        => $template->id,
                    't_page_name'        => $request->page_title,
                    't_section_name'     => $request->section_name ?? null,
                    'filed_name'         => $data['value'],
                    'field_type'         => $data['question_type'] ?? '',
                    'is_required'        => isset($data['is_required']) ? $data['is_required'] : '0',
                    'sort_no'            => ++$i,
                ];

                $recordsToInsert[] = $record;
            }
            $template_field = TemplateField::insert($recordsToInsert);
            if($template_field && $template){
                return redirect()->route('template.index')->with('success', 'template created successfully.');
            }else{
                return redirect()->back()->with('success', 'Something went wrong.');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('success', $e->getMessage());
        }

    }

    public function edit(Request $request)
    {
        $template = Template::where('id', $request->id)->first();
        // dd($templates);

        return view('templates.template-edit', compact('template'));
    }
    public function update(Request $request)
    {
        try{
            // dd($request->all());
            $i = 0;
            $template = Template::findOrFail($request->id);
            $template->update($request->except(['_token', 'question']));      
            foreach($request->question as $data){
                $record = [
                    'template_id'    => $template->id,
                    't_page_name'    => $request->page_title,
                    't_section_name' => $request->section_name ?? null,
                    'filed_name'     => $data['value'],
                    'field_type'     => $data['question_type'] ?? '',
                    'is_required'    => isset($data['is_required']) ? $data['is_required'] : '0',
                    'sort_no'        => ++$i,
                ];

                if(isset($data['fielld_id'])) 
                {
                    $existingRecord = TemplateField::find($data['fielld_id']);
                    if($existingRecord) {
                        $existingRecord->update($record);
                    }
                }else{
                    $newRecord = TemplateField::insert($record);
                }
            }
        
            return redirect()->route('template.index')->with('success', 'Template updated successfully.');
        }catch(\Exception $e){
            return $data = [
                $e->getMessage(),
                $e->getLine(),
                $e->getFile()
            ];
            return redirect()->back()->with('success', $e->getMessage());
        }
        
    }
    public function getFields(Request $request)
    {
        $data = TemplateField::where('template_id', $request->id)->orderBy('sort_no', 'ASC')->get();

        if(count($data) > 0 )
        {
            return response()->json([
                'success'=> true,
                'data'=> $data,
                ]);
        }else{
            return response()->json([
                'success'=> false,
                'data'=> '',
                ]);
        }
    }
    
    public function addPage(Request $request)
    {
        $id_no = $request->no;
        $class_no = ++$id_no;
        $data_html = view('templates.add-page', compact('class_no'))->render();

        if($data_html)
        {
            return response()->json([
                'success' => true,
                'status' => 200,  
                'data'  => $data_html,
                'class_no' => $class_no      
            ]);
        }else{
            return response()->json([
                'success' => false,
                'status' => 404,
                'data'  => ''
            ]);
        }
    }
}
