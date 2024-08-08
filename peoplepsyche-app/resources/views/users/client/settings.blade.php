@extends('layout.dashboard')

@section('title')
    Settings |
@endsection

@section('page-title')
    Settings
@endsection

@section('content')
    {{-- ALERT MESSAGES --}}
    @if (session('success'))
        <div class="alert alert-success mt-5">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger mt-5">
            {{ session('error') }}
        </div>
    @endif

    {{-- ACCOUNT INFORMATION --}}
    <div id="settings" class="mt-5 justify-content-center">

        <div class="row mb-5">
            {{-- VERIFY EMAIL --}}
            {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form> --}}

            {{-- EDIT EMAIL ADDRESS --}}
            <form id="settings-form" method="post" action="{{ route('client-email.update') }}">
                @csrf

                <fieldset>
                    <div class="row">
                        <p><span id="label">{{ __('Email Address:') }}</span>
                            <x-text-input id="new-email" type="email" name="email" class="form-control" placeholder="Enter new email" :value="old('email', $user->email)" required autocomplete="username" />
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror

                            {{-- @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div>
                                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                        {{ __('Your email address is unverified.') }}

                                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>
                                    </p>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif --}}
                        </p>

                        <button type="submit" value="Submit" class="btn"><i class="fa-regular fa-floppy-disk" style="padding-right: 5px;"></i>{{ __('Save Changes') }}</button>

                    </div>
                </fieldset>
            </form>
        </div>

        {{-- EDIT PASSWORD --}}
        <div class="row">
            <form id="settings-form" method="post" action="{{ route('client-password.update') }}">
                @csrf
                <fieldset>

                    {{-- NEW PASSWORD --}}
                    <div class="row">
                        <p><span id="label">{{ __('Update Password') }}</span>
                            <x-text-input id="new-password" type="password" name="password" class="form-control" placeholder="Enter new password" autocomplete="new-password" />
                            @error('password')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>

                    {{-- PASSWORD CONFIRMATION --}}
                    <div class="row">
                        <p><span id="label">{{ __('Confirm New Password') }}</span>
                            <x-text-input id="new-password" type="password" name="password_confirmation" class="form-control" placeholder="Re-enter password" autocomplete="new-password" />
                            @error('password_confirmation')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </p>
                    </div>

                    <div class="row">
                        <button type="submit" value="Submit" class="btn"><i class="fa-regular fa-floppy-disk" style="padding-right: 5px;"></i>{{ __('Save Changes') }}</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
