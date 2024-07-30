<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
use App\Models\Superadmin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SuperadminSettingsController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('users.superadmin.settings', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function updateEmail(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Superadmin::class]
        ]);

        $user = Auth::user();

        Superadmin::updateOrCreate(
            ['id' => $user->id],
            [
                'email' => $request->email,
            ]
        );

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        return Redirect::route('superadmin-settings.edit')->with('success', 'Account updated!');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]
        ]);

        $user = Auth::user();

        Superadmin::updateOrCreate(
            ['id' => $user->id],
            [
                'password' => Hash::make($request->password)
            ]
        );

        Auth::logout();

        return Redirect::route('superadmin.login')->with('success', 'Password updated successfully. Please log in with your new password.');
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
