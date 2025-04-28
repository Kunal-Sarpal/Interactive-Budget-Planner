<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DailyExpenseController;
use App\Http\Controllers\MonthlyExpenseController;
use App\Http\Controllers\DboardController;
use App\Models\DailyExpense;
use App\Models\MonthlyExpense;


// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Show signup form
Route::get('signup', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('signup');

// Handle registration form submission
Route::post('signup', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
// Dashboard Route (after successful login)
// In web.php (routes)
Route::get('/', [DboardController::class, 'index'])->name('dashboard');


// Budget Routes
Route::get('/create-budget', function () {
    return view('budget.create');
})->name('create-budget');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::post('/store-budget', [BudgetController::class, 'store'])->name('store-budget');


/// For daily expenses
Route::get('/daily-expense/create', [DailyExpenseController::class, 'create'])->name('daily-expense.create');
Route::post('/daily-expense', [DailyExpenseController::class, 'store'])->name('daily-expense.store');

// For monthly expenses
Route::get('/monthly_expense/create', [MonthlyExpenseController::class, 'create'])->name('monthly_expense.create');
Route::post('/monthly_expense', [MonthlyExpenseController::class, 'store'])->name('monthly_expense.store');
// Put this in a temporary route for once
Route::get('/fix-userid', function () {
    $userId = auth()->id(); // or manually set one for now

    DailyExpense::whereNull('user_id')->update([
        'user_id' => $userId,
    ]);

    MonthlyExpense::whereNull('user_id')->update([
        'user_id' => $userId,
    ]);

    return 'User ID added to all old expenses!';
});
