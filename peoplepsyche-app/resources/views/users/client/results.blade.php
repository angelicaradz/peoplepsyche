@extends('layout.test-page')

@section('test-title')
    God's Gift Assessment
@endsection

@section('test-content')
    <div id="result" class="row mx-4 my-5 justify-content-start align-items-center">
        <h3>YOUR RESULT:</h3>

        <!-- STRENGTHS -->
        <ul id="strengthsList" class="row mx-4 my-5 justify-content-start align-items-center">
            <h4>STRENGTHS:</h4>

            <p>{{ $sex }}</p>
        </ul>

        <!-- WEAKNESSES -->
        <ul id="weaknessesList" class="row mx-4 my-5 justify-content-start align-items-center">
            <h4>WEAKNESSES:</h4>
        </ul>

        <!-- GO BACK TO THE USER DASHBOARD -->
        <div class="row mx-4 mb-5 text-center">
            <!-- <h2 class="fw-bold" style="color: red;">STOP</h2>
            <h5 class="fw-bold">THANK YOU!</h5> -->
            <div class="input-group justify-content-center align-items-center">
                <a href="{{ route('dashboard') }}" class="btn btn-lg fs-4" type="button">DONE</a>
            </div>
        </div>
    </div>
@endsection
