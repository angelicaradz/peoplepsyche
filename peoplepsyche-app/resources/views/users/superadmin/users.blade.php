@extends('layout.dashboard')

@section('page-title')
    Users List
@endsection

@section('content')
    <!-- ADD USER BUTTON -->
    <div class="d-flex flex-sm-row mt-5 justify-content-end">
        <div class="col-lg-2">
            <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-plus" style="padding-right: 5px;"></i>Add User</button>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" id="add_client_button">Add Client</a></li>
                <li><a class="dropdown-item" href="#" id="add_admin_button">Add Admin</a></li>
                <li><a class="dropdown-item" href="#" id="add_superadmin_button">Add Superadmin</a></li>
            </ul>
        </div>
    </div>

    {{-- ADD CLIENT --}}
    <div class="modal" id="add_client_modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalText">
                        <form id="register-form" class="row mb-4 g-3" method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- FIRST NAME -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="text" name="givenName" class="form-control" id="floatingGivenName" placeholder="Juan" :value="old('givenName')" required autofocus autocomplete="given-name" />
                                    <x-input-label class="text-black" for="floatingGivenName" :value="__('Given Name')" />
                                    <x-input-error :messages="$errors->get('givenName')" class="mt-2" />
                                </div>
                            </div>

                            <!-- MIDDLE NAME -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="name" name="middleName" class="form-control" id="floatingMiddleName" placeholder="Dela" :value="old('middleName')" autocomplete="additional-name" />
                                    <x-input-label class="text-black" for="floatingMiddleName" :value="__('Middle Name')" />
                                    <x-input-error :messages="$errors->get('middleName')" class="mt-2" />
                                </div>
                            </div>

                            <!-- LAST NAME -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="name" name="lastName" class="form-control" id="floatingLastName" placeholder="Cruz" :value="old('lastName')" required autocomplete="family-name" />
                                    <x-input-label class="text-black" for="floatingLastName" :value="__('Last Name')" />
                                    <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                                </div>
                            </div>

                            <!-- SUFFIX NAME -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="name" name="suffixName" class="form-control" id="floatingSuffixName" placeholder="Jr" :value="old('suffixName')" autocomplete="honorific-suffix" />
                                    <x-input-label class="text-black" for="floatingSuffixName" :value="__('Suffix Name')" />
                                    <x-input-error :messages="$errors->get('suffixName')" class="mt-2" />
                                </div>
                            </div>

                            <!-- EMAIL ADDRESS -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" :value="old('email')" required autocomplete="email" />
                                    <x-input-label class="text-black" for="floatingEmail" :value="__('Email')" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            <!-- PHONE NUMBER -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="tel" name="cpNumber" class="form-control" id="floatingCpNumber" placeholder="XXXXXXXXXXX" autocomplete="tel" />
                                    <x-input-label class="text-black" for="floatingCpNumber" :value="__('Mobile Number')" />
                                    <x-input-error :messages="$errors->get('cpNumber')" class="mt-2" />
                                </div>
                            </div>

                            <!-- BIRTHDATE -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="date" name="birthday" class="form-control" id="floatingBirthday" placeholder="MM/DD/YYYY" required autocomplete="bday" />
                                    <x-input-label class="text-black" for="floatingBirthday" :value="__('Birthday')" />
                                    <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                                </div>
                            </div>

                            <!-- SEX -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <select class="form-select" id="floatingSex" name="sex" aria-label="Floating label select example" required>
                                        <option selected disabled>Select Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <x-input-label class="text-black" for="floatingSex" :value="__('Sex')" />
                                    <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                                </div>
                            </div>

                            <!-- PASSWORD -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required autocomplete="new-password" />
                                    <x-input-label class="text-black" for="floatingPassword" :value="__('Password')" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>

                            <!-- CONFIRM PASSWORD -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm password" required />
                                    <x-input-label class="text-black" for="floatingPasswordConfirm" :value="__('Confirm Password')" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </form>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn" value="Register">{{ __('Register') }}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD ADMIN --}}
    <div class="modal" id="add_admin_modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalText">
                        <form id="register-form" class="row mb-4 g-3" method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- FIRST NAME -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="text" name="givenName" class="form-control" id="floatingGivenName" placeholder="Juan" :value="old('givenName')" required autofocus autocomplete="given-name" />
                                    <x-input-label class="text-black" for="floatingGivenName" :value="__('Given Name')" />
                                    <x-input-error :messages="$errors->get('givenName')" class="mt-2" />
                                </div>
                            </div>

                            <!-- MIDDLE NAME -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="name" name="middleName" class="form-control" id="floatingMiddleName" placeholder="Dela" :value="old('middleName')" autocomplete="additional-name" />
                                    <x-input-label class="text-black" for="floatingMiddleName" :value="__('Middle Name')" />
                                    <x-input-error :messages="$errors->get('middleName')" class="mt-2" />
                                </div>
                            </div>

                            <!-- LAST NAME -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="name" name="lastName" class="form-control" id="floatingLastName" placeholder="Cruz" :value="old('lastName')" required autocomplete="family-name" />
                                    <x-input-label class="text-black" for="floatingLastName" :value="__('Last Name')" />
                                    <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                                </div>
                            </div>

                            <!-- SUFFIX NAME -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="name" name="suffixName" class="form-control" id="floatingSuffixName" placeholder="Jr" :value="old('suffixName')" autocomplete="honorific-suffix" />
                                    <x-input-label class="text-black" for="floatingSuffixName" :value="__('Suffix Name')" />
                                    <x-input-error :messages="$errors->get('suffixName')" class="mt-2" />
                                </div>
                            </div>

                            <!-- EMAIL ADDRESS -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" :value="old('email')" required autocomplete="email" />
                                    <x-input-label class="text-black" for="floatingEmail" :value="__('Email')" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            <!-- PHONE NUMBER -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="tel" name="cpNumber" class="form-control" id="floatingCpNumber" placeholder="XXXXXXXXXXX" autocomplete="tel" />
                                    <x-input-label class="text-black" for="floatingCpNumber" :value="__('Mobile Number')" />
                                    <x-input-error :messages="$errors->get('cpNumber')" class="mt-2" />
                                </div>
                            </div>

                            <!-- ADDRESS -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="text" name="address" class="form-control" id="floatingAddress" placeholder="Address" autocomplete="address-line1" />
                                    <x-input-label class="text-black" for="floatingAddress" :value="__('Address')" />
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>
                            </div>

                            <!-- PASSWORD -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required autocomplete="new-password" />
                                    <x-input-label class="text-black" for="floatingPassword" :value="__('Password')" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>

                            <!-- CONFIRM PASSWORD -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm password" required />
                                    <x-input-label class="text-black" for="floatingPasswordConfirm" :value="__('Confirm Password')" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </form>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn" value="Register">{{ __('Register') }}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD SUPERADMIN --}}
    <div class="modal" id="add_superadmin_modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Superadmin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalText">
                        <form id="register-form" class="row mb-4 g-3" method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- NAME -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="text" name="name" class="form-control" id="name" placeholder="Juan" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-label class="text-black" for="floatingName" :value="__('Name')" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>

                            <!-- EMAIL ADDRESS -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" :value="old('email')" required autocomplete="email" />
                                    <x-input-label class="text-black" for="floatingEmail" :value="__('Email')" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            <!-- PASSWORD -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required autocomplete="new-password" />
                                    <x-input-label class="text-black" for="floatingPassword" :value="__('Password')" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>

                            <!-- CONFIRM PASSWORD -->
                            <div class="col-12">
                                <div class="form-floating overflow-hidden">
                                    <x-text-input type="password" name="password_confirmation" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm password" required />
                                    <x-input-label class="text-black" for="floatingPasswordConfirm" :value="__('Confirm Password')" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </form>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn" value="Register">{{ __('Register') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- USERS LIST SECTION -->
    <div id="table-list" class="card mt-1">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Suffix</th>
                    <th scope="col">Role</th>
                    <th scope="col">Date Registered</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Cruz</td>
                    <td>Juan</td>
                    <td>Dela</td>
                    <td></td>
                    <td>Client</td>
                    <td>11/29/2023 3:30PM</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">View</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            </ul>
                        </div>
                    </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Doe</td>
                        <td>John</td>
                        <td></td>
                        <td></td>
                        <td>Client</td>
                        <td>11/29/2023 3:30PM</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">View</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Jeon</td>
                        <td>Jungkook</td>
                        <td></td>
                        <td>Jr.</td>
                        <td>Client</td>
                        <td>11/29/2023 3:30PM</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">View</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Lim</td>
                        <td>Cora</td>
                        <td>E.</td>
                        <td></td>
                        <td>Admin</td>
                        <td>11/29/2023 3:30PM</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">View</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
