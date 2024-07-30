@extends('layout.dashboard')

@section('title')
    Profile |
@endsection

@section('page-title')
    Profile
@endsection

@section('content')
    {{-- INFO MESSAGES --}}
    @if (session('success'))
        <div class="alert alert-success mt-5">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger mt-5">
            {{ session('error') }}
        </div>
    @endif

    {{-- PROFILE INFORMATION --}}
    <div class="d-flex mt-5 justify-content-center">
        <!-- EDIT INFORMATION -->
        <form id="profile-form" method="post" action="{{ route('client-profile.update') }}">
            @csrf

            <fieldset>
                <div class="row">
                    <p><span id="profile-label">Full Name:</span>

                        <x-text-input id="givenName" type="name" name="givenName" class="form-control" placeholder="Given Name" :value="old('givenName', $user->givenName)" required autofocus autocomplete="given-name" />
                        @error('givenName')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror

                        <x-text-input id="middleName" type="name" name="middleName" class="form-control" placeholder="Middle Name" :value="old('middleName', $user->middleName)" autocomplete="additional-name" />
                        @error('middleName')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror

                        <x-text-input id="lastName" type="name" name="lastName" class="form-control" placeholder="Last Name" :value="old('lastName', $user->lastName)" required autocomplete="family-name" />
                        @error('lastName')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror

                        <x-text-input id="suffixName" type="name" name="suffixName" class="form-control" placeholder="Suffix Name" :value="old('suffixName', $user->suffixName)" autocomplete="honorific-suffix" />
                        @error('suffixName')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </p>
                </div>
                <div class="row">
                    <p><span id="profile-label">Contact Number:</span>
                        <x-text-input id="cpNumber" type="tel" name="cpNumber" class="form-control" placeholder="Contact Number" :value="old('cpNumber', $user->cpNumber)" autocomplete="tel" />
                        @error('cpNumber')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </p>
                </div>
                <div class="row">
                    <p><span id="profile-label">Birthday:</span>
                        <x-text-input id="birthday" type="date" name="birthday" class="form-control" placeholder="MM/DD/YYYY" :value="old('birthday', $user->birthday)" required autocomplete="bday" />
                        @error('birthday')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </p>
                </div>
                <div class="row">
                    <p><span id="profile-label">Sex:</span>
                        <select class="form-select" id="sex" name="sex" required>
                            <option value="Male"
                                @if(old('sex', $user->sex) == 'Male')
                                    selected
                                @endif
                            >Male</option>
                            <option value="Female"
                                @if(old('sex', $user->sex) == 'Female')
                                    selected
                                @endif
                            >Female</option>
                        </select>
                        @error('sex')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </p>
                </div>
                <div class="row">
                    <p><span id="profile-label">Civil Status:</span>
                        <select class="form-select" id="civilStat" name="civilStat" required>
                            <option value="Single"
                                @if(old('civilStat', $user->civilStat) == 'Single')
                                    selected
                                @endif
                            >Single</option>
                            <option value="Married"
                                @if(old('civilStat', $user->civilStat) == 'Married')
                                    selected
                                @endif
                            >Married</option>
                            <option value="Separated"
                                @if(old('civilStat', $user->civilStat) == 'Separated')
                                    selected
                                @endif
                            >Separated</option>
                            <option value="Annulled"
                                @if(old('civilStat', $user->civilStat) == 'Annulled')
                                    selected
                                @endif
                            >Annulled</option>
                            <option value="Divorced"
                                @if(old('civilStat', $user->civilStat) == 'Divorced')
                                    selected
                                @endif
                            >Divorced</option>
                            <option value="Widowed"
                                @if(old('civilStat', $user->civilStat) == 'Widowed')
                                    selected
                                @endif
                            >Widowed</option>
                        </select>
                        @error('civilStat')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </p>
                </div>
                <div class="row">
                    <p><span id="profile-label">Religion:</span>
                        <x-text-input id="religion" type="text" name="religion" class="form-control" placeholder="Religion" :value="old('religion', $user->religion)" />
                        @error('religion')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </p>
                </div>
                <div class="row">
                    <p><span id="profile-label">Address:</span>
                        <x-text-input id="address" type="text" name="address" class="form-control" placeholder="Address" :value="old('address', $user->address)" required autocomplete="address-line1" />
                        @error('address')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </p>
                </div>
                <div class="row">
                    <button type="submit" value="Submit" class="btn"><i class="fa-regular fa-floppy-disk" style="padding-right: 5px;"></i>{{ __('Save Changes') }}</button>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
