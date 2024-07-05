<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
// use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\Models\AccessCode;
use Illuminate\Validation\Rules\Exists;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'givenName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'suffixName' => ['nullable', 'string', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
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
                    // ->uncompromised()
            ],
            'access_code' => [
                'required',
                'string',
                'exists:access_codes,code',
            ],
        ]);

        $accessCode = $request->input('access_code');
        $code = AccessCode::where('code', $accessCode)->first();

        if (!$code) {
            return redirect()->back()->withErrors(['access_code' => 'Invalid access code.']);
        }

        $admin = $code->admin;

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

        event(new Registered($user));

        $code->delete();

        // Auth::login($user);

        return redirect()->route('login');
    }
}
