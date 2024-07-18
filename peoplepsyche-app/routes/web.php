<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PendingRequestsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SuperadminSettingsController;
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

Route::get('/', function () {
    return view('home');
});

// Auth::routes([
//     'verify' => true
// ]);

/*
| CLIENTS
*/

// Route::get('/dashboard', function () {
//     return view('users.client.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DataController::class, 'showAssessments'])
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

Route::get('/assessments-list', function () {
    return view('users.client.assessments-list');
})->middleware(['auth', 'verified'])->name('assessments-list');

Route::get('/take-assessment', function () {
    return view('users.client.assess-access-form');
})->middleware(['auth', 'verified'])->name('take-assessment');

Route::get('/request-assess-form', [PendingRequestsController::class, 'showForm'])
    ->name('request-assess-form')
    ->middleware(['auth', 'verified']);

Route::post('/request-assess', [PendingRequestsController::class, 'send_request'])
    ->name('request-assess')
    ->middleware(['auth', 'verified']);
//end

Route::get('/test-page', function () {
    return view('users.client.test-page');
})->middleware(['auth', 'verified'])->name('test-page');

Route::post('/results', [AssessmentController::class, 'store'])
    ->name('godsGift')
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::delete('/settings', [SettingsController::class, 'destroy'])->name('settings.destroy');
});

// Route::post('/results', [AssessmentResultController::class, 'calculateResults'])
//     ->name('test-page.results')
//     ->middleware('auth');

require __DIR__.'/auth.php';

/*
| ADMINS
*/
Route::get('/admin/dashboard', function () {
    return view('users.admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::get('/admin/clients', function () {
    return view('users.admin.clients');
})->middleware(['auth:admin', 'verified'])->name('admin.clients');

Route::get('/admin/pending-requests', function () {
    return view('users.admin.pending-requests');
})->middleware(['auth:admin', 'verified'])->name('admin.pending-requests');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/settings', [AdminSettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::patch('/admin/settings', [AdminSettingsController::class, 'update'])->name('admin.settings.update');
    Route::delete('/admin/settings', [AdminSettingsController::class, 'destroy'])->name('admin.settings.destroy');
});

// Route::post('/admin/generate-code', 'AdminController@generateCode')->name('admin.generate-code');

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
Route::get('/superadmin/dashboard', function () {
    return view('users.superadmin.dashboard');
})->middleware(['auth:superadmin', 'verified'])->name('superadmin.dashboard');

Route::get('/superadmin/users', function () {
    return view('users.superadmin.users');
})->middleware(['auth:superadmin', 'verified'])->name('superadmin.users');

Route::middleware('auth:superadmin')->group(function () {
    Route::get('/superadmin/settings', [SuperadminSettingsController::class, 'edit'])->name('superadmin.settings.edit');
    Route::patch('/superadmin/settings', [SuperadminSettingsController::class, 'update'])->name('superadmin.settings.update');
    Route::delete('/superadmin/settings', [SuperadminSettingsController::class, 'destroy'])->name('superadmin.settings.destroy');
});

require __DIR__.'/superadminauth.php';

Route::get('/password-gen', function () {
    return view('show-hashed-password');
});
