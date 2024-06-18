<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function show(User $user)
    {
        $this->authorize('manage', $user);

        // Show user details
        return view('users.show', ['user' => $user]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function add(User $user, Request $request): RedirectResponse
    {
        $this->authorize('manage', $user);

        $request->validate($this->getValidationRules());

        $userData = $request->only([
            'givenName', 'middleName', 'lastName', 'suffixName', 'email', 'cpNumber',
            'birthday', 'sex', 'civilStat', 'religion', 'address', 'password', 'role'
        ]);
        $userData['password'] = Hash::make($userData['password']);

        $user = User::create($userData);

        return redirect()->route('users.show', $user)->with('success', 'User created successfully!');
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('manage', $user);

        $request->validate($this->getValidationRules($user));

        $userData = $request->only([
            'givenName', 'middleName', 'lastName', 'suffixName', 'email', 'cpNumber',
            'birthday', 'sex', 'civilStat', 'religion', 'address'
        ]);

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('users.show', $user)->with('success', 'User details updated successfully');
    }

    public function destroy(User $user)
    {
        $this->authorize('manage', $user);

        // Delete user
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    protected function getValidationRules(User $user = null): array
    {
        $rules = [
            'givenName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'suffixName' => ['nullable', 'string', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'cpNumber' => ['nullable', 'string', 'max:20'],
            'birthday' => ['required', 'date'],
            'sex' => ['required', Rule::in(['Male', 'Female'])],
            'civilStat' => ['required', Rule::in(['Single', 'Married', 'Separated', 'Annulled', 'Divorced', 'Widowed'])],
            'religion' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'address2' => ['nullable', 'string', 'max:1000'],
            'address3' => ['nullable', 'string', 'max:1000'],
            'role' => ['required', Rule::in(['client', 'admin', 'superadmin'])],
        ];

        if (Auth::user()->role === 'admin') {
            $rules['password'] = ['required', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()->symbols()];
        }

        if (Auth::user()->role === 'superadmin') {
            $rules['password'] = ['nullable', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()->symbols()];
        }

        return $rules;
    }

}
