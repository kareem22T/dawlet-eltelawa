<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContestantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/results', [HomeController::class, 'results'])->name('results');

// Voting routes
Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
Route::get('/vote/status', [VoteController::class, 'checkVoteStatus'])->name('vote.status');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin auth routes
Route::get('admin/login', [\App\Http\Controllers\Auth\AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [\App\Http\Controllers\Auth\AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('admin/logout', [\App\Http\Controllers\Auth\AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware(['auth', \App\Http\Middleware\EnsureUserIsAdmin::class])->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/votes', [DashboardController::class, 'votes'])->name('votes');

    // Contestants Management
    Route::resource('contestants', ContestantController::class);
    Route::get('/contestants/{contestant}/votes', [ContestantController::class, 'votes'])->name('contestants.votes');
});
