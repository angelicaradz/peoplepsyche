<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function dashboard() {
        return view('users.client.dashboard');
    }
}
