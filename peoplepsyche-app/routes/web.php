<?php

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

/home

/login

/register

/test-page

/dashboard

/assessments

/profile

/settings

/admin/login

/admin/dashboard

/admin/clients

/admin/pending-requests

/admin/profile

/admin/settings

/superadmin/login

/superadmin/dashboard

/superadmin/users

/superadmin/profile

/superadmin/settings

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-page', function () {
    return view('test-page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/profile', function () {
    return view('users.profile');
});
