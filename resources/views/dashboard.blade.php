@extends('layouts.app')

@section('content')
<div class="flex flex-col min-h-screen bg-gray-100">

    <!-- Top Bar -->
    <header class="bg-blue-700 text-white p-5 shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-extrabold">Budget Planner</h1>

        <nav class="flex items-center space-x-6">
            @auth
                <span class="text-lg font-medium">Hi, {{ explode(' ', auth()->user()->name)[0] }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-white text-blue-700 hover:bg-gray-100 px-4 py-2 rounded-md transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-white text-blue-700 hover:bg-gray-100 px-4 py-2 rounded-md transition">Login</a>
                <a href="{{ route('register') }}" class="bg-white text-blue-700 hover:bg-gray-100 px-4 py-2 rounded-md transition">Sign Up</a>
            @endauth
        </nav>
    </header>

    @auth
    <!-- Add Expenses Section -->
    <section class="w-full max-w-4xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Manage Your Expenses</h2>
        <div class="flex flex-wrap gap-6">
            <a href="{{ route('daily-expense.create') }}" class="flex-1 min-w-[200px] bg-green-600 hover:bg-green-700 text-white py-3 px-5 rounded-md text-center transition text-lg font-semibold">
                Add Daily Expense
            </a>
            <a href="{{ route('monthly_expense.create') }}" class="flex-1 min-w-[200px] bg-green-600 hover:bg-green-700 text-white py-3 px-5 rounded-md text-center transition text-lg font-semibold">
                Add Monthly Expense
            </a>
        </div>
    </section>

    <!-- Charts Section -->
    <section class="container mx-auto my-10 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Monthly Chart -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold mb-4 text-gray-700">Monthly Expenses</h3>
                <canvas id="monthlyExpenseChart" height="200"></canvas>
            </div>

            <!-- Daily Chart -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold mb-4 text-gray-700">Daily Expenses</h3>
                <canvas id="dailyExpenseChart" height="200"></canvas>
            </div>

            <!-- Yearly Chart -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold mb-4 text-gray-700">Yearly Expenses</h3>
                <canvas id="yearlyExpenseChart" height="200"></canvas>
            </div>

            <!-- Top 5 Months Chart -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-xl font-bold mb-4 text-gray-700">Top 5 Expensive Months</h3>
                <canvas id="topMonthsChart" height="200"></canvas>
            </div>
        </div>
    </section>
    @endauth

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Load data from Controller
    let monthlyExpenses = @json($monthlyExpenses ?? []);
    let dailyExpenses = @json($dailyExpenses ?? []);
    let yearlyExpenses = @json($yearlyExpenses ?? []);
    let topMonths = @json($topMonths ?? []);

    // Dummy Data Fallback
    if (Object.keys(monthlyExpenses).length === 0) {
        monthlyExpenses = { "January": 300, "February": 400, "March": 500 };
    }
    if (Object.keys(dailyExpenses).length === 0) {
        dailyExpenses = { "Monday": 50, "Tuesday": 60, "Wednesday": 70 };
    }
    if (Object.keys(yearlyExpenses).length === 0) {
        yearlyExpenses = { "2023": 5000, "2024": 6500 };
    }
    if (Object.keys(topMonths).length === 0) {
        topMonths = { "January": 1200, "February": 1100, "March": 900, "April": 800, "May": 750 };
    }

    // Common chart config function
    function createChart(ctx, type, labels, datasetLabel, data, colors = null) {
        return new Chart(ctx, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    label: datasetLabel,
                    data: data,
                    backgroundColor: colors || 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: type === 'line'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: type === 'doughnut' ? 'bottom' : 'top' }
                },
                scales: type !== 'doughnut' ? {
                    y: { beginAtZero: true }
                } : {}
            }
        });
    }

    // Monthly Expenses Chart
    createChart(
        document.getElementById('monthlyExpenseChart').getContext('2d'),
        'bar',
        Object.keys(monthlyExpenses),
        'Monthly Expenses ($)',
        Object.values(monthlyExpenses)
    );

    // Daily Expenses Chart
    createChart(
        document.getElementById('dailyExpenseChart').getContext('2d'),
        'line',
        Object.keys(dailyExpenses),
        'Daily Expenses ($)',
        Object.values(dailyExpenses)
    );

    // Yearly Expenses Chart
    createChart(
        document.getElementById('yearlyExpenseChart').getContext('2d'),
        'bar',
        Object.keys(yearlyExpenses),
        'Yearly Expenses ($)',
        Object.values(yearlyExpenses)
    );

    // Top 5 Expensive Months Chart
    createChart(
        document.getElementById('topMonthsChart').getContext('2d'),
        'doughnut',
        Object.keys(topMonths),
        'Top 5 Expensive Months',
        Object.values(topMonths),
        [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)'
        ]
    );
});
</script>
@endsection
