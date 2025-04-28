@extends('layouts.app')

@section('content')
    <h1>Create Daily Expense</h1>
    <form action="{{ route('daily-expense.store') }}" method="POST">
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
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>
        </div>
        <button type="submit">Save Daily Expense</button>
    </form>
@endsection
