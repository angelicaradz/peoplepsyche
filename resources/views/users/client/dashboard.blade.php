@extends('layout.dashboard')

@section('title')
    Dashboard |
@endsection

@section('page-title')
    Welcome to Dashboard, {{ Auth::user()->givenName }}!
@endsection

@section('content')
    {{-- TITLE --}}
    <div class="d-flex flex-lg-row mt-5" style="margin-left: 10px;">
        <p class="fs-5 fw-bold mb-0">Assessment Results</p>
    </div>

    {{-- INFO MESSAGE: IF THERE IS NO ASSESSMENT TAKEN AT THE MOMENT --}}
    @if($resultList->isEmpty() && is_null($results))
        <div class="alert alert-info" role="alert">
            No assessment taken.<x-nav-link :href="route('test-page')" type="button">Take assessment here.</x-nav-link>
        </div>
    @else
        {{-- ASSESSMENT RESULTS SECTION
        COMBINE RESULTS FROM DIFFERENT TESTS
        FOR NOW, THE TEST IS ONLY GODS GIFT TEST --}}
        <div class="row mx-4 my-5 justify-content-center align-items-center">
            {{-- STRENGTHS --}}
            @if(!empty($results['strengths']))
                <h4 style="text-align: start">STRENGTHS:</h4>
                <ul class="row mx-4 mb-5 align-items-start list-unstyled">

                    @foreach($results['strengths'] as $strength)
                        <li style="list-style: none; text-align:start; margin-bottom:40px">{{ $strength }}</li>
                    @endforeach
                </ul>
            @endif
            {{-- WEAKNESSES --}}
            @if(!empty($results['weaknesses']))
                <h4 style="text-align: start">WEAKNESSES:</h4>
                <ul class="row mx-4 mb-5 align-items-start list-unstyled">
                    @foreach($results['weaknesses'] as $weakness)
                        <li style="list-style: none; text-align:start; margin-bottom:40px">{{ $weakness }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        {{-- TAKE NEW ASSESSMENT BUTTON --}}
        <div class="row mx-4 mb-5 text-center justify-content-center align-items-center">
            <a href="{{ route('test-page') }}"
                class="btn btn-lg fs-4" type="button"
                style="background-color: chocolate; border:none; color:white;width:50%;"
            >Take New Assessment</a>
        </div>
    @endif
@endsection
