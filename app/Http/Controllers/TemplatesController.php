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
        // dd($request->all());
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
                    'is_required'        => $data['is_required'] ?? '',
                    'sort_no'            => ++$i,
                ];

                $recordsToInsert[] = $record;
            }
            $template_field = TemplateField::insert($recordsToInsert);
            if($template_field && $template){
                return redirect()->back()->with('success', 'template created successfully.');
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
}
