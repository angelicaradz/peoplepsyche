@extends('layout.dashboard')

@section('title')
    Superadmin Dashboard |
@endsection

@section('page-title')
    Welcome to Dashboard, {{ Auth::user()->name }}!
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-sm-2 g-4 mt-3">

        <!-- TOTAL USERS COUNTER -->
        <div class="col">
            <div class="card" style="background-color: rgba(210, 105, 30, 0.185); border-width: 2px; border-color: chocolate;">
                <div class="card-body">
                    <div class="row">
                        <h4 class="fw-bold mb-0">TOTAL USERS</h4>
                    </div>
                    <div class="row">
                        <h2 class="fs-1 fw-bold mb-0">{{ $totalUsers }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOTAL ADMINS COUNTER -->
        <div class="col">
            <div class="card" style="background-color: rgba(210, 105, 30, 0.185); border-width: 2px; border-color: chocolate;">
                <div class="card-body">
                    <div class="row">
                        <h4 class="fw-bold mb-0">TOTAL ADMINS</h4>
                    </div>
                    <div class="row">
                        <h2 class="fs-1 fw-bold mb-0">{{ $totalAdmins }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
