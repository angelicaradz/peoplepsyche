@extends('layout.dashboard')

@section('page-title')
    Welcome to Dashboard, {{ Auth::user()->name }}!
@endsection

@section('content')
    <div class="d-flex flex-lg-row mt-5" style="margin-left: 10px;">
        <p class="fs-5 fw-bold mb-0">Assessment Results</p>
    </div>
    <div class="alert alert-info" role="alert">
        No assessment taken. <a href="client-assess.html" type="button">Take assessment here</a>.
    </div>
@endsection
