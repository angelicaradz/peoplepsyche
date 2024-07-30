<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('users.admin.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {

        $request->validate([
            'givenName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'suffixName' => ['nullable', 'string', 'max:10'],
            'cpNumber' => ['nullable', 'string', 'max:20'],
            'birthday' => ['required', 'date'],
            'sex' => ['required', Rule::in(['Male', 'Female'])],
            'civilStat' => ['required', Rule::in(['Single', 'Married', 'Separated', 'Annulled', 'Divorced', 'Widowed'])],
            'religion' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'address2' => ['nullable', 'string', 'max:1000'],
            'address3' => ['nullable', 'string', 'max:1000'],
        ]);

        $admin = Auth::user();

        Admin::updateOrCreate(
            ['id' => $admin->id],
            [
                'givenName' => $request->givenName,
                'middleName' => $request->middleName,
                'lastName' => $request->lastName,
                'suffixName' => $request->suffixName,
                'cpNumber' => $request->cpNumber,
                'birthday' => $request->birthday,
                'sex' => $request->sex,
                'civilStat' => $request->civilStat,
                'religion' => $request->religion,
                'address' => $request->address,
                'address2' => $request->address2,
                'address3' => $request->address3
            ]
        );

        return Redirect::route('admin-profile.edit')->with('success', 'Profile updated!');
    }

    /**
     * Delete the user's account.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
