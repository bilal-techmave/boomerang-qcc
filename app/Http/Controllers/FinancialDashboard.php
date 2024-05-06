<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Models\WorkOrderSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FinancialDashboard extends Controller
{
    public function workOrderDashboard()
    {
        $WorkOrderStatus = ['Completed', 'To Invoice'];

        // Group by status and get the sum of the budget
        $budget = WorkOrder::groupBy('status')
            ->whereIn('status', $WorkOrderStatus)
            ->selectRaw('status, sum(budget) as total_budget')
            ->get();

        // Initialize data array with zeros
        $workbudget = [
            'labels' => $WorkOrderStatus,
            'data' => array_fill(0, count($WorkOrderStatus), 0),
        ];

        // Update data with the sum of the budget if the status exists in the result
        foreach ($budget as $status) {
            $index = array_search($status->status, $WorkOrderStatus);
            if ($index !== false) {
                $workbudget['data'][$index] = ((int)$status->total_budget > 0) ? (int)$status->total_budget : 0;
            }
        }


        // Group by status and get the sum of the budget
        $sales = WorkOrder::groupBy('status')
            ->whereIn('status', $WorkOrderStatus)
            ->selectRaw('status, sum(sales_price) as total_budget')
            ->get();

        // Initialize data array with zeros
        $worksales = [
            'labels' => $WorkOrderStatus,
            'data' => array_fill(0, count($WorkOrderStatus), 0),
        ];


        // Update data with the sum of the budget if the status exists in the result
        foreach ($sales as $statussales) {
            $index = array_search($statussales->status, $WorkOrderStatus);
            if ($index !== false) {
                $worksales['data'][$index] = ((int)$statussales->total_budget > 0) ? (int) $statussales->total_budget : 0;
            }
        }

        // dd($workbudget,$worksales);

        $last30Days = now()->subDays(30);
        $last10Days = now()->subDays(10);

        $completed = WorkOrder::where('status', 'Completed')->where('is_change_client',1)
            ->where('updated_at', '>=', $last30Days)
            ->groupBy(DB::raw('DATE(updated_at)'))
            ->select(DB::raw('DATE(updated_at) as date'), DB::raw('count(*) as count'))
            ->get()->pluck('count', 'date')->toArray();

        $to_invoiced = WorkOrder::where('status', 'To Invoice')->where('is_change_client',1)
            ->where('updated_at', '>=', $last30Days)
            ->groupBy(DB::raw('DATE(updated_at)'))
            ->select(DB::raw('DATE(updated_at) as date'), DB::raw('count(*) as count'))
            ->get()->pluck('count', 'date')->toArray();

        $invoiced = WorkOrder::where('status', 'Invoiced')->where('is_change_client',1)
            ->where('updated_at', '>=', $last30Days)
            ->groupBy(DB::raw('DATE(updated_at)'))
            ->select(DB::raw('DATE(updated_at) as date'), DB::raw('count(*) as count'))
            ->get()->pluck('count', 'date')->toArray();

        $nonChargable = WorkOrder::where('status', 'Invoiced')->where('is_change_client',0)
            ->where('updated_at', '>=', $last10Days)
            ->groupBy(DB::raw('DATE(updated_at)'))
            ->select(DB::raw('DATE(updated_at) as date'), DB::raw('count(*) as count'))
            ->get()->pluck('count', 'date')->toArray();


            $sales_price = WorkOrder::groupBy(DB::raw('DATE(created_at)'))
            ->where('created_at', '>=', $last30Days)
            ->select(
                DB::raw('DATE(created_at) as created_date'),
                DB::raw('SUM(sales_price) as total_sales')
            )
            ->get()->pluck('total_sales', 'created_date')->toArray();

        $budget_price = WorkOrder::groupBy(DB::raw('DATE(created_at)'))
            ->where('created_at', '>=', $last30Days)
            ->select(
                DB::raw('DATE(created_at) as created_date'),
                DB::raw('SUM(budget) as total_budget')
            )->get()->pluck('total_budget', 'created_date')->toArray();
        // Organize the data into an array
        $completeCount = [];
        $toInvoiceCount = [];
        $invoicedCount = [];
        $salePrice = [];
        $budgetPrice = [];

        for ($i = 0; $i <= 32; $i++) {
            $idate = Carbon::parse($last30Days)->addDays($i)->format('Y-m-d');
            $completeCount[$idate] = isset($completed[$idate]) ? $completed[$idate] : 0;
            $toInvoiceCount[$idate] = isset($to_invoiced[$idate]) ? $to_invoiced[$idate] : 0;
            $invoicedCount[$idate] = isset($invoiced[$idate]) ? $invoiced[$idate] : 0;
            $salePrice[$idate] = isset($sales_price[$idate]) ? (int)$sales_price[$idate] : 0;
            $budgetPrice[$idate] = isset($budget_price[$idate]) ? (int)$budget_price[$idate] : 0;
        }

        $nonChargableCount=[];
        for ($i = 0; $i <= 10; $i++) {
            $idate = Carbon::parse($last10Days)->addDays($i)->format('Y-m-d');
            $nonChargableCount[$idate]=isset($nonChargable[$idate]) ? $nonChargable[$idate] : 0;
        }

        return view('dashboard.financial.work-order-dashboard', compact('workbudget', 'worksales', 'completeCount', 'toInvoiceCount', 'invoicedCount','budgetPrice','salePrice','nonChargableCount'));
    }

    public function managerDashboard(Request $request)
    {
        $workorderData =  WorkOrder::with(['portfolio','portfolio.protfolio_manager']);


        if($request->fromdate && $request->todate && $request->completion_date){
            $workorderData->whereBetween('completion_date',[$request->fromdate,$request->todate]);
        }elseif($request->fromdate && $request->todate && $request->creation_date){
            $workorderData->whereBetween('schedule_date',[$request->fromdate,$request->todate]);
        }elseif($request->fromdate && $request->todate){
            $workorderData->whereBetween('created_at',[$request->fromdate,$request->todate]);
        }

        $workOrders = $workorderData->get();


        $groupedByManager = $workOrders->groupBy(function ($workOrder) {
            if($workOrder->portfolio && $workOrder->portfolio->protfolio_manager && $workOrder->portfolio->protfolio_manager->name){
                return $workOrder->portfolio->protfolio_manager->name.' '.$workOrder->portfolio->protfolio_manager->surname;
            }
        });

        $ftotalSales = 0;
        $ftotalBudget = 0;
        $ftotalGMargin = 0;

        $groupedByManagerWithSums = $groupedByManager->map(function ($group) use (&$ftotalSales, &$ftotalBudget, &$ftotalGMargin) {
            $totalSales = $group->sum('sales_price');
            $totalBudget = $group->sum('budget');
            $grossMargin = $totalSales - $totalBudget;

            $ftotalSales += $totalSales;
            $ftotalBudget += $totalBudget;
            $ftotalGMargin += $grossMargin;

            return [
                'total_sales' => $totalSales,
                'total_budget' => $totalBudget,
                'gross_margin' => $grossMargin
            ];
        });

        // Add overall totals with percentages to the collection
        $groupedByManagerWithSums->put('overall_totals', [
            'total_sales' => $ftotalSales,
            'total_budget' => $ftotalBudget,
            'gross_margin' => $ftotalGMargin,
            'total' => $ftotalSales+$ftotalBudget
        ]);


        $groupedByManagerWithSums = $groupedByManagerWithSums->toArray();

        $totalData = $groupedByManagerWithSums['overall_totals'];
        unset($groupedByManagerWithSums['overall_totals']);

// dd($groupedByManagerWithSums);

        return view('dashboard.financial.manager-dashboard',compact('totalData','groupedByManagerWithSums'));
    }
}
