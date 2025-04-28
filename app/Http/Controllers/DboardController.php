<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyExpense;
use App\Models\MonthlyExpense;

class DboardController extends Controller
{
    public function index()
    {
        // Fetch monthly expenses for MongoDB (manually group)
        $monthlyExpensesData = MonthlyExpense::where('user_id', auth()->id())
            ->get(['amount', 'expense_date']);  // Get all records

        $monthlyExpenses = [];

        foreach ($monthlyExpensesData as $expense) {
            $month = date('F', strtotime($expense->expense_date)); // Convert to Month Name (like January, February)
            if (!isset($monthlyExpenses[$month])) {
                $monthlyExpenses[$month] = 0;
            }
            $monthlyExpenses[$month] += $expense->amount;
        }

        // Fetch daily expenses for MongoDB
        $dailyExpensesData = DailyExpense::where('user_id', auth()->id())
            ->get(['amount', 'expense_date']);  // Get all records

        $dailyExpenses = [];

        foreach ($dailyExpensesData as $expense) {
            $date = date('Y-m-d', strtotime($expense->expense_date)); // Get the date like 2024-04-28
            if (!isset($dailyExpenses[$date])) {
                $dailyExpenses[$date] = 0;
            }
            $dailyExpenses[$date] += $expense->amount;
        }

        return view('dashboard', compact('monthlyExpenses', 'dailyExpenses'));
    }
}
