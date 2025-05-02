@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create Daily Expense</h1>
        <form action="{{ route('daily-expense.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select id="description" name="description" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="Food">Food</option>
                    <option value="Rent">Rent</option>
                    <option value="Household">Household</option>
                    <option value="Outings">Outings</option>
                    <option value="Transport">Transport</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                <input type="number" id="amount" name="amount" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter amount">
            </div>
            <div class="mb-6">
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                <input type="date" id="date" name="date" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">Save Daily Expense</button>
        </form>
    </div>
@endsection