@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center">

    <!-- Top Bar -->
    <div class="bg-blue-600 text-white p-4 w-full flex justify-between items-center">
        <h1 class="text-2xl font-bold">Interactive Budget Planner</h1>

        <div class="space-x-4">
            @auth
                <span class="text-lg">Welcome, {{ explode(' ', auth()->user()->name)[0] }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-blue-800 rounded-md">Logout</button>
                </form>
            @else
                <a href="/login" class="px-4 py-2 bg-blue-800 rounded-md">Login</a>
                <a href="/signup" class="px-4 py-2 bg-blue-800 rounded-md">Sign Up</a>
            @endauth
        </div>
    </div>

    @auth
    <!-- Create Daily / Monthly Expense -->
    <div class="w-full md:w-1/3 mt-6 bg-white p-4 rounded-lg shadow-lg">
        <h3 class="text-xl font-semibold mb-4">Add Your Expenses</h3>
        <div class="space-x-4">
            <a href="{{ route('daily-expense.create') }}" class="bg-green-600 text-white py-2 px-4 rounded-md">Create Daily Expense</a>
            <a href="{{ route('monthly-expense.create') }}" class="bg-green-600 text-white py-2 px-4 rounded-md">Create Monthly Expense</a>
        </div>
    </div>

    <!-- Dashboard Charts -->
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-semibold mb-6">Your Expense Dashboard</h2>

        <!-- Monthly Expense Chart -->
        <div class="w-full md:w-1/2 mb-6">
            <h3 class="text-xl font-semibold mb-4">Monthly Expenses</h3>
            <canvas id="monthlyExpenseChart"></canvas>
        </div>

        <!-- Yearly Expense Chart -->
        <div class="w-full md:w-1/2 mb-6">
            <h3 class="text-xl font-semibold mb-4">Yearly Expenses (Auto Calculated)</h3>
            <canvas id="yearlyExpenseChart"></canvas>
        </div>
    </div>
    @endauth

</div>

<script>
    // Get your user's expenses from backend (passed by controller)
    var monthlyExpenses = @json($monthlyExpenses);
    var yearlyExpenses = @json($yearlyExpenses);

    // Monthly Expense Chart
    var monthlyCtx = document.getElementById('monthlyExpenseChart').getContext('2d');
    var monthlyExpenseChart = new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: Object.keys(monthlyExpenses),
            datasets: [{
                label: 'Expenses ($)',
                data: Object.values(monthlyExpenses),
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });

    // Yearly Expense Chart
    var yearlyCtx = document.getElementById('yearlyExpenseChart').getContext('2d');
    var yearlyExpenseChart = new Chart(yearlyCtx, {
        type: 'line',
        data: {
            labels: Object.keys(yearlyExpenses),
            datasets: [{
                label: 'Yearly Expenses ($)',
                data: Object.values(yearlyExpenses),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                fill: false,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
@endsection
