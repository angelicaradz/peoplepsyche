@extends('layout.dashboard')

@section('page-title')
    Settings
@endsection

@section('content')
    <!-- SETTINGS -->
    <div id="settings" class="mt-5 justify-content-center">

        <div class="row mb-5">
            {{-- VERIFY EMAIL --}}
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            {{-- NAME --}}
            <div class="row">
                <p><span id="profile-label">Name:</span>
                    <span>{{ $user->name }}</span>
                </p>
            </div>

            {{-- EDIT EMAIL ADDRESS --}}
            <form id="settings-form" method="post" action="{{ route('settings.update') }}">
                @csrf
                @method('patch')

                <fieldset>
                    <div class="row">
                        <p><span id="settings-label">{{ __('Email Address:') }}</span>
                            <x-text-input id="new-email" type="email" name="email" class="form-control" placeholder="Enter new email" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
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
                            @endif
                        </p>

                        <button type="submit" value="Submit" class="btn"><i class="fa-regular fa-floppy-disk" style="padding-right: 5px;"></i>{{ __('Save Changes') }}</button>
                        @if (session('status') === 'settings-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="row">
            <!-- EDIT PASSWORD -->
            <form id="settings-form" method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <fieldset>
                    <div class="row">
                        <p><span id="settings-label">{{ __('Update Password') }}</span>
                            <x-text-input id="new-password" type="password" name="password" class="form-control" placeholder="Enter new password" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </p>
                    </div>

                    <div class="row">
                        <p><span id="settings-label">{{ __('Confirm New Password') }}</span>
                            <x-text-input id="new-password" type="password" name="password_confirmation" class="form-control" placeholder="Re-enter password" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </p>
                    </div>
                    <div class="row">
                        <button type="submit" value="Submit" class="btn"><i class="fa-regular fa-floppy-disk" style="padding-right: 5px;"></i>{{ __('Save Changes') }}</button>

                        @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-black dark:text-orange-500"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>

                    {{-- <div class="row">
                        @include('profile.delete-user-form')
                    </div> --}}
                </fieldset>
            </form>
        </div>
    </div>
@endsection
