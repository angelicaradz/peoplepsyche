@extends('layout.dashboard')

@section('page-title')
    Users List
@endsection

@section('content')
    <!-- ADD USER BUTTON -->
    <div class="d-flex flex-sm-row mt-5 justify-content-end">
        <div class="col-lg-2">
            <button type="button" class="btn btn-secondary"><i class="fa-solid fa-plus" style="padding-right: 5px;"></i>Add User</button>
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
