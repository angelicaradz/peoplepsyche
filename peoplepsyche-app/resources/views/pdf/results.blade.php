@extends('layout.pdf_format')

@section('pdf-title')
    Psychological Evaluation Report
@endsection

@section('pdf-content')
    {{-- LINE BORDER --}}
    <hr style="border-style: solid; border-width: 1px; margin: 0 10% 0 10%">

    {{-- APP NAME --}}
    <div class="mt-2 justify-content-center align-items-center">
        <h2 class="text-center">{{ config('app.name') }}</h2>
    </div>

    {{-- RESULT CONTENT --}}
    <div class="justify-content-center align-items-center" style="margin: 1rem 10% 0 10%">
        {{-- TEST DATE --}}
        <div class="mx-4 my-5 justify-content-end align-items-end">
            <p style="text-align: right; font-size: 14pt">DATE: {{ strtoupper(date('F j, Y', strtotime($created_at))) }}</p>
        </div>
        {{-- CLIENT INFORMATION DATA --}}
        <div class="row mx-4 my-5 justify-content-start align-items-center">
            <p class="mb-3" style="font-size: 14pt;">IDENTIFYING DATA</p>
            <ul>
                <li class="mb-2" style="list-style: none; text-align:start; font-size: 14pt;">Name: <span class="fw-bold">{{ strtoupper($lastName) }}, {{ strtoupper($givenName) }} {{ strtoupper($middleName) }}</span></li>
                <li class="mb-2" style="list-style: none; text-align:start; font-size: 14pt;">Gender: <span class="fw-bold">{{ strtoupper($sex) }}</span></li>
                <li class="mb-2" style="list-style: none; text-align:start; font-size: 14pt;">Date of Birth: <span class="fw-bold">{{ strtoupper($birthday) }}</span></li>
                <li class="mb-2" style="list-style: none; text-align:start; font-size: 14pt;">Date of Testing: <span class="fw-bold">{{ strtoupper(date('F j, Y', strtotime($created_at))) }}</span></li>
                <li class="mb-2" style="list-style: none; text-align:start; font-size: 14pt;">Chronological Age: <span class="fw-bold">{{ $age }} YEARS OLD</span></li>
                <li class="mb-2" style="list-style: none; text-align:start; font-size: 14pt;">Civil Status: <span class="fw-bold">{{ strtoupper($civilStat) }}</span></li>
                <li class="mb-2" style="list-style: none; text-align:start; font-size: 14pt;">Religious Affiliation: <span class="fw-bold">{{ strtoupper($religion ?: 'N/A') }}</span></li>
                <li class="mb-2" style="list-style: none; text-align:start; font-size: 14pt;">Home Address: <span class="fw-bold">{{ strtoupper($address) }}</span></li>
                <li class="mb-2" style="list-style: none; text-align:start; font-size: 14pt;">Tel. No: <span class="fw-bold">{{ $cpNumber ?: 'N/A' }}</span></li>
            </ul>
        </div>
        {{-- ASSESSMENT FINDINGS --}}
        <div class="row mx-4 my-5 justify-content-start align-items-center">
            {{-- LIST OF FINDINGS --}}
            <p class="mb-3" style="font-size: 14pt">FINDINGS</p>
            <ol>
                <li>
                    {{-- GODS GIFT TEST RESULTS --}}
                    <p class="fw-bold" style="font-size: 14pt">PERSONALITY</p>

                    <div class="row mx-4 mb-5 justify-content-center align-items-center">
                        {{-- STRENGTHS --}}
                        @if(!empty($testResults['strengths']))
                            <h3 style="text-align: start">STRENGTHS:</h3>
                            <ul class="row result-list mx-4 mb-5 align-items-start list-unstyled">

                                @foreach($testResults['strengths'] as $strength)
                                    <li style="list-style: none; text-align:start; margin-bottom:40px; font-size: 14pt;">{{ $strength }}</li>
                                @endforeach
                            </ul>
                        @endif
                        {{-- WEAKNESSES --}}
                        @if(!empty($testResults['weaknesses']))
                            <h3 style="text-align: start">WEAKNESSES:</h3>
                            <ul class="row mx-4 mb-5 align-items-start list-unstyled">
                                @foreach($testResults['weaknesses'] as $weakness)
                                    <li style="list-style: none; text-align:start; margin-bottom:40px; font-size: 14pt;">{{ $weakness }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </li>
            </ol>
        </div>
        {{-- ADMIN NAME AND SIGNATURE --}}
        <div class="row mx-4 my-5 justify-content-center align-items-center text-center">
            <p style="font-size: 12pt">Clinical assessment done by:</p>
            <p class="fw-bold" style="font-size: 14pt;">{{ $admin_name }}</p>
        </div>
    </div>
@endsection
