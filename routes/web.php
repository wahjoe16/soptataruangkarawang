<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', fn () => redirect()->route('login'));

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
    // manajemen user
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

    // manajemen SOP
    Route::get('/sop', [SopController::class, 'index'])->name('sop.index');
    Route::get('/sop/create', [SopController::class, 'create'])->name('sop.create');
    Route::post('/sop/store', [SopController::class, 'store'])->name('sop.store');

    // manajemen Activity
    Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/activity/create', [ActivityController::class, 'create'])->name('activity.create');
    Route::post('/activity/store', [ActivityController::class, 'store'])->name('activity.store');
    
    // manajemen permohonan
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications/store', [ApplicationController::class, 'store'])->name('applications.store');

    // view pemohonan baru oleh katim dan kabid
    Route::get('/applications-view', [ApplicationController::class, 'viewApplication'])->name('applications.view');
    Route::get('/review-applications/{id}', [ApplicationController::class, 'reviewApplication'])->name('applications.review');
    Route::post('/applications/{id}/assign', [ApplicationController::class, 'assign'])->name('applications.assign');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
