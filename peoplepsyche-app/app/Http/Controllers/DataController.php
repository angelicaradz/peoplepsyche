<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\PendingRequests;
use App\Models\Superadmin;
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

        $superadmin_id = auth()->user()->id;

        $superadmins = Superadmin::where('id', '!=', $superadmin_id)->get();

        // Retrieve superadmin with their admins and users
        $clients = User::all();
        $admins = Admin::all();

        return [
            'admins' => $admins,
            'clients' => $clients,
            'superadmins' => $superadmins
        ];
    }

    public function showTotalUsers()
    {
        $data = $this->getAllUsers();

        $totalSuperadmins = $data['superadmins']->count();
        $totalAdmins = $data['admins']->count();
        $totalClients = $data['clients']->count();
        $totalUsers = $totalAdmins + $totalClients + $totalSuperadmins;

        return view('users.superadmin.dashboard', compact('totalSuperadmins', 'totalAdmins', 'totalClients', 'totalUsers'));
    }

    public function showAllUsers()
    {
        $data = $this->getAllUsers();

        $superadmins = $data['superadmins'];
        $admins = $data['admins'];
        $clients = $data['clients'];
        $users = $admins->concat($clients)->concat($superadmins);

        return view('users.superadmin.users', compact('superadmins', 'admins', 'clients', 'users'));
    }

    public function showAssessments()
    {

        $user = auth()->user()->id;

        // Fetch all records from the Tests table
        $tests = Tests::where('user_id', $user)->with('admin')->get();

        // Alternatively, fetch all records from the GodsGiftTest table
        // $tests = GodsGiftTest::all();

        return view('users.client.dashboard', compact('tests'));
    }

    public function showRequests()
    {
        $requests = $this->getRequests();

        return view('users.admin.pending-requests', compact('requests'));
    }

    public function showDashboardData()
    {
        $requests = $this->getRequests();
        $takers = $this->getTakers();
        $takers_count = $this->getTotalTakers();
        $clients_count = $this->getTotalClients();

        return view('users.admin.dashboard', compact('requests', 'takers', 'takers_count', 'clients_count'));
    }

    public function showClients()
    {
        $clients = $this->getClients();

        return view('users.admin.clients', compact('clients'));
    }

    public function getRequests()
    {
        $admin = auth()->user()->id;

        return PendingRequests::where('admin_id', $admin)->with('client')->get();
    }

    public function getTakers()
    {
        $admin = auth()->user()->id;

        return Tests::where('admin_id', $admin)->with('client')->get();
    }

    public function getTotalTakers()
    {
        $admin = auth()->user()->id;

        return Tests::where('admin_id', $admin)->count();
    }

    public function getClients()
    {
        $admin = auth()->user()->id;

        return User::where('admin_id', $admin)->get();
    }

    public function getTotalClients()
    {
        $admin = auth()->user()->id;

        return User::where('admin_id', $admin)->count();
    }
}
