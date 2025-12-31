<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect('/login');
    }

    return $user->role === 'admin'
        ? redirect('/admin/polls')
        : redirect('/polls');
})->middleware('auth')->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // User
    Route::get('/polls', [VoteController::class, 'index'])->name('polls.index');
    Route::post('/polls/vote', [VoteController::class, 'store'])->name('polls.vote');
});

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::resource('users', UserController::class);
    
    Route::get('/polls', [PollController::class, 'index']);
    Route::get('/polls/create', [PollController::class, 'create']);
    Route::post('/polls', [PollController::class, 'store']);

    Route::get('/polls/{poll}/edit', [PollController::class, 'edit']);
    Route::put('/polls/{poll}', [PollController::class, 'update']);

    Route::get('/reports/polls', [ReportController::class, 'index']);
    Route::get('/reports/polls/{poll}/pdf', [ReportController::class, 'pollPdf']);

    Route::patch('/polls/{poll}/toggle', [PollController::class, 'toggle']);
    Route::delete('/polls/{poll}', [PollController::class, 'destroy']);

});

require __DIR__.'/auth.php';
