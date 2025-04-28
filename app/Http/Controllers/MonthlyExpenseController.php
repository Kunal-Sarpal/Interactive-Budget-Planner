<?php

use App\Models\MonthlyExpense;
use Illuminate\Http\Request;

class MonthlyExpenseController extends Controller
{
    // Display a listing of monthly expenses
    public function index()
    {
        $expenses = MonthlyExpense::all();
        return view('monthly_expenses.index', compact('expenses'));
    }

    // Store a newly created monthly expense in storage
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'month' => 'required|string',
            'year' => 'required|numeric',
            'category' => 'required|string',
        ]);

        MonthlyExpense::create($request->all());

        return redirect()->route('monthly-expense.index');
    }

    // Show the form for creating a new monthly expense
    public function create()
    {
        return view('monthly_expenses.create');
    }

    // Show the form for editing an existing monthly expense
    public function edit($id)
    {
        $expense = MonthlyExpense::findOrFail($id);
        return view('monthly_expenses.edit', compact('expense'));
    }

    // Update the specified monthly expense in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'month' => 'required|string',
            'year' => 'required|numeric',
            'category' => 'required|string',
        ]);

        $expense = MonthlyExpense::findOrFail($id);
        $expense->update($request->all());

        return redirect()->route('monthly-expense.index');
    }

    // Remove the specified monthly expense from storage
    public function destroy($id)
    {
        $expense = MonthlyExpense::findOrFail($id);
        $expense->delete();

        return redirect()->route('monthly-expense.index');
    }
}
