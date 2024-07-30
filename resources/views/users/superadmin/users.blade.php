@extends('layout.dashboard')

@section('title')
    Users |
@endsection

@section('page-title')
    Users List
@endsection

@section('content')
    {{-- ALERT MESSAGES --}}
    @if (session('success'))
        <div class="alert alert-success mt-5">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger mt-5">
            {{ session('error') }}
        </div>
    @endif

    <!-- ADD USER BUTTON -->
    <div class="d-flex flex-sm-row mt-5 justify-content-end">
        <div class="col-lg-2">
            <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-plus" style="padding-right: 5px;"></i>Add User
            </button>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" id="add_client_button">Add Client</a></li>
                <li><a class="dropdown-item" href="#" id="add_admin_button">Add Admin</a></li>
                <li><a class="dropdown-item" href="#" id="add_superadmin_button">Add Superadmin</a></li>
            </ul>
        </div>
    </div>

    {{-- ADD CLIENT --}}
    <div class="modal fade" id="add_client_modal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addClientModalLabel">Add New Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="client-form" class="row mb-4 g-3" method="POST" action="{{ route('superadmin.add-client') }}">
                        @csrf

                        <!-- FIRST NAME -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="text" name="givenName" class="form-control" id="clientGivenName" placeholder="Juan" :value="old('givenName')" required autofocus autocomplete="given-name" />
                                <x-input-label class="text-black" for="clientGivenName" :value="__('Given Name')" />
                                @error('givenName')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- MIDDLE NAME -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="name" name="middleName" class="form-control" id="clientMiddleName" placeholder="Dela" :value="old('middleName')" autocomplete="additional-name" />
                                <x-input-label class="text-black" for="clientMiddleName" :value="__('Middle Name')" />
                                @error('middleName')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- LAST NAME -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="name" name="lastName" class="form-control" id="clientLastName" placeholder="Cruz" :value="old('lastName')" required autocomplete="family-name" />
                                <x-input-label class="text-black" for="clientLastName" :value="__('Last Name')" />
                                @error('lastName')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- SUFFIX NAME -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="name" name="suffixName" class="form-control" id="clientSuffixName" placeholder="Jr" :value="old('suffixName')" autocomplete="honorific-suffix" />
                                <x-input-label class="text-black" for="clientSuffixName" :value="__('Suffix Name')" />
                                @error('suffixName')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- BIRTHDATE -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="date" name="birthday" class="form-control" id="clientBirthday" placeholder="MM/DD/YYYY" required autocomplete="bday" />
                                <x-input-label class="text-black" for="clientBirthday" :value="__('Birthday')" />
                                @error('birthday')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- SEX -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <select class="form-select" id="clientSex" name="sex" aria-label="Floating label select example" required>
                                    <option selected disabled>Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <x-input-label class="text-black" for="clientSex" :value="__('Sex')" />
                                @error('sex')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- HOME ADDRESS -->
                        <div class="col-md-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="text" name="address" class="form-control" id="clientAddress" placeholder="Home address" required autocomplete="address-line1" />
                                <x-input-label class="text-black" for="clientAddress" :value="__('Home Address')" />
                                @error('address')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- ADMIN -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <select class="form-select" id="floatingAdmin" name="admin" aria-label="Floating label select example" required>
                                    <option selected disabled>Select Admin</option>

                                    @foreach($admins as $admin)
                                        <option value="{{ $admin->id }}">{{ $admin->full_name }}</option>
                                    @endforeach
                                </select>
                                <x-input-label class="text-black" for="floatingAdmin" :value="__('Admin')" />
                                @error('admin')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- EMAIL ADDRESS -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="email" name="email" class="form-control" id="clientEmail" placeholder="name@example.com" :value="old('email')" required autocomplete="email" />
                                <x-input-label class="text-black" for="clientEmail" :value="__('Email')" />
                                @error('email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- PASSWORD -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="password" name="password" class="form-control" id="clientPassword" placeholder="Password" required autocomplete="new-password" />
                                <x-input-label class="text-black" for="clientPassword" :value="__('Password')" />
                                @error('password')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="password" name="password_confirmation" class="form-control" id="clientPasswordConfirm" placeholder="Confirm password" required />
                                <x-input-label class="text-black" for="clientPasswordConfirm" :value="__('Confirm Password')" />
                                @error('password_confirmatino')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button id="client-btn" class="btn submit-btn" type="button">Add Client</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD ADMIN --}}
    <div class="modal fade" id="add_admin_modal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="admin-form" class="row mb-4 g-3" method="POST" action="{{ route('superadmin.add-admin') }}">
                        @csrf

                        <!-- FIRST NAME -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="text" name="givenName" class="form-control" id="adminGivenName" placeholder="Juan" :value="old('givenName')" required autofocus autocomplete="given-name" />
                                <x-input-label class="text-black" for="adminGivenName" :value="__('Given Name')" />
                                @error('givenName')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- MIDDLE NAME -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="name" name="middleName" class="form-control" id="adminMiddleName" placeholder="Dela" :value="old('middleName')" autocomplete="additional-name" />
                                <x-input-label class="text-black" for="adminMiddleName" :value="__('Middle Name')" />
                                @error('middleName')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- LAST NAME -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="name" name="lastName" class="form-control" id="adminLastName" placeholder="Cruz" :value="old('lastName')" required autocomplete="family-name" />
                                <x-input-label class="text-black" for="adminLastName" :value="__('Last Name')" />
                                @error('lastName')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- SUFFIX NAME -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="name" name="suffixName" class="form-control" id="adminSuffixName" placeholder="Jr" :value="old('suffixName')" autocomplete="honorific-suffix" />
                                <x-input-label class="text-black" for="adminSuffixName" :value="__('Suffix Name')" />
                                @error('suffixName')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- BIRTHDATE -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="date" name="birthday" class="form-control" id="adminBirthday" placeholder="MM/DD/YYYY" required autocomplete="bday" />
                                <x-input-label class="text-black" for="adminBirthday" :value="__('Birthday')" />
                                @error('birthday')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- SEX -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <select class="form-select" id="adminSex" name="sex" aria-label="Floating label select example" required>
                                    <option selected disabled>Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <x-input-label class="text-black" for="adminSex" :value="__('Sex')" />
                                @error('sex')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- ADDRESS -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="text" name="address" class="form-control" id="adminAddress" placeholder="Address" autocomplete="address-line1" />
                                <x-input-label class="text-black" for="adminAddress" :value="__('Address')" />
                                @error('address')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- EMAIL ADDRESS -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="email" name="email" class="form-control" id="adminEmail" placeholder="name@example.com" :value="old('email')" required autocomplete="email" />
                                <x-input-label class="text-black" for="adminEmail" :value="__('Email')" />
                                @error('email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- PASSWORD -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="password" name="password" class="form-control" id="adminPassword" placeholder="Password" required autocomplete="new-password" />
                                <x-input-label class="text-black" for="adminPassword" :value="__('Password')" />
                                @error('password')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="password" name="password_confirmation" class="form-control" id="adminPasswordConfirm" placeholder="Confirm password" required />
                                <x-input-label class="text-black" for="adminPasswordConfirm" :value="__('Confirm Password')" />
                                @error('password_confirmation')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button id="admin-btn" type="button" class="btn">Add Admin</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD SUPERADMIN --}}
    <div class="modal fade" id="add_superadmin_modal" tabindex="-1" aria-labelledby="addSuperadminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSuperadminModalLabel">Add New Superadmin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="superadmin-form" class="row mb-4 g-3" method="POST" action="{{ route('superadmin.add-superadmin') }}">
                        @csrf

                        <!-- NAME -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="text" name="name" class="form-control" id="superadminName" placeholder="Juan" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-label class="text-black" for="superadminName" :value="__('Name')" />
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- EMAIL ADDRESS -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="email" name="email" class="form-control" id="superadminEmail" placeholder="name@example.com" :value="old('email')" required autocomplete="email" />
                                <x-input-label class="text-black" for="superadminEmail" :value="__('Email')" />
                                @error('email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- PASSWORD -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="password" name="password" class="form-control" id="superadminPassword" placeholder="Password" required autocomplete="new-password" />
                                <x-input-label class="text-black" for="superadminPassword" :value="__('Password')" />
                                @error('password')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="col-12">
                            <div class="form-floating overflow-hidden">
                                <x-text-input type="password" name="password_confirmation" class="form-control" id="superadminPasswordConfirm" placeholder="Confirm password" required />
                                <x-input-label class="text-black" for="superadminPasswordConfirm" :value="__('Confirm Password')" />
                                @error('password_confirmation')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button id="superadmin-btn" type="button" class="btn submit-btn">Add Superadmin</button>
                </div>
            </div>
        </div>
    </div>

    <!-- USERS LIST SECTION -->
    @if($users->isEmpty())
        <div class="row justify-content-center align-items-center mt-5">
            <div class="alert alert-info" role="alert">
                No registered users.
            </div>
        </div>
    @else
        <div id="table-list" class="card mt-1">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Date Registered</th>
                            {{-- <th scope="col">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                @if($user->role === 'superadmin')
                                    <td>{{ $user->name }}</td>
                                @else
                                    <td>{{ $user->full_name ?? '-' }}</td>
                                @endif
                                <td>
                                    @if ($user instanceof App\Models\Admin)
                                        Admin
                                    @elseif ($user instanceof App\Models\User)
                                        Client
                                    @elseif ($user instanceof App\Models\Superadmin)
                                        Superadmin
                                    @endif
                                </td>
                                <td>{{ $user->created_at ? $user->created_at->format('m/d/Y g:iA') : '-' }}</td>
                                {{-- <td>
                                    <div class="dropdown">
                                        <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View</a></li>
                                        </ul>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
