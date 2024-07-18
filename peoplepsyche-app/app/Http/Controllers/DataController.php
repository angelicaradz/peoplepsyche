<?php

namespace App\Http\Controllers;

use App\Models\Tests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function getClientData($adminId)
    {
        // Retrieve clients for a specific admin id
        $clients = User::where('admin_id', $adminId)->get();

        //to be modified
        //fetching client data table
        return view('access_codes.index', compact('accessCodes'));
    }

    public function getAdminData()
    {

    }

    public function getAllUsers()
    {

    }

    public function showAssessments()
    {

        // Fetch all records from the Tests table
        $tests = Tests::with('admin')->get();

        // Alternatively, fetch all records from the GodsGiftTest table
        // $tests = GodsGiftTest::all();

        return view('users.client.dashboard', compact('tests'));
    }
}
