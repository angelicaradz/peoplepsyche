<?php

namespace App\Http\Controllers;

use App\Models\AccessCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function generateCode(Request $request)
    {

        // Get the authenticated admin (you might need to adjust this logic based on your authentication setup)
        $admin = auth()->user(); // Assuming admin is authenticated

        //initials
        $first = $admin->givenName;
        $middle = $admin->middleName;
        $last = $admin->lastName;
        $suffix = $admin->suffixName;
        $names = [
            $first,
            $middle,
            $last,
            $suffix
        ];

        $initials = '';

        foreach ($names as $name){

            $doublenames = [];
            // Check if there are spaces in a name and separate them into an array
            if ($name && strpos($name, ' ') !== false) {
                $doublenames = explode(' ', $name);
            }

            // Check if $name exists and contains a space
            if (sizeof($doublenames) ?? null >= 2){
                foreach($doublenames as $doublename){
                    $initials .= $doublename[0];
                }
            }

            else {
                $initials .= $name[0];
            }
        }
        // Generate a random unique code (adjust as per your requirements)
        $code = uniqid($initials);

        // Store the generated code in the database
        $accessCode = AccessCode::create([
            'code' => $code,
            'admin_id' => $admin->id,
        ]);

        return response()->json(['code' => $code]); // Respond with the generated code (for AJAX handling)
    }
}
