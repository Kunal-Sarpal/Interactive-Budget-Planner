@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Create Daily Expense</h2>

    <form action="{{ route('daily-expense.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Date:</label>
            <input type="date" name="date" class="w-full border p-2" required>
        </div>
        <div>
            <label>Amount ($):</label>
            <input type="number" step="0.01" name="amount" class="w-full border p-2" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
