<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\DashboardController;

// Home Route
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/user/bookings', function () {
    return view('users.dashboard');
})->name('home');
// Booking Routes
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::post('users/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::put('/bookings/{booking}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
Route::delete('/bookings/{booking}/reject', [BookingController::class, 'reject'])->name('bookings.reject');

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');

// User Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Admin Routes
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Admin Authentication
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('login.post');
});

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings'); // Define the admin.settings route
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
});

