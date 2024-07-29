@extends('layout.home')

@section('body')
    <div id="home-hdr" class="w-100 vh-100 d-flex flex-column justify-content-center align-items-center fs-2 fw-bold">
        <!-- HOME TITLE HEADER -->
        <div id="home-hdr-title">
            <p>Welcome to PeoplePsyche Portal!</p>
        </div>

        <!-- LOGIN AND REGISTER BUTTONS -->
        <div id="home-buttons" class="d-grid gap-2 d-flex justify-content-center align-items-center">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-lg fs-6 login-btn" type="button">Go to Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-lg fs-6 login-btn" type="button">Login</a>

                    @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-lg fs-6 register-btn" type="button">Register</a>
                    @endif
                @endauth
            @endif


            {{-- <a href="login.html" class="btn btn-lg fs-6 login-btn" type="button">Login</a>
            <a href="register.html" class="btn btn-lg fs-6 register-btn" type="button">Register</a> --}}
        </div>

        <div id="home-buttons" class="d-flex justify-content-center align-items-center">
            @if (Route::has('admin.login'))
                <div class="text-center" style="font-size: 55%; font-weight:normal;">
                    @auth
                        <small><a href="{{ url('/admin/dashboard') }}" style="color: chocolate;">{{ __('Portal for Admins') }}</a></small>
                    @else
                        <small><a href="{{ route('admin.login') }}" style="color: chocolate;">{{ __('Portal for Admins') }}</a></small>
                    @endauth
                </div>
            @endif
        </div>
    </div>
@endsection
