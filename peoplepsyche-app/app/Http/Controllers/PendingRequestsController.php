<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendingRequestsController extends Controller
{
    public function send_request()
    {
        $user = auth()->user();
        $admin = $user->admin_id;

        if(!$admin){
            return response()->json(['error' => 'User not found'], 500);
        }
    }
}
