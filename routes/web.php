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
    // manajemen user (Admin)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/view', [UserController::class, 'view'])->name('users.view');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/{id}/reset-password', [UserController::class, 'resetPassword'])->name('users.resetPassword');
    Route::get('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    // manajemen SOP (Admin)
    Route::get('/sop', [SopController::class, 'index'])->name('sop.index');
    Route::get('/sop/create', [SopController::class, 'create'])->name('sop.create');
    Route::post('/sop/store', [SopController::class, 'store'])->name('sop.store');
    Route::get('/sop/{id}/edit', [SopController::class, 'edit'])->name('sop.edit');
    Route::put('/sop/{id}/update', [SopController::class, 'update'])->name('sop.update');

    // manajemen Activity (Admin)
    Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/activity/create', [ActivityController::class, 'create'])->name('activity.create');
    Route::post('/activity/store', [ActivityController::class, 'store'])->name('activity.store');
    Route::get('/activity/{id}/edit', [ActivityController::class, 'edit'])->name('activity.edit');
    Route::put('/activity/{id}/update', [ActivityController::class, 'update'])->name('activity.update');
    
    // manajemen permohonan (Front Office)
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications/store', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications/{id}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('/applications/{id}/update', [ApplicationController::class, 'update'])->name('applications.update');

    // view pemohonan baru oleh katim dan kabid
    Route::get('/applications-view', [ApplicationController::class, 'viewApplication'])->name('applications.view');
    Route::get('/review-applications/{id}', [ApplicationController::class, 'reviewApplication'])->name('applications.review');
    Route::post('/applications/{id}/assign', [ApplicationController::class, 'assign'])->name('applications.assign');

    // view permohonan yang telah di assign katim/kabid (Evaluator)
    Route::get('/evaluator-applications', [ApplicationController::class, 'viewEvaluatorApplication'])->name('evaluatorApplication.view');
    Route::get('/evaluator-applications/{id}/detail', [ApplicationController::class, 'evaluatorApplicationDetail'])->name('applications.evaluator.detail');
    Route::post('/evaluator-applications/update-status/{id}', [ApplicationController::class, 'updateStatusApplication'])->name('applications.evaluator.update');
    Route::put('/evaluator-applications/finish/{id}', [ApplicationController::class, 'finishStatusApplication'])->name('applications.evaluator.finish');
    Route::put('/evaluator-applications/reject/{id}', [ApplicationController::class, 'rejectStatusApplication'])->name('applications.evaluator.reject');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
