<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EligibleTakerController;
use App\Http\Controllers\PendingRequestsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SuperadminSettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

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

Route::get('/', function () {
    return view('home');
});

// Auth::routes([
//     'verify' => true
// ]);

/*
| CLIENTS
*/

Route::get('/dashboard', [DataController::class, 'showResults'])
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

Route::get('/assessments-list', [DataController::class, 'showAssessmentList'])
    ->name('assessments-list')
    ->middleware(['auth', 'verified']);

Route::get('/view_result/{id}', [DataController::class, 'showResultPdf'])
    ->name('view_result')
    ->middleware(['auth', 'verified']);

Route::get('/print_result/{id}', [DataController::class, 'printResultPdf'])
    ->name('print_result')
    ->middleware(['auth', 'verified']);

Route::get('/take-assessment', function () {
    return view('users.client.assess-access-form');
})->middleware(['auth', 'verified'])->name('take-assessment');

Route::post('/take-assessment', [EligibleTakerController::class, 'store'])
    ->name('submit-assessment');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/request-assess', [PendingRequestsController::class, 'showForm'])->name('request-assess-form');
    Route::post('/request-assess', [PendingRequestsController::class, 'send_request'])->name('request-assess');
});
// Route::get('/request-assess', [PendingRequestsController::class, 'showForm'])
//     ->name('request-assess-form')
//     ->middleware(['auth', 'verified']);

// Route::post('/request-assess', [PendingRequestsController::class, 'send_request'])
//     ->name('request-assess')
//     ->middleware(['auth', 'verified']);

Route::get('/test-page', function () {
    return view('users.client.test-page');
})->middleware(['auth', 'verified', 'eligible'])->name('test-page');

Route::post('/test-page', [AssessmentController::class, 'store'])
    ->name('godsGift')
    ->middleware(['auth', 'verified', 'eligible']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('client-profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('client-profile.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingsController::class, 'edit'])->name('client-settings.edit');
    Route::post('/settings/update-email', [SettingsController::class, 'updateEmail'])->name('client-email.update');
    Route::post('/settings/update-password', [SettingsController::class, 'updatePassword'])->name('client-password.update');
    // Route::delete('/settings', [SettingsController::class, 'destroy'])->name('settings.destroy');
});

require __DIR__.'/auth.php';

/*
| ADMINS
*/

Route::get('/admin/dashboard', [DataController::class, 'showDashboardData'])
    ->name('admin.dashboard')
    ->middleware(['auth:admin', 'verified']);

Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/admin/clients', [DataController::class, 'showClients'])->name('admin.clients');
    Route::get('/admin/clients/view_result/{id}', [DataController::class, 'showClientResult'])->name('admin.view_result');
    Route::get('/admin/clients/print_result/{id}', [DataController::class, 'printClientResult'])->name('admin.print_result');
});

// Route::get('/admin/clients', [DataController::class, 'showClients'])
//     ->name('admin.clients')
//     ->middleware(['auth:admin', 'verified']);

// Route::get('/admin/clients/view_result/{id}', [DataController::class, 'showClientResult'])
//     ->name('admin.view_result')
//     ->middleware(['auth:admin', 'verified']);

// Route::get('/admin/clients/print_result/{id}', [DataController::class, 'printClientResult'])
//     ->name('admin.print_result')
//     ->middleware(['auth:admin', 'verified']);

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/pending-requests', [DataController::class, 'showRequests'])->name('admin.pending-requests');
    Route::put('/admin/pending-requests/{id}/approve', [AdminController::class, 'approveRequest'])->name('request.approve');
    Route::delete('/admin/pending-requests/{id}/cancel', [AdminController::class, 'cancelRequest'])->name('request.cancel');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin-profile.edit');
    Route::post('/admin/profile', [AdminProfileController::class, 'update'])->name('admin-profile.update');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/settings', [AdminSettingsController::class, 'edit'])->name('admin-settings.edit');
    Route::post('/admin/settings/update-email', [AdminSettingsController::class, 'updateEmail'])->name('admin-email.update');
    Route::post('/admin/settings/update-password', [AdminSettingsController::class, 'updatePassword'])->name('admin-password.update');
    // Route::delete('/admin/settings', [AdminSettingsController::class, 'destroy'])->name('admin.settings.destroy');
});

Route::post('/admin/generate-code', [AdminController::class, 'generateCode'])
    ->name('admin.generate-code')
    ->middleware('auth:admin');

Route::post('/admin/add-client', [AdminController::class, 'addClient'])
    ->name('admin.add-client')
    ->middleware('auth:admin');

require __DIR__.'/adminauth.php';

/*
| SUPERADMINS
*/

Route::get('/superadmin/dashboard', [DataController::class, 'showTotalUsers'])
    ->name('superadmin.dashboard')
    ->middleware(['auth:superadmin', 'verified']);

Route::middleware('auth:superadmin')->group(function () {
    Route::get('/superadmin/users', [DataController::class, 'showAllUsers'])->name('superadmin.users');
    Route::post('/superadmin/users/add-client', [UserController::class, 'addClient'])->name('superadmin.add-client');
    Route::post('/superadmin/users/add-admin', [UserController::class, 'addAdmin'])->name('superadmin.add-admin');
    Route::delete('/superadmin/users/add-superadmin', [SuperadminSettingsController::class, 'addSuperadmin'])->name('superadmin.add-superadmin');
});

Route::middleware('auth:superadmin')->group(function () {
    Route::get('/superadmin/settings', [SuperadminSettingsController::class, 'edit'])->name('superadmin-settings.edit');
    Route::post('/superadmin/settings/update-email', [SuperadminSettingsController::class, 'updateEmail'])->name('superadmin-email.update');
    Route::post('/superadmin/settings/update-password', [SuperadminSettingsController::class, 'updatePassword'])->name('superadmin-password.update');
    // Route::delete('/superadmin/settings', [SuperadminSettingsController::class, 'destroy'])->name('superadmin.settings.destroy');
});

require __DIR__.'/superadminauth.php';

Route::get('/password-gen', function () {
    return view('show-hashed-password');
});
