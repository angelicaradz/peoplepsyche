@extends('layout.dashboard')

@section('page-title')
    Pending Requests List
@endsection

@section('content')
    <div id="table-list" class="card mt-5">

        <!-- PENDING REQUESTS LIST SECTION -->
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Suffix</th>
                    <th scope="col">Date Requested</th>
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
                    <td>11/29/2023 3:36PM</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Approve</a></li>
                            <li><a class="dropdown-item" href="#">Cancel</a></li>
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
                        <td>11/29/2023 3:37PM</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Approve</a></li>
                                <li><a class="dropdown-item" href="#">Cancel</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
