@extends('layout.home')

@section('title')
    Superadmin Login |
@endsection

@section('body')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <!-- LOGIN BOX -->
    <div id="login-page" class="row border rounded-5 p-5 shadow box-area bg-white justify-content-center align-items-center d-flex flex-lg-row">

        <!-- FORM TITLE -->
        <div class="row mb-4">
            <h2 class="text-center mb-4">PeoplePsyche Superadmin Login</h2>
        </div>

        <!-- LOGIN FORM SECTION -->
        <div class="row justify-content-center align-items-center">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- LOGIN FORM --}}
            <form method="POST" id="login-form" class="g-3" action="{{ route('superadmin.login') }}">
                @csrf

                <!-- EMAIL ADDRESS INPUT FIELD -->
                <div class="form-floating mb-2 overflow-hidden">
                    <x-text-input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-label for="floatingInput" :value="__('Email')" />
                    @error('email')
                        <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- PASSWORD INPUT FIELD -->
                <div class="form-floating overflow-hidden">
                    <x-text-input class="form-control" id="floatingPassword"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    required autocomplete="current-password" />
                    <x-input-label for="floatingPassword" :value="__('Password')" />
                    @error('password')
                        <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex flex-sm-row mt-1 mb-4 g-4 align-items-center">

                    <!-- SAVE LOGIN INFO OPTION -->
                    <div class="form-check col d-flex justify-content-start">
                        <label class="form-check-label text-secondary" for="flexCheckChecked">
                            <input class="form-check-input" type="checkbox" value="Remember Me" id="flexCheckChecked" name="remember" checked>
                            <span>{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    {{-- FORGOT YOUR PASSWORD OPTION --}}
                    <div class="col d-flex justify-content-end">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-secondary underline">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <!-- SUBMIT BUTTON -->
                <button id="submit-btn" class="btn btn-lg w-100 fs-6" type="submit" value="Login">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
