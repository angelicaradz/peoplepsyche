<?php

namespace App\Http\Controllers;

use App\Mail\AssessCodeMail;
use App\Models\AccessCode;
use App\Models\AssessCode;
use App\Models\AssessType;
use App\Models\PendingRequests;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function generateCode(Request $request)
    {

        // Get the authenticated admin (you might need to adjust this logic based on your authentication setup)
        $admin = auth()->user(); // Assuming admin is authenticated

        // Check if user is authenticated
        // Error handler
        // if(!$admin){
        //     return response()->json(['error' => 'User not found'], 500);
        // }

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

        // Check if user info is fetched
        // Error handling
        // if(!$names){
        //     return response()->json(['error' => 'User not found'], 500);
        // }
        // else{
        //     return $names;
        // }

        foreach ($names as $name){

            // return $name;

            if(!empty($name)) {

                $doublenames = [];

                // Check if there are spaces in a name and separate them into an array
                if(strpos($name, ' ') !== false) {
                    $doublenames = explode(' ', $name);

                    foreach($doublenames as $doublename){

                        // Trim the name to remove any leading or trailing whitespace
                        $doublename = trim($doublename);

                        // Check if the trimmed name is not empty
                        if (!empty($doublename)) {
                            $initials .= $doublename[0]; // Append the first character
                        }
                    }
                }
                else{
                    $initials .= $name[0];
                }
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

    public function approveRequest($id)
    {
        // Get the authenticated admin (you might need to adjust this logic based on your authentication setup)
        $admin = auth()->user(); // Assuming admin is authenticated

        // Check if user is authenticated
        // Error handler
        // if(!$admin){
        //     return response()->json(['error' => 'User not found'], 500);
        // }

        $request = PendingRequests::findOrFail($id);
        $request_id = $request->id;
        $user_id = $request->user_id;
        $admin_id = $admin->id;
        $assess_type_id = $request->assess_type_id;

        // INITIALS FOR THE CODE
        $initials = '';

        $assess_type = AssessType::findOrFail($assess_type_id);
        $user = User::findOrFail($user_id);
        $assess_type_name = $assess_type->name;

        $initials .= $assess_type_name[0];

        //user name initials
        $first = $user->givenName;
        $middle = $user->middleName;
        $last = $user->lastName;
        $suffix = $user->suffixName;
        $names = [
            $first,
            $middle,
            $last,
            $suffix
        ];

        // Check if user info is fetched
        // Error handling
        // if(!$names){
        //     return response()->json(['error' => 'User not found'], 500);
        // }
        // else{
        //     return $names;
        // }

        foreach ($names as $name){

            // return $name;

            if(!empty($name)) {

                $doublenames = [];

                // Check if there are spaces in a name and separate them into an array
                if(strpos($name, ' ') !== false) {
                    $doublenames = explode(' ', $name);

                    foreach($doublenames as $doublename){

                        // Trim the name to remove any leading or trailing whitespace
                        $doublename = trim($doublename);

                        // Check if the trimmed name is not empty
                        if (!empty($doublename)) {
                            $initials .= $doublename[0]; // Append the first character
                        }
                    }
                }
                else{
                    $initials .= $name[0];
                }
            }
        }

        // Calculate the remaining bytes available for random generation
        $remainingLength = (10 - strlen($initials)) * 2; // Multiply by 2 for hexadecimal representation
        // Generate random bytes
        $randomBytes = openssl_random_pseudo_bytes($remainingLength);

        // Convert random bytes to hexadecimal
        $randomHex = bin2hex($randomBytes);

        // Combine unique identifier and random hexadecimal
        $code = $initials . $randomHex;

        // Ensure the final code does not exceed 10 characters (bytes)
        $code = substr($code, 0, 10);

        // Generate access code (assuming AccessCode model exists)
        $assessCode = AssessCode::create([
            'code' => $code,
            'assess_type_id' => $assess_type_id,
            'request_id' => $request_id,
            'admin_id' => $admin_id,
            'user_id' => $user->id
        ]);

        Mail::to($user->email)->send(new AssessCodeMail($user, $code));

        // Delete the request from the database
        $request->delete();

        return redirect()->route('admin.pending-requests')->with('success', 'Request approved!');
    }

    public function cancelRequest($id)
    {

        $request = PendingRequests::findOrFail($id);

        // Delete the request from the database
        $request->delete();

        return redirect()->route('admin.pending-requests')->with('success', 'Request deleted!');
    }

    public function addClient(Request $request): RedirectResponse
    {

        $request->validate([
            'givenName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'suffixName' => ['nullable', 'string', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'cpNumber' => ['nullable', 'string', 'max:20'],
            'birthday' => ['required', 'date'],
            'sex' => ['required', Rule::in(['Male', 'Female'])],
            'civilStat' => ['required', Rule::in(['Single', 'Married', 'Separated', 'Annulled', 'Divorced', 'Widowed'])],
            'religion' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ]);

        $admin = auth()->user();

        $user = User::create([
            'givenName' => $request->givenName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'suffixName' => $request->suffixName,
            'email' => $request->email,
            'cpNumber' => $request->cpNumber,
            'birthday' => $request->birthday,
            'sex' => $request->sex,
            'civilStat' => $request->civilStat,
            'religion' => $request->religion,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'client',
            'admin_id' => $admin->id,
        ]);

        return Redirect::route('admin.clients')->with('success', 'Client added!');
    }
}
