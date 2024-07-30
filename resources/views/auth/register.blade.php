@extends('layout.home')

@section('title')
    Register |
@endsection

@section('body')
<div class="p-5 container d-flex flex-lg-row justify-content-center align-items-center min-vh-100">

    <!-- REGISTER BOX -->
    <div class="row border rounded-5 p-4 shadow box-area bg-white justify-content-center align-items-center">

        <!-- FORM TITLE -->
        <div class="row flex-lg-row mb-3">
            <h1>Registration Form</h1>
        </div>

        <!-- REGISTER FORM -->
        <div class="row flex-lg-row justify-content-center align-items-center">
            <form id="register-form" class="row mb-4 g-3" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- FIRST NAME -->
                <div class="col-md-3">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="text" name="givenName" class="form-control" id="floatingGivenName" placeholder="Juan" :value="old('givenName')" required autofocus autocomplete="given-name" />
                        <x-input-label for="floatingGivenName" :value="__('Given Name')" />
                        @error('givenName')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- MIDDLE NAME -->
                <div class="col-md-3">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="name" name="middleName" class="form-control" id="floatingMiddleName" placeholder="Dela" :value="old('middleName')" autocomplete="additional-name" />
                        <x-input-label for="floatingMiddleName" :value="__('Middle Name')" />
                        @error('middleName')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- LAST NAME -->
                <div class="col-md-3">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="name" name="lastName" class="form-control" id="floatingLastName" placeholder="Cruz" :value="old('lastName')" required autocomplete="family-name" />
                        <x-input-label for="floatingLastName" :value="__('Last Name')" />
                        @error('lastName')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- SUFFIX NAME -->
                <div class="col-md-3">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="name" name="suffixName" class="form-control" id="floatingSuffixName" placeholder="Jr" :value="old('suffixName')" autocomplete="honorific-suffix" />
                        <x-input-label for="floatingSuffixName" :value="__('Suffix Name')" />
                        @error('suffixName')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- EMAIL ADDRESS -->
                <div class="col-md-6">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" :value="old('email')" required autocomplete="email" />
                        <x-input-label for="floatingEmail" :value="__('Email')" />
                        @error('email')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- PHONE NUMBER -->
                <div class="col-md-6">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="tel" name="cpNumber" class="form-control" id="floatingCpNumber" placeholder="XXXXXXXXXXX" autocomplete="tel" />
                        <x-input-label for="floatingCpNumber" :value="__('Mobile Number')" />
                        @error('cpNumber')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- BIRTHDATE -->
                <div class="col-md-6">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="date" name="birthday" class="form-control" id="floatingBirthday" placeholder="MM/DD/YYYY" required autocomplete="bday" />
                        <x-input-label for="floatingBirthday" :value="__('Birthday')" />
                        @error('birthday')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- SEX -->
                <div class="col-md-6">
                    <div class="form-floating overflow-hidden">
                        <select class="form-select" id="floatingSex" name="sex" aria-label="Floating label select example" required>
                            <option selected disabled>Select Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <x-input-label for="floatingSex" :value="__('Sex')" />
                        @error('sex')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- CIVIL STATUS -->
                <div class="col-md-6">
                    <div class="form-floating overflow-hidden">
                        <select class="form-select" id="floatingCivilStat" name="civilStat" aria-label="Floating label select example" required>
                            <option selected disabled>Select Civil Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Separated">Separated</option>
                            <option value="Divorced">Annulled</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                        <x-input-label for="floatingCivilStat" :value="__('Civil Status')" />
                        @error('civilStat')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- RELIGION -->
                <div class="col-md-6">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="text" name="religion" class="form-control" id="floatingReligion" placeholder="Roman Catholic" />
                        <x-input-label for="floatingReligion" :value="__('Religion')" />
                        @error('religion')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- HOME ADDRESS -->
                <div class="col-md-12">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="text" name="address" class="form-control" id="floatingAddress" placeholder="Home address" required autocomplete="address-line1" />
                        <x-input-label for="floatingAddress" :value="__('Home Address')" />
                        @error('address')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- USER CODE FOR REGISTRATION -->
                <div class="col-md-12">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="text" name="access_code" class="form-control" id="floatingAccessCode" placeholder="Access code" value="{{ old('access_code') }}" required />
                        <x-input-label for="floatingAccessCode" :value="__('Access Code')" />
                        @error('access_code')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="col-md-12">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required autocomplete="new-password" />
                        <x-input-label for="floatingPassword" :value="__('Password')" />
                        @error('password')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="col-md-12">
                    <div class="form-floating overflow-hidden">
                        <x-text-input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm password" required />
                        <x-input-label for="floatingPasswordConfirm" :value="__('Confirm Password')" />
                        @error('password_confirmation')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- TERMS AND CONDITIONS -->
                <div class="form-check d-flex justify-content-start ms-2">
                    <label class="form-check-label text-secondary" for="flexCheckChecked">
                        <input class="form-check-input" type="checkbox" name="terms_agreement" value="" id="flexCheckChecked" required>
                        I have read and agree to the <a :href="route('terms')">{{ __('Terms and Condition') }}</a>.
                    </label>
                    @error('terms_agreement')
                        <span class="text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <!-- REGISTER BUTTON -->
                <div class="input-group">
                    <button class="btn btn-lg w-100 fs-6" type="submit" value="Register">{{ __('Register') }}</button>
                </div>

                <!-- LOGIN IF HAS ACCOUNT -->
                <div class="row mb-3 text-center">
                    <small>Already registered? <a href={{ route('login') }} style="color: chocolate;">{{ __('Login here.') }}</a></small>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
