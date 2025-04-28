@extends('layouts.app')

@section('content')
    <h1>Create Monthly Expense</h1>
    <form action="{{ route('monthly_expense.store') }}" method="POST">
        @csrf
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" required>
        </div>
        <div>
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" required>
        </div>
        <div>
            <label for="month">Month</label>
            <input type="number" id="month" name="month" required min="1" max="12">
        </div>
        <div>
            <label for="year">Year</label>
            <input type="number" id="year" name="year" required min="2020">
        </div>
        <button type="submit">Save Monthly Expense</button>
    </form>
@endsection
