@extends('layouts.app')

@section('content')
  <div class="container mx-auto px-4 py-8 max-w-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Login</h2>

    <!-- Login Form -->
    <form action="{{ route('login') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
      @csrf
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your email">
      </div>

      <div class="mb-6">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" id="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your password">
      </div>

      <div class="flex justify-between items-center">
        <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">Login</button>
        <a href="{{ route('signup') }}" class="text-blue-600 hover:text-blue-800 font-medium">Don't have an account? Sign up</a>
      </div>
    </form>
  </div>
@endsection