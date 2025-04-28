<?php

namespace App\Http\Controllers;
use App\Models\MonthlyExpense;
use Illuminate\Http\Request;


class MonthlyExpenseController extends Controller
{
    // Display a listing of monthly expenses
   // In MonthlyExpenseController.php

public function create()
{
    return view('monthly_expenses.create');
}

public function store(Request $request)
{
    $request->validate([
        'description' => 'required|string',
        'amount' => 'required|numeric',
        'month' => 'required|integer',
        'year' => 'required|integer',
    ]);

    MonthlyExpense::create([
        'description' => $request->description,
        'amount' => $request->amount,
        'month' => $request->month,
        'year' => $request->year,
    ]);

    return redirect()->route('dashboard')->with('success', 'Monthly expense added successfully!');
}

}
