<?php

namespace App\Http\Controllers;
use App\Models\AccessCode;
use App\Models\AssessCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

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
                        // if($doublename === ''){
                        //     unset($doublename);
                        // }

                        // else{
                        //     $initials .= $doublename[0];
                        // }

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

    //for the assess code
    public function generate_assess_code(Request $request)
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
                        // if($doublename === ''){
                        //     unset($doublename);
                        // }

                        // else{
                        //     $initials .= $doublename[0];
                        // }

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
        $accessCode = AssessCode::create([
            'assess_code' => $code,
            'admin_id' => $admin->id,
        ]);

        return response()->json(['assess_code' => $code]); // Respond with the generated code (for AJAX handling)
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addClient(Request $request)
    {

        $request->validate([
            'givenName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'suffixName' => ['nullable', 'string', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'birthday' => ['required', 'date'],
            'sex' => ['required', Rule::in(['Male', 'Female'])],
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
            'birthday' => $request->birthday,
            'sex' => $request->sex,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'client',
            'admin_id' => $admin->id,
        ]);

        event(new Registered($user));

        return response()->json(['add_client' => 'Added client successfully!']);;
    }
}
