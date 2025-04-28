@extends('layouts.app')

@section('content')
  <div class="container mx-auto p-6">
    <!-- Dashboard Header -->
    <div class="bg-blue-600 text-white p-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold">Interactive Budget Planner</h1>
      <div class="space-x-4">
        <a href="/login" class="px-4 py-2 bg-blue-800 rounded-md">Login</a>
        <a href="/signup" class="px-4 py-2 bg-blue-800 rounded-md">Sign Up</a>
      </div>
    </div>

    <!-- Dashboard Content -->
    <div class="space-y-6 mt-6">
      <div>
        <h2 class="text-3xl font-semibold mb-4">Your Budget Dashboard</h2>
        
        <!-- Monthly Budget Chart -->
        <div class="w-full md:w-1/2 mb-6">
          <h3 class="text-xl font-semibold mb-4">Monthly Budget</h3>
          <canvas id="monthlyBudgetChart"></canvas>
        </div>

        <!-- Yearly Budget Chart -->
        <div class="w-full md:w-1/2 mb-6">
          <h3 class="text-xl font-semibold mb-4">Yearly Budget</h3>
          <canvas id="yearlyBudgetChart"></canvas>
        </div>
        
        <!-- Create New Budget Section -->
        <div class="w-full md:w-1/3 mt-6 bg-white p-4 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold mb-4">Create Your Budget</h3>
          <div class="space-x-4">
            <!-- Redirect to Create Budget Page -->
            <a href="{{ route('create-budget') }}" class="bg-green-600 text-white py-2 px-4 rounded-md">Create Budget</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Monthly and Yearly Budget Charts
    var ctxMonthly = document.getElementById('monthlyBudgetChart').getContext('2d');
    var ctxYearly = document.getElementById('yearlyBudgetChart').getContext('2d');

    var monthlyChart = new Chart(ctxMonthly, {
      type: 'bar',
      data: {
        labels: ['Rent', 'Groceries', 'Entertainment', 'Utilities'],
        datasets: [{
          label: 'Monthly Budget',
          data: [500, 200, 150, 100], // Example values
          backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
          borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'],
          borderWidth: 1
        }]
      }
    });

    var yearlyChart = new Chart(ctxYearly, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
          label: 'Yearly Budget',
          data: [5000, 4000, 3000, 3500, 4000], // Example values
          fill: false,
          borderColor: 'rgba(75, 192, 192, 1)',
          tension: 0.1
        }]
      }
    });
  </script>
@endsection
