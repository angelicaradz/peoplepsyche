@extends('layout.dashboard')

@section('page-title')
    Profile
@endsection

@section('content')
    <!-- PROFILE -->
    <div class="d-flex mt-5 justify-content-center">
        <i id="profile-pic" class="fa-regular fa-user"></i>
    </div>

    <div class="d-flex mt-3 justify-content-center">

        <!-- EDIT INFORMATION -->
        <form id="profile-form" method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <fieldset>
                <div class="row">
                    <p><span id="profile-label">Full Name:</span>

                        <x-text-input id="givenName" type="name" name="givenName" class="form-control" placeholder="Given Name" :value="old('givenName', $user->givenName)" required autofocus autocomplete="given-name" />
                        <x-input-error class="mt-2" :messages="$errors->get('givenName')" />

                        <x-text-input id="middleName" type="name" name="middleName" class="form-control" placeholder="Middle Name" :value="old('middleName', $user->middleName)" autocomplete="additional-name" />
                        <x-input-error class="mt-2" :messages="$errors->get('middleName')" />

                        <x-text-input id="lastName" type="name" name="lastName" class="form-control" placeholder="Last Name" :value="old('lastName', $user->lastName)" required autocomplete="family-name" />
                        <x-input-error class="mt-2" :messages="$errors->get('lastName')" />

                        <x-text-input id="suffixName" type="name" name="suffixName" class="form-control" placeholder="Suffix Name" :value="old('suffixName', $user->suffixName)" autocomplete="honorific-suffix" />
                        <x-input-error class="mt-2" :messages="$errors->get('suffixName')" />
                    </p>
                </div>
                <div class="row">
                    <p><span id="profile-label">Contact Number:</span>
                        <x-text-input id="cpNumber" type="tel" name="cpNumber" class="form-control" placeholder="Contact Number" :value="old('cpNumber', $user->cpNumber)" autocomplete="tel" />
                        <x-input-error class="mt-2" :messages="$errors->get('cpNumber')" />
                    </p>
                </div>
                <div class="row">
                    <p><span id="profile-label">Birthday:</span>
                        <x-text-input id="birthday" type="date" name="birthday" class="form-control" placeholder="MM/DD/YYYY" :value="old('birthday', $user->birthday)" required autocomplete="bday" />
                        <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
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
                        <x-input-error class="mt-2" :messages="$errors->get('sex')" />
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
                        <x-input-error class="mt-2" :messages="$errors->get('civilStat')" />
                    </p>
                </div>
                <div class="row">
                    <p><span id="profile-label">Religion:</span>
                        <x-text-input id="religion" type="text" name="religion" class="form-control" placeholder="Religion" :value="old('religion', $user->religion)" />
                        <x-input-error class="mt-2" :messages="$errors->get('religion')" />
                    </p>
                </div>
                <div class="row">
                    <p><span id="profile-label">Address:</span>
                        <x-text-input id="address" type="text" name="address" class="form-control" placeholder="Address" :value="old('address', $user->address)" required autocomplete="address-line1" />
                        <x-input-error class="mt-2" :messages="$errors->get('address')" />

                    </p>
                </div>
                <div class="row">
                    <button type="submit" value="Submit" class="btn"><i class="fa-regular fa-floppy-disk" style="padding-right: 5px;"></i>{{ __('Save Changes') }}</button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-black dark:text-orange-500"
                        >{{ __('Saved.') }}</p>
                    @else
                        <p>No changes made.</p>
                    @endif
                </div>
            </fieldset>
        </form>
    </div>
@endsection
