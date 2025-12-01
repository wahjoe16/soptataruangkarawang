<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AjaxController;
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

    // Ajax Yajra Datatable Administrator
    Route::get('/users/data', [AjaxController::class, 'userData'])->name('users.data');
    Route::get('/sop/data', [AjaxController::class, 'sopData'])->name('sop.data');
    Route::get('/activity/data', [AjaxController::class, 'activityData'])->name('activity.data');

    // Ajax Yajra Datatable Front Office
    Route::get('/applications/data', [AjaxController::class, 'applicationData'])->name('applications.data');

    // Ajax Yajra Datatable Evaluator
    Route::get('/evaluator-applications/data', [AjaxController::class, 'evaluatorApplicationData'])->name('evaluator.applications.data');
    Route::get('/history-evaluator-applications/{id}/data', [AjaxController::class, 'historyEvaluatorApplicationData'])->name('history.evaluator.applications.data');
    Route::get('/history-evaluator-profile-applications/data', [AjaxController::class, 'historyEvaluatorProfileApplicationData'])->name('history.evaluator.profile.applications.data');

    // Ajax Yajra Datatable Katim, Kabid
    Route::get('/applications-active/data', [AjaxController::class, 'applicationActiveData'])->name('applications.active.data');
    Route::get('/applications-view/data', [AjaxController::class, 'applicationViewData'])->name('applications.view.data');
    Route::get('/history-applications/data', [AjaxController::class, 'historyApplicationData'])->name('history.applications.data');
    Route::get('/view-evaluator/{id}/data', [AjaxController::class, 'viewEvaluatorData'])->name('view.evaluator.data');
    
    // manajemen user (Admin)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/view', [UserController::class, 'view'])->name('users.view');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/{id}/reset-password', [UserController::class, 'resetPassword'])->name('users.resetPassword');
    Route::delete('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
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
    Route::put('/applications/{id}/upload-archive', [ApplicationController::class, 'uploadArchive'])->name('applications.upload.archive');

    // permohonan di dashboard katim dan kabid
    Route::get('/applications-view', [ApplicationController::class, 'viewApplication'])->name('applications.view');
    Route::get('/review-applications/{id}', [ApplicationController::class, 'reviewApplication'])->name('applications.review');
    Route::post('/applications/{id}/assign', [ApplicationController::class, 'assign'])->name('applications.assign');
    Route::get('/applications/{id}/detail', [ApplicationController::class, 'applicationDetail'])->name('applications.detail');
    Route::get('/view-evaluator/{id}', [ApplicationController::class, 'viewEvaluator'])->name('applications.view.evaluator');

    // view permohonan yang telah di assign katim/kabid (Evaluator)
    Route::get('/evaluator-applications', [ApplicationController::class, 'viewEvaluatorApplication'])->name('evaluatorApplication.view');
    Route::get('/evaluator-applications/{id}/detail', [ApplicationController::class, 'evaluatorApplicationDetail'])->name('applications.evaluator.detail');
    Route::post('/evaluator-applications/update-status/{id}', [ApplicationController::class, 'updateStatusApplication'])->name('applications.evaluator.update');
    Route::put('/evaluator-applications/finish/{id}', [ApplicationController::class, 'finishStatusApplication'])->name('applications.evaluator.finish');
    Route::put('/evaluator-applications/reject/{id}', [ApplicationController::class, 'rejectStatusApplication'])->name('applications.evaluator.reject');
    Route::get('/history-applications/{id}', [ApplicationController::class, 'historyApplication'])->name('history.applications');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
