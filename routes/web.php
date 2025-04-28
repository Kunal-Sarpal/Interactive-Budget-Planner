<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Show signup form
Route::get('signup', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('signup');

// Handle registration form submission
Route::post('signup', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
// Dashboard Route (after successful login)
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Budget Routes
Route::get('/create-budget', function () {
    return view('budget.create');
})->name('create-budget');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::post('/store-budget', [BudgetController::class, 'store'])->name('store-budget');
