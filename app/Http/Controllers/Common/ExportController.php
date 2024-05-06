<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientPortfolio;
use App\Models\ClientSite;
use App\Models\ClientSiteShift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function excelReport(Request $request, $page)
    {
        $fileName = 'data-' . date('Y-m-d');
        $content = '';

        if ($page == "missed-clean") {
            $fileName = 'missed_clean_' . date('Y_m_d');
            $results = DB::table('missed_cleans')
                ->leftJoin('client_sites', 'missed_cleans.site_id', '=', 'client_sites.id')
                ->leftJoin('client_portfolios', 'client_sites.portfolio_id', '=', 'client_portfolios.id')
                ->leftJoin('users', 'client_portfolios.manager_id', '=', 'users.id')
                ->leftJoin('clients', 'client_sites.client_id', '=', 'clients.id')
                ->leftJoin('geo_states', 'client_sites.geo_state_id', '=', 'geo_states.id')
                ->leftJoin('client_site_shifts', 'missed_cleans.client_site_shift_id', '=', 'client_site_shifts.id')
                ->leftJoin('users as cleaner', 'client_site_shifts.cleaner_id', '=', 'cleaner.id')
                ->where(function ($query) use ($request) {
                    if ($request->client) {
                        $query->where('clients.id', $request->client);
                    }
                    if ($request->portfolio) {
                        $query->where('client_portfolios.id', $request->portfolio);
                    }
                    if ($request->site) {
                        $query->where('client_sites.id', $request->site);
                    }
                    if ($request->manager) {
                        $query->where('users.id', $request->manager);
                    }
                })
                ->when($request->date_from, function ($query, $date_from) {
                    return $query->whereDate('missed_cleans.date_missed', '>=', $date_from);
                })
                ->when($request->date_to, function ($query, $date_to) {
                    return $query->whereDate('missed_cleans.date_missed', '<=', $date_to);
                })
                ->orderBy('missed_cleans.id', 'DESC')->select('clients.business_name', 'client_portfolios.full_name', 'users.name', 'client_sites.reference', 'geo_states.state_name', 'client_site_shifts.avaliable_start_time', 'client_site_shifts.avaliable_end_time', 'missed_cleans.*', 'cleaner.name AS cleaner_fname', 'cleaner.surname AS AS cleaner_sname')
                ->get();
            // usort($results, fn ($a, $b) => $b->id  <=> $a->id);


            $content = 'Sr. No., Client, Portfolio, Portfolio Manager, Reference / Building (Site), State, Cleaner, Shift Time, Missed Date' . "\r\n";

            foreach ($results as $k => $row) {
                $content .= ($k + 1) . ',' . ($row->business_name ?? '') . ',' . ($row->full_name ?? '') . ',' . ($row->name ?? '') . ',' .  ($row->reference ?? '') . ','  .  ($row->state_name ?? '') . ',' . ($row->cleaner_fname ?? '') . ' ' . ($row->cleaner_sname ?? '') . ',' . ($row->avaliable_start_time ?? '') . '-' . ($row->avaliable_end_time ?? '') . ',' . ($row->date_missed ?? '') . "\r\n";
            }
        } elseif ($page == "time-attandance") {
            $fileName = 'time_attandance_' . date('Y_m_d');

            if (auth()->user()->is_client) {
                $clients = Client::where('client_id', auth()->user()->id)->get();
                $allSites = ClientSite::whereIn('client_id', $clients)->get();
                $cleaners = ClientSiteShift::whereIn('client_site_id', $allSites->pluck('id')->toArray())->get();
            } else {
                $clients = Client::get();
                $allSites = ClientSite::get();
                $cleaners       = User::where('role', 'cleaner')->where('status', '1')->get();
            }

            $client_id                  =  $request->input('client_id');
            $portfolio_id               =  $request->input('portfolio_id');
            $site_id                    =  $request->input('site_id');
            $cleaner_id                 =  $request->input('cleaner_id');
            $city_id                    =  $request->input('city_id');
            $state_id                   =  $request->input('state_id');
            $approved_by                =  $request->input('approved_by');
            $start_form                 =  $request->input('start_form');
            $finish_form                =  $request->input('finish_form');
            $approved_from              =  $request->input('approved_from');
            $approved_to                =  $request->input('approved_to');

            $client_city_id = $city_id ? ClientSite::where('geo_city_id', $city_id)->get()->pluck('id') : null;
            $client_state_id = $state_id ?  ClientSite::where('geo_state_id', $state_id)->get()->pluck('id') : null;
            $client_portfolio_id = $portfolio_id ? ClientSite::where('portfolio_id', $portfolio_id)->get()->pluck('id') : null;

            $client_ids  = $client_id ? ClientSite::where('client_id', $client_id)->get()->pluck('id') : null;

            $results = DB::table('client_site_shift_cleaner_submissions')
                ->select('client_site_shift_cleaner_submissions.*', 'client_site_shifts.avaliable_start_time', 'client_site_shifts.avaliable_end_time', 'client_site_shifts.total_hours', 'client_site_shifts.hourly_rate', 'clients.business_name', 'client_portfolios.full_name', 'client_sites.reference', 'client_sites.distance_gps', 'cleaner.name AS cname')
                ->join('client_site_shifts', 'client_site_shifts.id', '=', 'client_site_shift_cleaner_submissions.client_site_shift_id')
                ->leftJoin('client_sites', 'client_sites.id', '=', 'client_site_shift_cleaner_submissions.client_site_id')
                ->leftJoin('client_portfolios', 'client_portfolios.id', '=', 'client_sites.portfolio_id')
                ->leftJoin('clients', 'clients.id', '=', 'client_sites.client_id')
                ->leftJoin('users as cleaner', 'cleaner.id', '=', 'client_site_shift_cleaner_submissions.cleaner_id')
                ->leftJoin('users as approved_user', 'approved_user.id', '=', 'client_site_shift_cleaner_submissions.approved_by')
                ->when($site_id, function ($query) use ($site_id) {
                    return $query->where('client_site_shift_cleaner_submissions.client_site_id', $site_id);
                })
                ->when(auth()->user()->is_client, function ($query) use ($allSites) {
                    return $query->whereIn('client_site_shift_cleaner_submissions.client_site_id', $allSites->pluck('id')->toArray());
                })
                ->when($client_ids, function ($query) use ($client_ids) {
                    return $query->whereIn('client_site_shift_cleaner_submissions.client_site_id', $client_ids);
                })
                ->when($client_portfolio_id, function ($query) use ($client_portfolio_id) {
                    return $query->whereIn('client_site_shift_cleaner_submissions.client_site_id', $client_portfolio_id);
                })
                ->when($client_city_id, function ($query) use ($client_city_id) {
                    return $query->whereIn('client_site_shift_cleaner_submissions.client_site_id', $client_city_id);
                })
                ->when($client_state_id, function ($query) use ($client_state_id) {
                    return $query->whereIn('client_site_shift_cleaner_submissions.client_site_id', $client_state_id);
                })
                ->when($cleaner_id, function ($query) use ($cleaner_id) {
                    return $query->where('client_site_shift_cleaner_submissions.cleaner_id', $cleaner_id);
                })
                ->when($approved_by, function ($query) use ($approved_by) {
                    return $query->where('client_site_shift_cleaner_submissions.approved_by', $approved_by);
                })
                ->when($start_form, function ($query) use ($start_form) {
                    return $query->whereDate('client_site_shift_cleaner_submissions.shift_start', '>=', $start_form);
                })
                ->when($finish_form, function ($query) use ($finish_form) {
                    return $query->whereDate('client_site_shift_cleaner_submissions.shift_end', '<=', $finish_form);
                })
                ->when($approved_from, function ($query) use ($approved_from) {
                    return $query->whereDate('client_site_shift_cleaner_submissions.approval_date', '>=', $approved_from);
                })
                ->when($approved_to, function ($query) use ($approved_to) {
                    return $query->whereDate('client_site_shift_cleaner_submissions.approval_date', '<=', $approved_to);
                })
                ->whereNotIn('client_site_shift_cleaner_submissions.status', ['pending', 'started'])
                ->orderByDesc('client_site_shift_cleaner_submissions.id')->get();


            $content = 'Sr. No., Client, Portfolio, Reference / Building (Site), Cleaner, Date Start, Date Finish, Total Hours, Allocated Hours, Total Payable, Distance From Site on Start, Distance From Site on Finish, Cleaner In Site or Not, Status' . "\r\n";
            foreach ($results as $k => $row) {
                $start_time24hour = strtotime(date('Y-m-d H:i:s', strtotime(date('Y-m-d', strtotime($row->shift_start)) . ' ' . ($row->avaliable_start_time ?? '00:00:00'))));
                $end_time24hour = strtotime(date('Y-m-d H:i:s', strtotime(date('Y-m-d', strtotime($row->shift_end)) . ' ' . ($row->avaliable_end_time ?? '23:59:59'))));

                $from_time = strtotime($row->shift_start);
                $to_time = strtotime($row->shift_end);
                $min = $row->shift_end ? round(abs($to_time - $from_time) / 60, 2) : 0;

                if (isset($row->hourly_rate) && $row->hourly_rate) {
                    $minrate = $row->hourly_rate / 60;
                } else {
                    $minrate = 1;
                }
                $total_pay = $min * $minrate;

                $cleanerInSite = 'Cleaner In Site';
                // Assuming you have two datetime values
                $startTime = \Carbon\Carbon::parse($row->shift_start);
                $endTime = \Carbon\Carbon::parse($row->shift_end);

                // Calculate the difference in hours and minutes
                $hours = $endTime->diffInHours($startTime);
                $minutes = $endTime->diffInMinutes($startTime) % 60;

                // Convert minutes to decimal
                $totalHours = $hours + ($minutes / 60);
                $totalHour = round($min / 60, 2);
                $payAmount = round($totalHour * ($row?->hourly_rate ?? 1), 2) ?? '0';
                if (($row->distance_gps && $row->distance_gps < $row->start_distance) || $row->distance_gps && $row->distance_gps < $row->end_distance) {
                    $cleanerInSite = "Cleaner Not In Site";
                } else {
                    $cleanerInSite = 'Cleaner In Site';
                }

                $content .= ($k + 1) . ',' . ($row->business_name ?? '-') . ',' . ($row->full_name ?? '-') . ',' . ($row->reference ?? '-') . ',' .  ($row->cname ?? '-') . ',' . ($row->shift_start ?? '-') . ',' . ($row->shift_end ?? '-') . ',' . ($totalHour ?? '-') . ',' . round($row->total_hours ?? 0, 2) . ',' . round($payAmount ?? 0, 2) . ',' . ($row->start_distance ?? '-') . ',' . ($row->end_distance ?? '-') . ',' . ($cleanerInSite ?? '-') . ',' . ucwords($row->status ?? '-') . "\r\n";
                // dd($content);
            }
        } elseif ($page == "sites") {
            $fileName = 'sites_' . date('Y_m_d');

            if (auth()->user()->role == 'admin' && !auth()->user()->is_client) {
                $clients = Client::orderBy('id', 'DESC')->get();
            } else {
                $clients = Client::where('client_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
            }
            $client       =  $request->input('client');
            $portfolio    =  $request->input('portfolio');
            $cleaner      =  $request->input('cleaner');
            $building     =  $request->input('building');
            $supervisor   =  $request->input('supervisor');
            $state        =  $request->input('state');
            $city         =  $request->input('city');
            $regular_Site =  $request->input('regular_Site');


            // $sites_data = ClientSite::with(['client', 'potfolio']);
            $results = DB::table('client_sites')
                ->select('client_sites.*', 'client_portfolios.full_name', 'clients.business_name')
                ->leftJoin('clients', 'client_sites.client_id', '=', 'clients.id')
                ->leftJoin('client_portfolios', 'client_sites.portfolio_id', '=', 'client_portfolios.id')
                ->when($clients && !$clients->isEmpty(), function ($query) use ($clients) {
                    $query->whereIn('client_sites.client_id', $clients->pluck('id')->toArray());
                })
                ->when($client, function ($query) use ($client) {
                    $query->where('client_sites.client_id', $client);
                })
                ->when($portfolio, function ($query) use ($portfolio) {
                    $query->where('client_sites.portfolio_id', $portfolio);
                })
                ->when($building, function ($query) use ($building) {
                    $query->where('client_sites.reference', $building);
                })
                ->when($supervisor, function ($query) use ($supervisor) {
                    $query->where('client_sites.supervisor_id', $supervisor);
                })
                ->when($state, function ($query) use ($state) {
                    $query->where('client_sites.geo_state_id', $state);
                })
                ->when($city, function ($query) use ($city) {
                    $query->where('client_sites.geo_city_id', $city);
                })
                ->when($regular_Site, function ($query) use ($regular_Site) {
                    $query->where('client_sites.is_regular_site', $regular_Site);
                })
                ->orderBy('client_sites.id', 'DESC')
                ->get();


            $content = 'Sr. No., Site Code, Address, Suburb, Reference / Building, Portfolio,Client, Active, Regular Site' . "\r\n";
            foreach ($results as $k => $site) {
                $isActive = 'No';
                $isRegualer = 'No';
                if ($site->status == '1') $isActive = 'Yes';
                if ($site->is_regular_site == '1') $isRegualer = 'Yes';
                $content .= ($k + 1) . ',' . ($site->internal_code ?? '-') . ',' . ($site->unit ?? '').' '.($site->address_number ?? '').' '.($site->street_address ?? '') . ',' . ($site->suburb ?? '-') . ',' .  ($site->reference ?? '-') . ',' . ($site->full_name ?? '-') . ',' . ($site->business_name ?? '-') . ',' . ($isActive). ',' . ($isRegualer). "\r\n";
            }
        }
        // else {
        //     return redirect()->back();
        // }

        return response($content)->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename=' . $fileName . '.csv')
            ->header('Pragma', 'no-cache')
            ->header("Expires", '0');
    }
}
