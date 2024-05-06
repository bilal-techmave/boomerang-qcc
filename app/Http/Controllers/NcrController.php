<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ClientPortfolioSite;
use App\Models\{Ncr, NcrAction};

class NcrController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:ncr-report-view')->only(['index', 'show']);
        $this->middleware('role:ncr-report-create')->only(['create', 'store']);
        $this->middleware('role:ncr-report-solve')->only(['edit', 'update']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ncr = Ncr::with('protfolioSite')->get();

        return view('reports.ncr.ncr-reports', compact('ncr'));
    }

    public function create()
    {
        // $incidents = Incident::all();
        // return view('reports');
        $allprotfolio = ClientPortfolioSite::with(['site','site.state','protfolio','protfolio.client'])->has('protfolio')->has('site')->has('protfolio.client')->get();
        return view('reports.ncr.ncr-add',compact('allprotfolio'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'responsible' => 'required',
            'client_portfolio_site' => 'required',
            'non_conformance_type' => 'required',
        ]);

        $ncr=[
            "creator_name"=>$request->creater_name ?? null,
            "creator_phone"=>$request->creater_phone ?? null,
            "incident_id"=>$request->incident_id ?? null,
            "responsible"=>$request->responsible ?? null,
            "client_portfolio_site"=>$request->client_portfolio_site ?? null,
            "non_conformance_type"=>json_encode($request->non_conformance_type) ?? null,
            "non_conformity_details"=>$request->non_conformity_details ?? null,

        ];

        Ncr::insert($ncr);

        return redirect()->back()->with('success','Non-Conformance Report Created Successfully.');

    }

    public function showAction($id)
    {
        $action = NcrAction::where('id', $id)->first();
        $ncr = Ncr::where('incident_id', $action->incident_id)->first();
        return view('reports.ncr.ncr-action-view', compact('action', 'ncr'));

        // return view('reports.incident.incident-reports-view');
    }

    public function show($id)
    {
        $ncr = Ncr::where('id', $id)->first();
        $action = NcrAction::where('incident_id', $ncr->incident_id)->get();
        $selectedprotfolio = ClientPortfolioSite::with(['site','site.state','protfolio','protfolio.client'])->has('protfolio')->has('site')->has('protfolio.client')->whereId($ncr->client_portfolio_site)->first();
        return view('reports.ncr.ncr-report-view', compact('selectedprotfolio','ncr', 'action'));

        // return view('reports.incident.incident-reports-view');
    }

    public function edit($id)
    {
        $allprotfolio = ClientPortfolioSite::with(['site','site.state','protfolio','protfolio.client'])->has('protfolio')->has('site')->has('protfolio.client')->get();
        $ncr = Ncr::findOrFail($id);
        $action = NcrAction::where('incident_id', $ncr->incident_id)->get();
        return view('reports.ncr.ncr-reports-edit', compact('allprotfolio', 'ncr', 'action'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'responsible' => 'required',
        ]);
        $ncr=[
            "creator_name"=>$request->creater_name ?? null,
            "creator_phone"=>$request->creater_phone ?? null,
            "incident_id"=>$request->incident_id ?? null,
            "responsible"=>$request->responsible ?? null,
            "client_portfolio_site"=>$request->client_portfolio_site ?? null,
            "non_conformance_type"=>json_encode($request->non_conformance_type) ?? null,
            "non_conformity_details"=>$request->non_conformity_details ?? null,

        ];

        Ncr::where('id', $id)->update($ncr);

        return redirect()->route('ncr.index')->with('success','Non-Conformance Report Updated Successfully.');
    }

    public function recommendedActions(Request $request)
    {
        if($request->action_type == 'recommended') {
            $ncr=[
                "recommended_actions"=>$request->recommended_actions ?? null,
                "by_whom"=>$request->by_whom ?? null,
                "due_date"=>$request->due_date ?? null,
                "status"=>'recommended',
                "incident_id" => $request->incident_id ?? null,
            ];
        }else if($request->action_type == 'corrective'){
                $ncr=[
                    "recommended_actions"=>$request->recommended_actions ?? null,
                    "due_date"=>$request->due_date ?? null,
                    "completed_date"=>$request->completed_date ?? null,
                    "status"=>'corrective',
                    "incident_id" => $request->incident_id ?? null,
                ];
        }
        
        NcrAction::insert($ncr);
        return redirect()->back()->with('success','Action inserted Successfully.');

    }

}