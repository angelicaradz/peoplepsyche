<?php

use App\Http\Controllers\ProfileController;
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

/*
| CLIENTS
*/

Route::get('/dashboard', function () {
    return view('users.client.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/assessments-list', function () {
    return view('users.client.assessments-list');
})->middleware(['auth', 'verified'])->name('assessments-list');

Route::get('/test-page', function () {
    return view('users.client.test-page');
})->middleware(['auth', 'verified'])->name('test-page');

/*
| ADMINS
*/
Route::get('/admin/dashboard', function () {
    return view('users.admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/clients', function () {
    return view('users.admin.clients');
})->middleware(['auth', 'verified'])->name('clients');

Route::get('/admin/pending-requests', function () {
    return view('users.admin.pending-requests');
})->middleware(['auth', 'verified'])->name('pending-requests');

/*
| SUPERADMINS
*/
Route::get('/superadmin/dashboard', function () {
    return view('users.superadmin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/superadmin/users', function () {
    return view('users.superadmin.users');
})->middleware(['auth', 'verified'])->name('users');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
