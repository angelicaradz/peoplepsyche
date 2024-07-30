@extends('layout.home')

@section('title')
    Request Access - Assessment Portal |
@endsection

@section('body')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- REQUEST ASSESS CODE BOX -->
        <div id="request-assess-page" class="row border rounded-5 p-5 shadow box-area bg-white justify-content-center align-items-center d-flex flex-lg-row">

            <!-- FORM TITLE -->
            <div class="row mb-4">
                <h2 class="text-center">Request Assessment Code</h2>
            </div>

            {{-- ALERT MESSAGES --}}
            @if (session('success'))
                <div class="row justify-content-center align-items-center">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="row justify-content-center align-items-center">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- REQUEST ASSESSMENT FORM -->
            <div class="row justify-content-center align-items-center">
                <form id="request-assess-form" class="g-3" method="POST" action="{{ route('request-assess') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="overflow-hidden mb-3">
                        <label for="assess_type_id">{{ __('Select assessment type') }}</label>
                        <select name="assess_type" id="assess_type" class="form-select" required>
                            <option selected disabled>Select Assessment Type</option>

                            @foreach($assess_types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('assess_type')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- UPLOAD FILE (PROOF OF PAYMENT) FIELD -->
                    <div class="overflow-hidden mb-3">
                        <label for="formFile">{{ __('Proof of payment') }}</label>
                        <input class="form-control" name="receipt" type="file" id="formFile" required />
                        @error('receipt')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <div class="d-grid gap-2 d-flex justify-content-center align-items-center">
                        <button class="request-btn btn btn-lg fs-6" type="submit" value="Submit">Send Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
