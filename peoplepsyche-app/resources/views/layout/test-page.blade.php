@extends('layout.layout')

@section('title')
    Assessment |
@endsection

@section('scripts')
    @vite('/resources/css/style-home.css')
    @vite('/resources/js/godsGift.js')
@endsection

@section('body')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div id="test-container" class="container min-vh-100 my-4 p-5">
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
