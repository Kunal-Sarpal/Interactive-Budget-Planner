<?php

namespace App\Http\Controllers;
use App\Models\DailyExpense;
use Illuminate\Http\Request;


class DailyExpenseController extends Controller
{
     // In DailyExpenseController.php

public function create()
{
    return view('daily-expense.create');
}

public function store(Request $request)
{
    $request->validate([
        'description' => 'required|string',
        'amount' => 'required|numeric',
        'date' => 'required|date',
    ]);

    DailyExpense::create([
        'description' => $request->description,
        'amount' => $request->amount,
        'date' => $request->date,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('dashboard')->with('success', 'Daily expense added successfully!');
}

}
