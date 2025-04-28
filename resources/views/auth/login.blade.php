@extends('layouts.app')

@section('content')
  <div class="container mx-auto p-6">
    <h2 class="text-3xl font-semibold mb-6">Login</h2>

    <!-- Login Form -->
    <form action="{{ route('login') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
      @csrf
      <div class="mb-4">
        <label for="email" class="block text-sm font-semibold">Email</label>
        <input type="email" id="email" name="email" required class="mt-2 p-2 border border-gray-300 rounded w-full" placeholder="Enter your email">
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-semibold">Password</label>
        <input type="password" id="password" name="password" required class="mt-2 p-2 border border-gray-300 rounded w-full" placeholder="Enter your password">
      </div>

      <div class="flex justify-between">
        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md">Login</button>
        <a href="{{ route('signup') }}" class="text-blue-600">Don't have an account? Sign up</a>
      </div>
    </form>
  </div>
@endsection
