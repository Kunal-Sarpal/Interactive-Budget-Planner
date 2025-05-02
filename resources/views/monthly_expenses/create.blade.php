@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create Monthly Expense</h1>
        <form action="{{ route('monthly_expense.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
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
            <div class="mb-4">
                <label for="month" class="block text-sm font-medium text-gray-700 mb-1">Month</label>
                <select id="month" name="month" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
            <div class="mb-6">
                <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                <input type="number" id="year" name="year" required min="2020" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter year">
            </div>
            <button type="submit" class="w-full bg-green-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-green-600 transition duration-200">Save Monthly Expense</button>
        </form>
    </div>
@endsection