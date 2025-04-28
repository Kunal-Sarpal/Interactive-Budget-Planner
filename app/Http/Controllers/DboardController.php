<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyExpense;
use App\Models\MonthlyExpense;

class DboardController extends Controller
{
    public function index()
    {
        // Fetch all expenses
        $monthlyExpensesData = MonthlyExpense::where('user_id', auth()->id())->get();
        $dailyExpensesData = DailyExpense::where('user_id', auth()->id())->get();
    
        // Prepare Monthly Expense Data
        $monthlyExpenses = [];
        foreach ($monthlyExpensesData as $expense) {
            $month = date('F', strtotime($expense->expense_date)); // Month name
            $monthlyExpenses[$month] = ($monthlyExpenses[$month] ?? 0) + $expense->amount;
        }
    
        // Prepare Daily Expense Data
        $dailyExpenses = [];
        foreach ($dailyExpensesData as $expense) {
            $date = date('Y-m-d', strtotime($expense->expense_date));
            $dailyExpenses[$date] = ($dailyExpenses[$date] ?? 0) + $expense->amount;
        }
    
        // Prepare Yearly Expense Data
        $yearlyExpenses = [];
        foreach ($monthlyExpensesData as $expense) {
            $year = date('Y', strtotime($expense->expense_date));
            $yearlyExpenses[$year] = ($yearlyExpenses[$year] ?? 0) + $expense->amount;
        }
    
        // Prepare Top 5 Most Expensive Months
        $topMonths = collect($monthlyExpenses)->sortDesc()->take(5);
    
        // 👇 Now send ALL variables
        return view('dashboard', compact('monthlyExpenses', 'dailyExpenses', 'yearlyExpenses', 'topMonths'));
    }
    
}
