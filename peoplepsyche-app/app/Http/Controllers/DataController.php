<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
