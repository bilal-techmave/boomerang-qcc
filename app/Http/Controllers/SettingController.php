<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:system-configuration-edit')->only(['index','create']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings_data = Setting::get()->pluck('meta_value','meta_key');
        $manager_user = User::where('role','staff')->get();
        return view('administration.system-configuration',compact('settings_data','manager_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){

        $ticket_configuration = [
            ['main_keyword'=>'ticket_config','meta_key'=>'hours_without_update_urgent_ticket','meta_value'=>$request->hours_without_update_urgent_ticket],
            ['main_keyword'=>'ticket_config','meta_key'=>'hours_without_update_high_ticket','meta_value'=>$request->hours_without_update_high_ticket],
            ['main_keyword'=>'ticket_config','meta_key'=>'hours_without_update_medium_ticket','meta_value'=>$request->hours_without_update_medium_ticket],
            ['main_keyword'=>'ticket_config','meta_key'=>'hours_without_update_low_ticket','meta_value'=>$request->hours_without_update_low_ticket]
        ];

        foreach ($ticket_configuration as $entry) {
            Setting::updateOrCreate(['main_keyword' => $entry['main_keyword'],'meta_key'=>$entry['meta_key']],['meta_value' => $entry['meta_value']]);
        }


        $document_configuration = [
            ['main_keyword'=>'document_config','meta_key'=>'unit','meta_value'=>$request->unit],
            ['main_keyword'=>'document_config','meta_key'=>'days_before_passport_expire','meta_value'=>$request->days_before_passport_expire],
            ['main_keyword'=>'document_config','meta_key'=>'days_before_police_certificate_expire','meta_value'=>$request->days_before_police_certificate_expire],
            ['main_keyword'=>'document_config','meta_key'=>'days_before_visa_expire','meta_value'=>$request->days_before_visa_expire],
            ['main_keyword'=>'document_config','meta_key'=>'days_before_driver_licence_expire','meta_value'=>$request->days_before_driver_licence_expire],
            ['main_keyword'=>'document_config','meta_key'=>'days_before_induction_expire','meta_value'=>$request->days_before_induction_expire]
        ];

        foreach ($document_configuration as $entry) {
            Setting::updateOrCreate(['main_keyword' => $entry['main_keyword'],'meta_key'=>$entry['meta_key']],['meta_value' => $entry['meta_value']]);
        }

        $email_configuration = [
            ['main_keyword'=>'email_config','meta_key'=>'new_ticket','meta_value'=>$request->new_ticket],
            ['main_keyword'=>'email_config','meta_key'=>'ticket_answer','meta_value'=>$request->ticket_answer],
            ['main_keyword'=>'email_config','meta_key'=>'ticket_solved','meta_value'=>$request->ticket_solved],
            ['main_keyword'=>'email_config','meta_key'=>'ticket_closed','meta_value'=>$request->ticket_closed],
            ['main_keyword'=>'email_config','meta_key'=>'ticket_overdue','meta_value'=>$request->ticket_overdue],
            ['main_keyword'=>'email_config','meta_key'=>'ticket_reopen','meta_value'=>$request->ticket_reopen],
            ['main_keyword'=>'email_config','meta_key'=>'ticket_progress','meta_value'=>$request->ticket_progress],
            ['main_keyword'=>'email_config','meta_key'=>'expired_document','meta_value'=>$request->expired_document],
            ['main_keyword'=>'email_config','meta_key'=>'new_workorder_cleaner','meta_value'=>$request->new_workorder_cleaner],
            ['main_keyword'=>'email_config','meta_key'=>'scheduled_workorder','meta_value'=>$request->scheduled_workorder],
            ['main_keyword'=>'email_config','meta_key'=>'weekly_workorder_cleaner','meta_value'=>$request->weekly_workorder_cleaner],
            ['main_keyword'=>'email_config','meta_key'=>'send_confirmation_workorder','meta_value'=>$request->send_confirmation_workorder],
            ['main_keyword'=>'email_config','meta_key'=>'closed_workorder','meta_value'=>$request->closed_workorder],
            ['main_keyword'=>'email_config','meta_key'=>'lost_password','meta_value'=>$request->lost_password],
            ['main_keyword'=>'email_config','meta_key'=>'new_user','meta_value'=>$request->new_user]
        ];

        foreach ($email_configuration as $entry) {
            Setting::updateOrCreate(['main_keyword' => $entry['main_keyword'],'meta_key'=>$entry['meta_key']],['meta_value' => $entry['meta_value']]);
        }

        $compliance_configuration = [
            ['main_keyword'=>'compliance_config','meta_key'=>'compliance_manager','meta_value'=>$request->compliance_manager],
            ['main_keyword'=>'compliance_config','meta_key'=>'incident_report','meta_value'=>$request->incident_report],
            ['main_keyword'=>'compliance_config','meta_key'=>'completed_incident_report','meta_value'=>$request->completed_incident_report],
            ['main_keyword'=>'compliance_config','meta_key'=>'reopened_incident_report','meta_value'=>$request->reopened_incident_report],
            ['main_keyword'=>'compliance_config','meta_key'=>'final_incident_report','meta_value'=>$request->final_incident_report]
        ];

        foreach ($compliance_configuration as $entry) {
            Setting::updateOrCreate(['main_keyword' => $entry['main_keyword'],'meta_key'=>$entry['meta_key']],['meta_value' => $entry['meta_value']]);
        }

        return redirect()->back()->with('Data Updated Successfully!');


    }

}
