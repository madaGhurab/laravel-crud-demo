<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Test route
Route::get('/test', function () {
    return 'Routing works!';
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Task management routes
    Route::resource('tasks', TaskController::class);

    // Admin routes (protected by admin permission)
    Route::middleware('can:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage-users');
    });

    // Logout route
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

    // Role assignment route
    Route::post('/assign-role', [RoleController::class, 'store'])->name('assign.role');
});

// Authentication routes
require __DIR__.'/auth.php';
