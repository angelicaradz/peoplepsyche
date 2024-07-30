@extends('layout.layout')

@section('scripts')
    @vite('/public/build/assets/js/sidebar-nav.js')
    @vite('/public/build/assets/js/add_client.js')
    @vite('/public/build/assets/js/add_user.js')
@endsection

@section('body')
    <div class="container-fluid p-0">
        <div class="row g-0 text-center dashboard-body">

            <!-- SIDEBAR -->
            @include('layout.nav')

            <!-- DASHBOARD BODY -->
            <div class="main-content col-md-12 col-lg-9">

                <!-- PAGE TITLE -->
                <div class="d-flex flex-lg-row mt-4">
                    <h1>@yield('page-title')</h1>
                </div>

                <!-- PAGE CONTENT -->
                @yield('content')
            </div>
        </div>
    </div>
@endsection
