@extends('layout.layout')

@section('scripts')
    @vite('/public/build/assets/css/pdf_style.css')
@endsection

@section('body')
    <div class="justify-content-center align-items-center">
        <!-- PDF TITLE -->
        <div class="row justify-content-center">
            <h1 class="text-center">@yield('pdf-title')</h1>
        </div>

        <!-- PDF CONTENT -->
        @yield('pdf-content')
    </div>
@endsection
