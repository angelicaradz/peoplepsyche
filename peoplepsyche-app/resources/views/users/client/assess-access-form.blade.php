@extends('layout.home')

@section('title')
    Assessment Portal |
@endsection

@section('body')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- TAKE ASSESSMENT BOX -->
        <div id="client-assess-page" class="row border rounded-5 p-5 shadow box-area bg-white justify-content-center align-items-center d-flex flex-lg-row">

            <!-- FORM TITLE -->
            <div class="row mb-4">
                <h2 class="text-center">Assessment</h2>
            </div>

            <!-- TAKE ASSESSMENT FORM -->
            <div class="row justify-content-center align-items-center">
                <form id="client-assess-form" class="g-3" method="POST" action="{{ route('submit-assessment') }}">
                    @csrf

                    <!-- CODE INPUT FIELD -->
                    <div class="overflow-hidden mb-3">
                        <label for="codeInput">{{ __('Enter assessment code') }}</label>
                        <input type="text" name="assess_code" class="form-control" id="codeInput" placeholder="Enter code" value="{{ old('assess_code') }}" required />
                        @error('assess_code')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <div class="d-grid gap-2 d-flex justify-content-center align-items-center">
                        <button class="assess-btn btn btn-lg fs-6" type="submit" value="Submit">{{ __('Submit') }}</button>
                        <a href="{{ route('dashboard') }}" class="cancel-assess-btn btn btn-lg fs-6" type="button">Cancel</a>
                    </div>

                    <div class="row mb-3 text-center">
                        <small>No access code? <a href="{{ route('request-assess-form') }}" style="color: chocolate;">Request here!</a></small>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
