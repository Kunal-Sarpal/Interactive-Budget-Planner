@extends('layouts.app')

@section('content')
    <h1>Create Monthly Expense</h1>
    <form action="{{ route('monthly_expense.store') }}" method="POST">
        @csrf
        <div>
            <label for="description">Category</label>
            <select id="description" name="description" required>
                <option value="Food">Food</option>
                <option value="Rent">Rent</option>
                <option value="Household">Household</option>
                <option value="Outings">Outings</option>
                <option value="Transport">Transport</option>
            </select>
        </div>
        <div>
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" required>
        </div>
        <div>
            <label for="month">Month</label>
            <select id="month" name="month" required>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div>
            <label for="year">Year</label>
            <input type="number" id="year" name="year" required min="2020">
        </div>
        <button type="submit">Save Monthly Expense</button>
    </form>
@endsection
