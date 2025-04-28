<?php

use App\Models\DailyExpense;
use Illuminate\Http\Request;

class DailyExpenseController extends Controller
{
    // Display a listing of daily expenses
    public function index()
    {
        $expenses = DailyExpense::all();
        return view('daily_expenses.index', compact('expenses'));
    }

    // Store a newly created daily expense in storage
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string',
        ]);

        DailyExpense::create($request->all());

        return redirect()->route('daily-expense.index');
    }

    // Show the form for creating a new daily expense
    public function create()
    {
        return view('daily_expenses.create');
    }

    // Show the form for editing an existing daily expense
    public function edit($id)
    {
        $expense = DailyExpense::findOrFail($id);
        return view('daily_expenses.edit', compact('expense'));
    }

    // Update the specified daily expense in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string',
        ]);

        $expense = DailyExpense::findOrFail($id);
        $expense->update($request->all());

        return redirect()->route('daily-expense.index');
    }

    // Remove the specified daily expense from storage
    public function destroy($id)
    {
        $expense = DailyExpense::findOrFail($id);
        $expense->delete();

        return redirect()->route('daily-expense.index');
    }
}
