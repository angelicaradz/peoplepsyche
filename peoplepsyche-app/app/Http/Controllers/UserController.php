<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Superadmin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function showAdmins()
    {
        $admins = Admin::all();

        return view('users.superadmin.users', compact('admins'));

    }

    public function addClient(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'givenName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'suffixName' => ['nullable', 'string', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
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
            'admin' => [
                'required',
                'integer',
                'min:1',
                'exists:admins,id'
            ]
        ]);

        $admin_id = $validatedData['admin'];

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
            'admin_id' => $admin_id,
        ]);

        return Redirect::route('superadmin.users')->with('success', 'Client User added!');
    }

    public function addAdmin(Request $request): RedirectResponse
    {
        $request->validate([
            'givenName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'suffixName' => ['nullable', 'string', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:admins,email'],
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
            ]
        ]);

        $admin = Admin::create([
            'givenName' => $request->givenName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'suffixName' => $request->suffixName,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'sex' => $request->sex,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        return Redirect::route('superadmin.users')->with('success', 'Admin User added!');
    }

    public function addSuperadmin(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:superadmins,email'],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]
        ]);

        $superadmin = Superadmin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'superadmin'
        ]);

        return Redirect::route('superadmin.users')->with('success', 'Superadmin User added!');
    }

    // public function update(User $user, Request $request)
    // {
    //     $this->authorize('manage', $user);

    //     $request->validate($this->getValidationRules($user));

    //     $userData = $request->only([
    //         'givenName', 'middleName', 'lastName', 'suffixName', 'email', 'cpNumber',
    //         'birthday', 'sex', 'civilStat', 'religion', 'address'
    //     ]);

    //     if ($request->filled('password')) {
    //         $userData['password'] = Hash::make($request->password);
    //     }

    //     $user->update($userData);

    //     return redirect()->route('users.show', $user)->with('success', 'User details updated successfully');
    // }

    // public function destroy(User $user)
    // {
    //     $this->authorize('manage', $user);

    //     // Delete user
    //     $user->delete();

    //     return redirect()->route('users.index')->with('success', 'User deleted successfully');
    // }

    // protected function getValidationRules(User $user = null): array
    // {
    //     $rules = [
    //         'givenName' => ['required', 'string', 'max:255'],
    //         'middleName' => ['nullable', 'string', 'max:255'],
    //         'lastName' => ['required', 'string', 'max:255'],
    //         'suffixName' => ['nullable', 'string', 'max:10'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user)],
    //         'cpNumber' => ['nullable', 'string', 'max:20'],
    //         'birthday' => ['required', 'date'],
    //         'sex' => ['required', Rule::in(['Male', 'Female'])],
    //         'civilStat' => ['required', Rule::in(['Single', 'Married', 'Separated', 'Annulled', 'Divorced', 'Widowed'])],
    //         'religion' => ['nullable', 'string', 'max:255'],
    //         'address' => ['required', 'string', 'max:1000'],
    //         'address2' => ['nullable', 'string', 'max:1000'],
    //         'address3' => ['nullable', 'string', 'max:1000'],
    //         'role' => ['required', Rule::in(['client', 'admin', 'superadmin'])],
    //     ];

    //     if (Auth::user()->role === 'admin') {
    //         $rules['password'] = ['required', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()->symbols()];
    //     }

    //     if (Auth::user()->role === 'superadmin') {
    //         $rules['password'] = ['nullable', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()->symbols()];
    //     }

    //     return $rules;
    // }

}
