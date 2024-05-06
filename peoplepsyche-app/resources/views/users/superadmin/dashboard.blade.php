@extends('layout.dashboard')

@section('page-title')
    Welcome to Dashboard, {{ Auth::user()->name }}!
@endsection

@section('content')
    <!-- COUNTER -->
    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card" style="background-color: rgba(210, 105, 30, 0.185); border-width: 2px; border-color: chocolate;">
                <div class="card-body">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="col">
                            <h4 class="fw-bold mb-0">TOTAL TAKERS</h4>
                        </div>
                        <div class="col">
                            <h2 class="fs-1 fw-bold mb-0">15</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
