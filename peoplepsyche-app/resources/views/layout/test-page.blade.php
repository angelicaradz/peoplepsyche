@extends('layout.layout')

@section('title')
    Assessment |
@endsection

@section('scripts')
    @vite('/public/build/assets/js/godsGift.js')
@endsection

@section('body')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="container min-vh-100 my-4 p-5 page-container">
            <!-- TEST TITLE -->
            <div class="row mb-4 justify-content-center">
                <h1 class="text-center">@yield('test-title')</h1>
            </div>

            <!-- ASSESSMENT FORM -->
            @yield('test-content')

            <!-- RESULT PAGE -->
            @yield('test-result')
        </div>
    </div>
@endsection
