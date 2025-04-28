<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyExpense;
use App\Models\MonthlyExpense;

class DboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please login to view the dashboard');
        }

        // Fetch daily expenses grouped by day name (you might have to add 'date' in DailyExpense)
        $dailyExpenses = DailyExpense::where('user_id', $userId)
            ->get()
            ->groupBy(function ($item) {
                if (!empty($item->date)) {
                    return \Carbon\Carbon::parse($item->date)->format('l'); // Monday, Tuesday, etc.
                }
                return 'Unknown'; // if no date field exists
            })
            ->map(function ($dayExpenses) {
                return $dayExpenses->sum('amount');
            })
            ->toArray();

        // Fetch monthly expenses grouped by month name
        $monthlyExpenses = MonthlyExpense::where('user_id', $userId)
            ->get()
            ->groupBy('month') // grouping by stored month
            ->map(function ($monthExpenses) {
                return $monthExpenses->sum('amount');
            })
            ->toArray();

        // Fetch yearly expenses grouped by year
        $yearlyExpenses = MonthlyExpense::where('user_id', $userId)
            ->get()
            ->groupBy('year') // grouping by stored year
            ->map(function ($yearExpenses) {
                return $yearExpenses->sum('amount');
            })
            ->toArray();

        // Top 5 months with highest expenses
        $topMonths = MonthlyExpense::where('user_id', $userId)
            ->get()
            ->groupBy('month')
            ->map(function ($monthExpenses) {
                return $monthExpenses->sum('amount');
            })
            ->sortDesc()
            ->take(5)
            ->toArray();

        return view('dashboard', compact('dailyExpenses', 'monthlyExpenses', 'yearlyExpenses', 'topMonths'));
    }
}
