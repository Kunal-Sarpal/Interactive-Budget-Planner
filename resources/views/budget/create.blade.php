@extends('layouts.app')

@section('content')
  <div class="container mx-auto p-6">
    <h2 class="text-3xl font-semibold mb-6">Create New Budget</h2>

    <!-- Budget Creation Form -->
    <form action="{{ route('store-budget') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
      @csrf
      <div class="mb-4">
        <label for="budget_name" class="block text-sm font-semibold">Budget Name</label>
        <input type="text" id="budget_name" name="budget_name" required class="mt-2 p-2 border border-gray-300 rounded w-full" placeholder="Enter budget name">
      </div>

      <div class="mb-4">
        <label for="amount" class="block text-sm font-semibold">Amount</label>
        <input type="number" id="amount" name="amount" required class="mt-2 p-2 border border-gray-300 rounded w-full" placeholder="Enter budget amount">
      </div>

      <div class="mb-4">
        <label for="category" class="block text-sm font-semibold">Category</label>
        <select id="category" name="category" class="mt-2 p-2 border border-gray-300 rounded w-full">
          <option value="income">Income</option>
          <option value="expenses">Expenses</option>
        </select>
      </div>

      <div class="flex justify-between">
        <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-md">Save Budget</button>
        <a href="{{ route('dashboard') }}" class="bg-gray-600 text-white py-2 px-4 rounded-md">Back to Dashboard</a>
      </div>
    </form>
  </div>
@endsection
