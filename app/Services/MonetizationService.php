<?php

namespace App\Services;

use Carbon\Carbon;

class MonetizationService
{
    // Calculate monetization for clients
    public function MonetizationForClient($shifts)
    {
        // Initialize variables to store total amounts
        $yearlyTotal = 0;
        $monthlyTotal = 0;
        $fortnightlyTotal = 0;
        $totalHours = 0;
        $totalFrequency = 0;
        $totalHourlyRate = 0;
        $serviceCost = 0;

        // Loop through each shift
        foreach ($shifts as $shift) {
            // Calculate the total hours for the shift
            $totalHours += $shift['total_hours'];

            // Calculate the total frequency
            $totalFrequency += $shift['frequency'];

            // Calculate the total hourly rate
            $totalHourlyRate += $shift['hourly_rate'];

            // Calculate the service cost based on total hours and hourly rate
            $serviceCost += $shift['total_hours'] * $shift['hourly_rate'];

            // Calculate the frequency for the shift and add to the respective totals
            $weeklyFrequency = $shift['frequency'];
            $yearlyTotal += $weeklyFrequency * $serviceCost * 52.18;
            $monthlyTotal += $weeklyFrequency * $serviceCost * 4.34;
            $fortnightlyTotal += $weeklyFrequency * $serviceCost * 2;
        }

        // Calculate the average hourly rate
        $averageHourlyRate = $totalHourlyRate / count($shifts);

        // Return the calculated values
        return [
            'yearlyIncome' => $yearlyTotal,
            'monthlyIncome' => $monthlyTotal,
            'fortnightlyIncome' => $fortnightlyTotal,
            'timeAllocated' => $totalHours,
            'frequency' => $totalFrequency,
            'hourlyRate' => $totalHourlyRate,
            'averageHourlyRate' => $averageHourlyRate,
            'serviceCost' => $serviceCost
        ];
    }

    // Calculate monetization for cleaners
    public function MonetizationForCleaner($receivables)
    {
        // Initialize variables to store total amounts
        $yearlyTotal = 0;
        $monthlyTotal = 0;
        $fortnightlyTotal = 0;
        $totalHours = 0;
        $totalFrequency = 0;
        $totalHourlyRate = 0;
        $hourlyRate = 0;
        $serviceCost = 0;

        // Loop through each receivable shift
        foreach ($receivables as $receivable) {
            // Calculate the total hours for the shift
            $totalHours += $receivable['total_hours'];

            // Calculate the total frequency
            $totalFrequency += $receivable['frequency'];

            // Calculate the total hourly rate
            $totalHourlyRate += $receivable['hourly_rate'];

            // Set hourly rate based on the receivable
            $hourlyRate = $receivable['hourly_rate'];

            $serviceCost += $receivable['total_hours'] * $receivable['hourly_rate'];

            // Calculate the frequency for the shift and add to the respective totals
            $weeklyFrequency = $receivable['frequency'];
            $yearlyTotal += $weeklyFrequency * $serviceCost * 52.18;
            $monthlyTotal += $weeklyFrequency * $serviceCost * 4.34;
            $fortnightlyTotal += $weeklyFrequency * $serviceCost * 2;
        }

        // Calculate the average hourly rate
        $averageHourlyRate = $totalHourlyRate / count($receivables);

        // Return the calculated values
        return [
            'yearlyIncome' => $yearlyTotal,
            'monthlyIncome' => $monthlyTotal,
            'fortnightlyIncome' => $fortnightlyTotal,
            'timeAllocated' => $totalHours,
            'frequency' => $totalFrequency,
            'hourlyRate' => $totalHourlyRate,
            'averageHourlyRate' => $averageHourlyRate,
            'HourlyRate' => $hourlyRate,
            'serviceCost' => $serviceCost
        ];
    }


    public function calculateMonthlyMetrics($revenueData, $expenseData)
    {
        // Initialize variables for monthly revenue and expense
        $monthlyRevenue = 0;
        $monthlyExpense = 0;

        // Get the start and end dates from the revenue data
        $dates = array_keys($revenueData);
        $startDate = min($dates);
        $endDate = max($dates);

        // Loop through each date in the revenue data
        foreach ($revenueData as $date => $revenue) {
            // Check if there's revenue data for the current date
            if (isset($revenueData[$date])) {
                // Calculate daily revenue and add it to monthly revenue
                $dailyRevenue = $revenueData[$date]['total_hour_rate'] * $revenueData[$date]['total_hours'] * $revenueData[$date]['working_days'];
                $monthlyRevenue += $dailyRevenue;
            }

            // Check if there's expense data for the current date within the derived date range
            if (isset($expenseData[$date]) && ($date >= $startDate && $date <= $endDate)) {
                // Calculate daily expense and add it to monthly expense
                $dailyExpense = $expenseData[$date]['total_hour_rate'] * $expenseData[$date]['total_hours'] * $expenseData[$date]['working_days'];
                $monthlyExpense += $dailyExpense;
            }
        }

        // Calculate Total Gross Margin
        $totalGrossMargin = $monthlyRevenue - $monthlyExpense;

        return [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'monthlyRevenue' => $monthlyRevenue,
            'monthlyExpense' => $monthlyExpense,
            'totalGrossMargin' => $totalGrossMargin,
        ];
    }
}
